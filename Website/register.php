

<?php

if (isset($_POST["submit"])){
	$user=$_POST["username"];
	$pass=$_POST["password"];
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$email=$_POST['email'];
	$sql="INSERT INTO account values('$user','$pass','$name','$phone','$address','$email',0,NOW())";
	$query=mysqli_query($conn,$sql);
	$_SESSION["name"]=$name;
	$_SESSION["user-name"]=$user;
	$_SESSION["password"]=$pass;
	
	header('location: index.php');
}

?>
<div class="col l-12 m-12 c-12">
				<div class="auth-form register-form">
					<div class="auth-form__hearder">
					
						<a href="index.php" class="auth-form__switch-btn">Trang chủ/</a>
						<span class="auth-form__hearding">Đăng ký</span>
			
					
					</div>
					<div class="auth-form__container">
						<div class="auth-form__title">
							Đăng kí tài khoản 
						</div>
						<div class="row auth-form__main">
							<form method='post' action='' class="auth-form__form col l-5 m-8 m-o-2 c-12">
								<div class="auth-form__group">
									<label class="auth-form__group-label">Họ tên</label>
									<input name='name'id="name" class="auth-group__input" type="text" placeholder="VD:Nguyễn Văn Hiếu">
									<span class="form-message"></span>
								</div>
								<div class="auth-form__group">
									<label class="auth-form__group-label">UserName</label>
									<input id="user-name"name='username' class="auth-group__input" type="text" placeholder="VD:hieu123456">
									<span class="form-message"></span>
								</div>
								<div class="auth-form__group">
									<label class="auth-form__group-label">Mật khẩu</label>
									<input id="password" name='password'class="auth-group__input" type="text" placeholder="Vui lòng nhập tối thiểu 6 kí tự">
									<span class="form-message"></span>
								</div>
								<div class="auth-form__group">
									<label class="auth-form__group-label">Nhập lại mật khẩu</label>
									<input id="confirm-password" class="auth-group__input" type="text" placeholder="Vui lòng xác nhận lại mật khẩu">
									<span class="form-message"></span>
								</div>
								<div class="auth-form__group">
									<label class="auth-form__group-label">Số điện thoại</label>
									<input id="phone" name='phone'class="auth-group__input" type="text" placeholder="Vui lòng nhập số điện thoại">
									<span class="form-message"></span>
								</div>
								<div class="auth-form__group">
									<label class="auth-form__group-label">Email</label>
									<input id="email"name='email' class="auth-group__input" type="text" placeholder="VD:abc@gmail.com">
									<span class="form-message"></span>
								</div>
								<div class="auth-form__group">
									<label class="auth-form__group-label">Địa chỉ</label>
									<input id="address"name='address' class="auth-group__input" type="text" placeholder="Vui lòng nhập địa chỉ">
									<span class="form-message"></span>
								</div>
								
								<div class="auth-form__controls">
					
									<input type='submit'name='submit' value='Đăng Ký' class="btn btn--primary">
								</div>
							
							</form>
							<div class="auth-form__form2 col l-7 m-0 m-o-2 c-0">
									<img src="../images/1.png" width="100%" height='auto' alt="">
							</div>
						</div>
					
					</div>
				</div>
            </div>  
			
			<script>
			Validator(
				{
					form: '.auth-form__form',
					errorSelector:'.form-message',
					rules: [ 
						Validator.isRequired('#name','Vui lòng nhập tên đầy đủ'),
						Validator.isRequired('#user-name','Vui lòng nhập tên đăng nhập'),
						Validator.isPhone('#phone','Vui lòng nhập số điện thoại'),
						Validator.isRequired('#address','Vui lòng nhập địa chỉ'),
						Validator.isEmail('#email','Vui lòng nhập email'),
						Validator.minLength('#password',6),
						Validator.confirm('#confirm-password',function (){
							return document.querySelector('.auth-form__form #password').value;
					})
					]

				}
			);
		</script>	
