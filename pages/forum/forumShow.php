<?php
include 'forumConnect.php';
doDB();
//check for required info from the query string
if (!isset($_GET['topic_id'])) {
header("Location: forumDisplay.php");
exit;
}

//create safe values for use
$safe_topic_id = mysqli_real_escape_string($mysqli, $_GET['topic_id']);

//verify the topic exists
$verify_topic_sql = "SELECT topic_title FROM forum_topics
WHERE topic_id = '".$safe_topic_id."'";
$verify_topic_res = mysqli_query($mysqli, $verify_topic_sql)
or die(mysqli_error($mysqli));
if (mysqli_num_rows($verify_topic_res) < 1) {
    //this topic does not exist
    $display_block = "<p><em>You have selected an invalid topic.<br/>
    Please <a href=\"topiclist.php\">try again</a>.</em></p>";
    } else {
    
    //get the topic title
    while ($topic_info = mysqli_fetch_array($verify_topic_res)) {
    $topic_title = stripslashes($topic_info['topic_title']);
    }
    
    //gather the posts
    $get_posts_sql = "SELECT post_id, post_text,
    DATE_FORMAT(post_create_time,
    '%b %e %Y<br/>%r') AS fmt_post_create_time, post_owner
    FROM forum_posts
    WHERE topic_id = '".$safe_topic_id."'
    ORDER BY post_create_time ASC";
    $get_posts_res = mysqli_query($mysqli, $get_posts_sql)
    or die(mysqli_error($mysqli));
    
    //create the display string
    $display_block = <<<END_OF_TEXT
    <p>Showing posts for the <strong>$topic_title</strong> topic:</p>
    <table class='c-post-table'>
    <tr>
    <th>AUTHOR</th>
    <th>POST</th>
    </tr>
END_OF_TEXT;
    while ($posts_info = mysqli_fetch_array($get_posts_res)) {
    $post_id = $posts_info['post_id'];
    $post_text = nl2br(stripslashes($posts_info['post_text']));
    $post_create_time = $posts_info['fmt_post_create_time'];
    $post_owner = stripslashes($posts_info['post_owner']);
    //add to display
$display_block .= <<<END_OF_TEXT
    <tr>
    <td>$post_owner<br/><br/>
    created on:<br/>$post_create_time</td>
    <td>$post_text<br/><br/>
    <a href="forumReply.php?post_id=$post_id">
    <strong>REPLY TO POST</strong></a></td>
    </tr>
END_OF_TEXT;
    }
    //free results
    mysqli_free_result($get_posts_res);
    mysqli_free_result($verify_topic_res);
    //close connection to MySQL
    mysqli_close($mysqli);
    //close up the table
    $display_block .= "</table>";
    }
    ?>
<!DOCTYPE html>
<html>
<head>
<title>Posts in Topic</title>
<link rel="stylesheet" href="../../app.css">
<style>
    body{
        color: darkgrey;
    }
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
<h1>Posts</h1>
<?php echo $display_block; ?>
</body>
</html>