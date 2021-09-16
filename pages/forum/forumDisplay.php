<?php
include 'forumConnect.php';
doDB();

$cate = 1;
if(isset($_POST['submit'])){
  $cate = $_POST['cate'];
}
//gather the topics
$get_topics_sql = "SELECT topic_id, topic_title, category_id,
DATE_FORMAT(topic_create_time, '%b %e %Y at %r') AS
fmt_topic_create_time, topic_owner FROM forum_topics WHERE category_id = '".$cate."'
ORDER BY topic_create_time DESC";

$get_topics_res = mysqli_query($mysqli, $get_topics_sql)
or die(mysqli_error($mysqli));

if (mysqli_num_rows($get_topics_res) < 1) {
//there are no topics, so say so
$display_block = "<p><em>No topics exist.</em></p>";
} else {

//create the display string
$display_block = <<<END_OF_TEXT
<table class="c-topic-table">
<tr>
<th>TOPIC TITLE</th>
<th># of POSTS</th>
</tr>
END_OF_TEXT;

while ($topic_info = mysqli_fetch_array($get_topics_res)) {
$topic_id = $topic_info['topic_id'];
$topic_title = stripslashes($topic_info['topic_title']);
$topic_create_time = $topic_info['fmt_topic_create_time'];
$topic_owner = stripslashes($topic_info['topic_owner']);

//get number of posts
$get_num_posts_sql = "SELECT COUNT(post_id) AS post_count FROM
forum_posts WHERE topic_id = '".$topic_id."'";
$get_num_posts_res = mysqli_query($mysqli, $get_num_posts_sql)
or die(mysqli_error($mysqli));
while ($posts_info = mysqli_fetch_array($get_num_posts_res)) {
$num_posts = $posts_info['post_count'];
}

//add to display
$display_block .= <<<END_OF_TEXT
<tr>
<td><a href="forumShow.php?topic_id=$topic_id">
<strong>$topic_title</strong></a><br/>
Created on $topic_create_time by $topic_owner</td>
<td class="num_posts_col">$num_posts</td>
</tr>
END_OF_TEXT;
}

//free results
mysqli_free_result($get_topics_res);
mysqli_free_result($get_num_posts_res);

//close connection to MySQL
mysqli_close($mysqli);

//close up the table
$display_block .= "</table>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Topics in My Forum</title>
<link rel="stylesheet" href="../../app.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"
      rel="stylesheet"
    />
    
</head>
<body>
<header>
<img class="logo" src="../../images/logofinal1.png" alt="Retro Records logo" />
      <nav class="desktopMenu">
        <ul class="nav__links">
          <li><a href="../../index.html">Home</a></li>
          <li><a href="../../pages/retro-records/retro-records.html">Retro Records</a></li>
          <li><a href="./pages/forum/forumDisplay.php">Forum</a></li>
          <li><a href="../shop/view_cat.php">Shop</a></li>
        </ul>
      </nav>
      <a class="d-cta" href="./pages/contact/contact.html">Contact</a>
</header>
<br><br><br>
<form action='forumDisplay.php' method='POST' class="category" style="display: flex; margin: 1rem auto; position: relative; align-content: center; justify-content: center">

<select name='cate' id='cate'>
<option value='1'>Classic Rock</option>
<option value='2'>Hard Rock</option>
<option value='3'>Metal</option>
<option value='4'>Punk Rock</option>
<option value='5'>Jazz</option>
</select>
<button name='submit' type='submit' style="color: black;">show</button>
</form>
<?php echo $display_block; ?>
<p><a id="add" href="forumAdd.php" class="c-add-topic-button">add a topic</a></p>
</body>
</html>