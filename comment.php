<html>
<?php


	
	$id = $_POST['id'];

	//echo $id;


	//echo $post;	
	
	$port = "localhost:".getenv("S2G_MYSQL_PORT");
	$usr='root';
	$pwd='';

	$con = mysql_connect($port,$usr,$pwd);

	mysql_select_db('blog') or die("cannot connect to db");

	$query1 = "SELECT * FROM `comment$id`";

	$result1 = mysql_query($query1,$con);

	$query = "CREATE TABLE `comment$id`(id int UNIQUE AUTO_INCREMENT,comment varchar(1000))";

	//echo $result1;CREATE TABLE  `comment3` (id INT UNIQUE AUTO_INCREMENT ,COMMENT VARCHAR( 1000 ))

	if(!$result1){
	$result = mysql_query($query,$con) or die("connection failed");
	}


?>

<a href='home.php'><button type='button'>BACK TO POSTS</button></a>
<center>
<b>ENTER COMMENTS</b>

	<form action='store_comment.php' method='POST'>
		<textarea name='post' rows='20' cols='50'></textarea><br>
		<input type='text' value="<?php echo $id;?>" name='id' hidden></input>
		<input type='submit' value='comment'></input>

	</form>


<br><br><br>
<b>PUBLISHED COMMENTS</b><br><br><br>


<?php
$query = "SELECT * FROM `comment$id` ORDER BY `id` DESC";

	$result = mysql_query($query,$con)or die("CONNECTION FAILED");

	if(!mysql_fetch_array($result,MYSQL_ASSOC)){
		echo "NO COMMENTS TO DISPLAY";
	}


	else{
	$query = "SELECT * FROM `comment$id` ORDER BY `id` DESC";
	$result = mysql_query($query,$con)or die("CONNECTION FAILED");
	while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
		?>
		<br><br>
		<textarea rows='10' cols='180' readonly><?php echo $row['comment'];?></textarea>

		<br><br><hr>
	
<?php }
	
}
?>
</html>	


