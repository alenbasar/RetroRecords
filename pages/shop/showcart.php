<?php
session_start();

//connect to database
$mysqli = mysqli_connect("localhost", "root", "", "scripting-server-db");

$display_block = "<h1>Your Shopping Cart</h1>";

//check for cart items based on user session id
$get_cart_sql = "SELECT st.id, si.item_title, si.item_price,
st.sel_item_qty FROM
store_shoppertrack AS st LEFT JOIN store_items AS si ON
si.id = st.sel_item_id WHERE session_id = '".$_COOKIE['PHPSESSID']."'";
$get_cart_res = mysqli_query($mysqli, $get_cart_sql)
or die(mysqli_error($mysqli));

if (mysqli_num_rows($get_cart_res) < 1) {
//print message
$display_block .= "<p>You have no items in your cart.
Please <a href=\"view_cat.php\">continue to shop</a>!</p>";
} else {
//get info and build cart display
$display_block .= <<<END_OF_TEXT
<table style="color: lightgrey;">
<tr style="color: black">
<th>Title</th>
<th>Price</th>
<th>Qty</th>
<th>Total Price</th>
<th>Action</th>
</tr>
END_OF_TEXT;

$grand_total = 0;
while ($cart_info = mysqli_fetch_array($get_cart_res)) {
$id = $cart_info['id'];

// $session_id = $cart_info['session_id'];
$item_title = stripslashes($cart_info['item_title']);
$item_price = $cart_info['item_price'];
$item_qty = $cart_info['sel_item_qty'];
$total_price = sprintf("%.02f", $item_price * $item_qty);
$grand_total += $total_price;
$display_block .= <<<END_OF_TEXT
<tr>
<td>$item_title <br></td>
<td>\$$item_price <br></td>
<td>$item_qty <br></td>
<td>\$$total_price</td>
<td><a href="removefromcart.php?id=$id">remove</a></td>
</tr>


END_OF_TEXT;
}
$display_block .= "<td colspan='5'>Total: \$$grand_total</td></table> <br><br>";
}

//free result
mysqli_free_result($get_cart_res);

 //close connection to MySQL
 mysqli_close($mysqli);
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 <title>My Store</title>
 <style type="text/css">
 table {
 border: 1px solid black;
 border-collapse: collapse;
 }
 th {
 border: 1px solid black;
 padding: 6px;
 font-weight: bold;
 background: #ccc;
 text-align: center;
 }
 td {
 border: 1px solid black;
 padding: 6px;
 vertical-align: top;
 text-align: center;
 }
 .cart-checkout{
   display: flex;
   justify-content: space-around;
 }
 .checkout{
   float: left;
   width: 30%;
   margin-top: 2rem;
 }
 .checkout-form{
   display: flex;
   flex-direction: column;
   width: 400px;
 }
 </style>
 <link rel="stylesheet" href="../../app.css" />
 </head>
 <body>
 <header>

<img class="logo" src="../../images/logofinal1.png" alt="Retro Records logo" />
  <nav class="desktopMenu">
    <ul class="nav__links">
      <li><a href="../../index.html">Home</a></li>
      <li><a href="../retro-records/retro-records.html">Retro Records</a></li>
      <li><a href="../forum/forumDisplay.php">Forum</a></li>
      <li><a href="view_cat.php">Shop</a></li>
    </ul>
  </nav>
  <a class="d-cta" href="./pages/contact/contact.html">Contact</a>
</header>
 <section class="cart-checkout">
  <div class="cart">
 <?php echo $display_block; ?>
  </div>

  <div class="checkout">
     <form method='post' action='checkout.php?sess_id=<?php echo $_COOKIE['PHPSESSID']  ?>' class="checkout-form">
  <input type="hidden" name="total" value='<?php echo $grand_total ?>'/>
 <input type="text" name='name' id="name" placeholder="Full Name"/>
 <input type="text" name='address' id="address" placeholder="Address"/>
 <input type="text" name='city' id="city" placeholder="City"/>
 <input type="text" name='state' id="state" placeholder="State"/>
 <input type="text" name='zip' id="zip" placeholder="Zip"/>
 <input type="text" name='tel' id="tel" placeholder="Tel"/>
 <input type="email" name='email' id="email" placeholder="Email"/>
 <select name="ship" id="ship">
   <option>--Shipping--</option>
 <option value="90">Express</option>
  <option value="40">Normal</option>
</select>
 <button type="submit" name="submit" value="Checkout" style="color: black">Checkout</button>
 </form>
  </div>

 </section>
 </body>
 </html>