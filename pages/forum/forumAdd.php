<?php
include 'forumConnect.php';
doDB();
//check for required fields from the form
if ((!$_POST['topic_owner']) || (!$_POST['topic_title']) ||
(!$_POST['post_text'])) {
header("Location: forumForm.php");
exit;
}
//create safe values for input into the database
$clean_topic_owner = mysqli_real_escape_string($mysqli,$_POST['topic_owner']);
$clean_topic_title = mysqli_real_escape_string($mysqli,
$_POST['topic_title']);
$clean_post_text = mysqli_real_escape_string($mysqli,
$_POST['post_text']);
$category_id = mysqli_real_escape_string($mysqli, $_POST['category-dropdown']);
$category_res = mysqli_query($mysqli, "SELECT category_name FROM category;");

// $category_name = $_POST['category_name'];
switch($category_id){
    case 1:
    $category_name="Classic Rock";
    break;
    case 2:
    $category_name="Hard Rock";
    break;
    case 3:
    $category_name="Metal";
    break;
    case 4:
    $category_name="Punk Rock";
    break;
    case 5:
    $category_name="Jazz";
    break;
    default:
    break;
}

//create and issue the first query

$add_topic_sql = "INSERT INTO forum_topics
(topic_title, topic_create_time, topic_owner, category_id)
VALUES ('".$clean_topic_title ."', now(),'".$clean_topic_owner."','".$category_id."')";

$add_topic_res = mysqli_query($mysqli, $add_topic_sql)
or die(mysqli_error($mysqli));

//get the id of the last query
$topic_id = mysqli_insert_id($mysqli);

//create and issue the second query
$add_post_sql = "INSERT INTO forum_posts
(topic_id, post_text, post_create_time, post_owner, category_id)
VALUES ('".$topic_id."', '".$clean_post_text."',
now(), '".$clean_topic_owner."','".$category_id."')";

$add_post_res = mysqli_query($mysqli, $add_post_sql)
or die(mysqli_error($mysqli));

//close connection to MySQL
mysqli_close($mysqli);

//create nice message for user
$display_block = "<p>The <a href='forumDisplay.php'><strong>".$_POST["topic_title"]."</strong></a> topic for the ".$category_name." has been created.</p>";
?>

<!DOCTYPE html>
<html>
<head>
<title>New Topic Added</title>
</head>
<body>
<h1>New Topic Added</h1>
<?php echo $display_block;

?>
</body>
</html>