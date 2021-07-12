

<?php

if (isset($_POST["submit"])){
	$user=$_POST["username"];
	$pass=$_POST["password"];
	$sql="SELECT * FROM account WHERE account_name='$user' AND password='$pass'";
	$query=mysqli_query($conn,$sql);
	 if (mysqli_num_rows($query)>0){
		$row = mysqli_fetch_array($query);
		echo $row['name'];
		$_SESSION['name']=$row['name'];
		$_SESSION['user-name']=$user;
		header('location: index.php');
	
	}
	else 
	echo 'Đăng nhập thất bại';
	
}

?>
<div class="col l-12 m-12 c-12">
				<div class="auth-form log-in-form">
					<div class="auth-form__hearder">
					
						<a href="index.php" class="auth-form__switch-btn">Trang chủ/</a>
						<span class="auth-form__hearding">Đăng nhập</span>
			
					
					</div>
					<div class="auth-form__container">
						<div class="auth-form__title">
							Đăng nhập tài khoản 
						</div>
						<div class="row auth-form__main">
							<form method='post' action='' class="auth-form__form col l-5 m-8 m-o-2 c-12">
								
								<div class="auth-form__group">
									<label class="auth-form__group-label">UserName</label>
									<input id="user-name"name='username' class="auth-group__input" type="text">
									<span class="form-message"></span>
								</div>
								<div class="auth-form__group">
									<label class="auth-form__group-label">Mật khẩu</label>
									<input id="password" name='password'class="auth-group__input" type="text" placeholder="Vui lòng nhập tối thiểu 6 kí tự">
									<span class="form-message"></span>
								</div>
								
								<div class="auth-form__controls">
					
									<input type='submit'name='submit' value='Đăng Nhập' class="btn btn--primary">
								</div>
							
							</form>
							<div class="auth-form__form2 col l-7 m-0 m-o-2 c-0">
									<img src="../images/1.png" width="100%" height='auto' alt="">
							</div>
						</div>
					
					</div>
				</div>
            </div>  
			<script  src="../js/test.js"></script>
			<script>
			Validator(
				{
					form: '.auth-form__form',
					errorSelector:'.form-message',
					rules: [ 
						Validator.isRequired('#user-name','Vui lòng nhập tên đăng nhập'),
						Validator.minLength('#password',6),
					]

				}
			);
		</script>	
