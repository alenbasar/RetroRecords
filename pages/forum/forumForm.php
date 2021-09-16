<!DOCTYPE html>

<html>
<head>
<link rel="stylesheet" href="../../app.css">
<title>Add a Topic</title>
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
require_once("forumConnect.php");
doDB();
$sql = "SELECT * FROM category";
$res = mysqli_query($mysqli, $sql);
echo "<h1>Add a Topic</h1>";
echo "<form method='post' action='forumAdd.php' class='c-topic-form'>";
echo"<select name='category-dropdown' class='c-topic-form__dropdown'>";
while($array=mysqli_fetch_array($res)){
echo "<option value='".$array["category_id"]."'>".$array["category_name"]."</option>";
}
echo "</select>";
?>
<p><label for="topic_owner">Your Email Address:</label><br/>
<input type="email" id="topic_owner" name="topic_owner" size="40" maxlength="150" required="required" /></p>
<p><label for="topic_title">Topic Title:</label><br/>
<input type="text" id="topic_title" name="topic_title" size="40" maxlength="150" required="required" /></p>
<p><label for="post_text">Post Text:</label><br/>
<textarea id="post_text" name="post_text" rows="8" cols="40" ></textarea></p>
<button type="submit" name="submit" value="submit" class="c-topic-form__submit">Add Topic</button>
</form>
</body>
</html>