<?php
ob_start();
session_start();
include_once './ketnoi.php';
if (isset($_POST["submit"])){
	$user=$_POST["username"];
	
	$pass=$_POST["password"];
	$sql="SELECT * FROM account WHERE account_name='$user' AND password='$pass'";
	$query=mysqli_query($conn,$sql);
	$row=mysqli_num_rows($query);
	if($row>0){
		$_SESSION["user-name"]=$user;
		$_SESSION["passwword"]=$pass;
		header('location: home.php');
	}
	else{
	
	}
}
else{
	echo 'thất bại';

}
?>