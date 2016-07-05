<html>
<center>
<?php
	$input = $_POST['post'];

	if(empty(trim($input)))
		echo "the post is empty";
	//echo $post;

	else{	
	
	$port = "localhost:".getenv("S2G_MYSQL_PORT");
	$usr='root';
	$pwd='';

	$con = mysql_connect($port,$usr,$pwd);

	mysql_select_db('blog') or die("cannot connect to db");

	$query = "INSERT INTO `posts`(`post`)VALUES('$input')";

	$result = mysql_query($query,$con) or die("connection failed");

	if($result){
	header("Location: http://localhost/CTF2/home.php");
	die();
	}
}

?>
<br>
<br>
<a href='get_post.php'><button type='button'>GO BACK</button></a>


</html>	


