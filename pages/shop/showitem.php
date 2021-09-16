
 <!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../app.css" />
<title>My Store</title>
<style>

    img{
        width: 20rem;
    }
    .o-item{
        display:flex;
        flex-direction: column;
        text-align: center;
        margin: auto;
        background-color: #0000006c;
    }
</style>
<style type="text/css">
label {font-weight: bold;}
</style>
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
<?php
 //connect to database
 $mysqli = mysqli_connect("localhost", "root", "", "scripting-server-db");

 $display_block = "<h1>My Store - Item Detail</h1>";

 //create safe values for use
 $safe_item_id = mysqli_real_escape_string($mysqli, $_GET['item_id']);

 //validate item
 $get_item_sql = 'SELECT c.id as cat_id, c.cat_title, si.item_title, si.item_price, si.item_desc, si.item_image, si.item_qty FROM store_items AS si LEFT JOIN store_categories AS c on c.id = si.cat_id WHERE si.id = "'.$safe_item_id.'"';

$get_item_res = mysqli_query($mysqli, $get_item_sql)
 or die(mysqli_error($mysqli));

 

 if (mysqli_num_rows($get_item_res) < 1) {
 //invalid item
 $display_block .= "<p><em>Invalid item selection.</em></p>";
 } else {
    $display_block .= "<div class='o-item'>";   
 //valid item, get info
 while ($item_info = mysqli_fetch_array($get_item_res)) {
 $cat_id = $item_info['cat_id'];
 $cat_title = strtoupper(stripslashes($item_info['cat_title']));
 $item_title = stripslashes($item_info['item_title']);
 $item_price = $item_info['item_price'];
 $item_desc = stripslashes($item_info['item_desc']);
 $item_image = $item_info['item_image'];
 $item_qty = $item_info['item_qty'];
 
 }

 function qty(){
    while($i <= $item_qty){
        echo "<option value=".$i.">$i</option>";
        $i++;
    }
 }

 //make breadcrumb trail & display of item
 $display_block .= "
 <p><em>You are viewing:</em><br/>
 
 <strong><a href='showitem.php?cat_id=$cat_id'>$cat_title</a> &gt;
 $item_title</strong></p>
 <div style='float: left;'><img src='$item_image' alt='$item_title'/></div>
 <div style='float: left; padding-left: 12px'>
 <p><strong>Description:</strong><br/>$item_desc</p>
 <p><strong>Price:</strong> \$$item_price</p>";

 if($item_qty<=0){
     $display_block .= "
 <form method='post' action='addtocart.php'>
 ";
 } else{
    $display_block .= "
    <p>Left in stock: $item_qty</p>
    <form method='post' action='addtocart.php'>
    ";
 }
 


 $display_block .= "
 <p><label for=\"sel_item_qty\">Select Quantity:</label>
 <select id=\"sel_item_qty\" name=\"sel_item_qty\">";

 $i=1;
 while($i<=$item_qty) {
     
 $display_block .= "<option value=\"".$i."\">".$i."</option>";
 $i++;
 }

 $display_block .= <<<END_OF_TEXT
 </select></p>
 <input type="hidden" name="sel_item_id"
 value="$_GET[item_id]" />
 END_OF_TEXT;

 if($item_qty>0){
     $display_block .= <<<END_OF_TEXT
     <button type="submit" name="submit" value="submit" style="color: black">Add to Cart</button>
     </form>
     </div>
     END_OF_TEXT;
 } else {
    $display_block .= <<<END_OF_TEXT
    <p>Item out of stock.</p>
    </form>
    </div>
    END_OF_TEXT;
 }

 
 

 $display_block .= "</div>";
 $display_block .= "</div>";
 }
  mysqli_free_result($get_item_res);
 //close connection to MySQL
 mysqli_error($mysqli);
 mysqli_close($mysqli);
 ?>
<?php echo $display_block; ?>
</body>
</html>