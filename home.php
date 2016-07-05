<html>
<head>
	<title>home</title>
</head>
<body>

	<center><h1>WELCOME TO WEBLOG</h1><br>

	<a href="get_post.php"><button type='button'>Create New Post</button></a><br><br>


<?php
	
	$port = "localhost:".getenv("S2G_MYSQL_PORT");
	$usr='root';
	$pwd='';

	$con = mysql_connect($port,$usr,$pwd);

	mysql_select_db('blog') or die("cannot connect to db");

	$query = "SELECT * FROM `posts` ORDER BY `id` DESC";

	$result = mysql_query($query,$con)or die("CONNECTION FAILED");

	if(!(mysql_fetch_array($result,MYSQL_ASSOC))){
		echo "NO POSTS TO DISPLAY";
	}


	else{

	$result = mysql_query($query,$con)or die("CONNECTION FAILED");
	while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
		?>
		<br><br>
		<textarea rows='10' cols='180' readonly><?php echo $row['post'];?></textarea>

		<form action='comment.php' method='POST'>
		<input type='text' value="<?php echo $row['id'];?>" name='id' hidden></input>
		<input type='submit' value='add/see comment'></input>
		</form>
		<br><br><hr>
	
<?php 

}
	
}
?>
</body>
</html>
