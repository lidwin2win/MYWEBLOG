<html>
<center>
<?php
	$input = $_POST['post'];

	$id = $_POST['id'];

	//echo $id;

	if(empty(trim($input)))
		echo "the comment is empty please enter a valid comment!";


	//echo $post;	
	else{
	$port = "localhost:".getenv("S2G_MYSQL_PORT");
	$usr='root';
	$pwd='';

	$con = mysql_connect($port,$usr,$pwd);

	mysql_select_db('blog') or die("cannot connect to db");

	$query = "INSERT INTO `comment$id`(`comment`)VALUES('$input')";

	$result = mysql_query($query,$con) or die("connection failed");

	if($result){
	echo "Comment Added Succesfully click the link below to view it!"
?>

	
		<form action='comment.php' method='POST'>
		<input type='text' value="<?php echo $id;?>" name='id' hidden></input>
		<input type='submit' value='view comment'></input>
		</form>
<?php
	}
	}

?>

<form action='comment.php' method='POST'>
		<input type='text' value="<?php echo $id;?>" name='id' hidden></input>
		<input type='submit' value='GO BACK'></input>
		</form> 

</html>	


