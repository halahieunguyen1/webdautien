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
		$_SESSION["password"]=$pass;
		header('location: home.php');
	}
	else{
	
	}
}

?>
<!DOCTYPE html>
<html>
    <head>
		<link rel= "stylesheet" type="text/css" href="../css/reset.css">
		<link rel= "stylesheet" type="text/css" href="../css/Log.css">
		<link rel= "stylesheet" type="text/css" href="../css/base.css">
	</head>
	<body>
		<div class="container container--dangki">
    		<div class = "header">
        		<h2>Đăng nhập</h2>
    		</div>
    		<form action="" class = "form" id ="form" method="post" >
        		<div class = "form-group">
            		<label>UserName</label>
            		<input id="user-name"type="text" name="username" class="textValidate" >
					<span class="form-message"></span>
        		</div>    
				<div class = "form-group">
            		<label>Password</label>
            		<input type="password" id="password" name="password" class="textValidate">
					
					<span class="form-message">
					<?php if ((isset($row))&&(!$row>0)){
						echo "Tài khoản và mật khẩu không chính xác";
					 } ?>
					 </span>
        		</div>
				
				<div class="btn-box">
            		<input type="submit" name="submit" value="Submit" class="submitValidate">
        		</div>
				Nhập UserName: halahieunguyen<br>
				Password: hieuhala127 
				<br>
				Để có thể vào website Quản trị
    		</form>
		</div>
		<script  src="../js/test.js"></script>
		<script>
			Validator(
				{
					form: '#form',
					errorSelector:'.form-message',
					rules: [ 
					Validator.isRequired('#user-name',"Vui lòng nhập tên đăng nhập"),
				
					Validator.minLength('#password',6),
				
					
					]

				}
			);
		</script>	 
	</body>
</html>