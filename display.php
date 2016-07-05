<html>
<?php
	
	$port = "localhost:".getenv("S2G_MYSQL_PORT");
	$usr='root';
	$pwd='';

	$con = mysql_connect($port,$usr,$pwd);

	mysql_select_db('blog') or die("cannot connect to db");

	$query = "SELECT * FROM `posts` ORDER BY `id` DESC";

	$result = mysql_query($query,$con)or die("CONNECTION FAILED");

	while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
		?>
		<br><br>
		<textarea rows='10' cols='180' readonly><?php echo $row['post'];?></textarea><br><br><hr>
	
<?php }?>
</html>
