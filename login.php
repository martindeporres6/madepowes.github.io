<?php

session_start();
?>



<?php
$username=$_POST['username'];
$password=$_POST['password'];
$con=@mysql_connect("localhost","root","") or die(mysql_error());
$db=@mysql_select_db("clinic",$con)or die(mysql_error());

$sql="SELECT * FROM login WHERE username='$username' and password='$password'";

$result=mysql_query($sql);

$count=mysql_num_rows($result);

if($count<1){
	header("location:index.html");
	echo "Wrong Username or Password";
}
else
	{
		$_SESSION[user]=$username;
		header("location:home.php");
	}

ob_end_flush();