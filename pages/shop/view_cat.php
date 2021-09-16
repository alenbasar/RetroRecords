

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../../app.css" />
<style>
    .o-categories{
        display: flex;
        flex-direction: column;
        background-color: #0000006c;
    }
    .o-list__item{
        /* background-color: #0000006c; */
        width: max-content;
        margin: auto;
        list-style: none;
        text-align: left;
    }
    .ajax{
      display: flex;
      flex-direction: row;
      align-content: center;
      justify-content: center;
      margin-top: 0;
      margin: auto; 
    }
    .ajax-form{
      align-self: center;
    }
</style>
<title>My Categories</title>
<script>
function showHint(str) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "bands.php?q=" + str, true);
    xmlhttp.send();
  }
}
</script>
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
</header><p style="color: white"><b>Start typing a name in the input field below:</b></p>
<div class="ajax">
  
<form action="" class="ajax-form">
  <label for="fname" style="color: white">Artist:</label>
  <input type="text" id="fname" name="fname" onkeyup="showHint(this.value)" >
</form>

</div>
<h4 style="text-align: center; color: grey;">Suggestions: <span id="txtHint"></span></h4>
<?php
//connect to database
$mysqli = mysqli_connect("localhost", "root", "", "scripting-server-db");
$display_block = "";
$display_block .= "<div class='o-categories'>";
//show categories first
$get_cats_sql = "SELECT id, cat_title, cat_desc FROM store_categories ORDER BY cat_title";
$get_cats_res = mysqli_query($mysqli, $get_cats_sql)
or die(mysqli_error($mysqli));
if (mysqli_num_rows($get_cats_res) < 1) {
$display_block = "<p><em>Sorry, no categories to browse.</em></p>";
} else {
    
while ($cats = mysqli_fetch_array($get_cats_res)) {
$cat_id = $cats['id'];
$cat_title = strtoupper(stripslashes($cats['cat_title']));
$cat_desc = stripslashes($cats['cat_desc']);

$display_block .= "<p><strong><a href=\"".$_SERVER['PHP_SELF']."?cat_id=".$cat_id."\">".$cat_title."</a></strong ><br/><h4 style='color: grey; text-align: center'>".$cat_desc."</h4></p>";


if (isset($_GET['cat_id']) && ($_GET['cat_id'] == $cat_id)) {
//create safe value for use
$safe_cat_id = mysqli_real_escape_string($mysqli,$_GET['cat_id']);

//get items
$get_items_sql = "SELECT id, item_title, item_price
FROM store_items
WHERE cat_id = '".$cat_id."' ORDER BY item_title";
$get_items_res = mysqli_query($mysqli, $get_items_sql)
or die(mysqli_error($mysqli));
if (mysqli_num_rows($get_items_res) < 1) {
$display_block = "<p><em>Sorry, no items in this
category.</em></p>";
} else {
$display_block .= "<ul class='o-list' style='text-align: center'>";
while ($items = mysqli_fetch_array($get_items_res)) {
$item_id = $items['id'];
$item_title = stripslashes($items['item_title']);
$item_price = $items['item_price'];
$display_block .= "<li class='o-list__item'><a href=\"showitem.php?item_id=".$item_id."\">".$item_title."</a>(\$".$item_price.")</li>";
}
$display_block .= "</ul>";
}
//free results
mysqli_free_result($get_items_res);
}
}
}
$display_block .= "</div>";
//free results
mysqli_free_result($get_cats_res);
//close connection to MySQL
mysqli_close($mysqli);
?>
<?php echo $display_block; ?>
</body>
</html>