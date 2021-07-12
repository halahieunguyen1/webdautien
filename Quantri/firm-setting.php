<?php

$x="";
$y="";
$w="";
$z="";
$submit='Thêm';
if (isset($_POST["submit"])){
	if(isset($_POST['user-firm'])){
    $a=$_POST['user-firm'];
    $b=$_POST['phone'];
    $c=$_POST['email'];
	$d=$_POST['species'];

	for ($i=0;$i<=count($d)-1;$i++){
		 $sql1[$i]="INSERT INTO product_species value('$d[$i]','$a')";
	}
    $sql="INSERT INTO firm values('$a','$b','$c')";
	}
	else
	{	$k=$_GET['setting_firm'];
		$b=$_POST['phone'];
    	$c=$_POST['email'];
		$d=$_POST['species'];
		$sql= "UPDATE firm SET phone = '$b',email = '$c' WHERE name='$k'";
		$sql0="DELETE FROM product_species WHERE firm='$k'";
		$query=mysqli_query($conn,$sql0);
		for ($i=0;$i<=count($d)-1;$i++){
			 $sql1[$i]="INSERT INTO product_species value('$d[$i]','$k')";
		}
	}
	$query=mysqli_query($conn,$sql);
	for ($i=0;$i<=count($d)-1;$i++){
		 $query=mysqli_query($conn,$sql1[$i]);
	}
header('location: home.php?page=supplier');
	
	}
	if (isset($_GET['setting_firm'])){
		$submit="Sửa";
		$k=$_GET['setting_firm'];
		$sql="SELECT * FROM firm WHERE name='$k'";
		$sql0="SELECT * FROM product_species WHERE firm='$k'";
		$query=mysqli_query($conn,$sql);
		$query0=mysqli_query($conn,$sql0);
		$row=mysqli_fetch_array($query);
		$x=$row['name'];
		$y=$row['phone'];
		$z=$row['email'];
		$w="";
		while ($row=mysqli_fetch_array($query0)){
			$w.=$row['name'];
		}
		
	}
	if (isset($_GET['delete_firm'])){
	
		$k=$_GET['delete_firm'];
		$sql="DELETE FROM firm WHERE name='$k'";
		$query=mysqli_query($conn,$sql);
		$sql="DELETE FROM product_species WHERE firm='$k'";
		$query=mysqli_query($conn,$sql);
		header('location: home.php?page=supplier');
}

?>

      
        <div class="form-firm-setting">

			<form action="" method="post" id="add-firm">
					<div class = "form-group">
						<label>Tên hãng</label>
						<?php 
						if ($x=="") echo "<input class='firm-name textValidate'type='text' name='user-firm' value='".$x."'> ";
						else echo  "<br><br><label class='firm-name ' >".$x."</label>";
						?>
					
						
						<span class="form-message"></span>
					</div>    
					<div class = "form-group">
						<label>Số điện thoại</label>
						<input type="text" class="phone textValidate" name="phone"<?php echo "value='".$y."'"  ?> >
						
						<span class="form-message"></span>
					</div>
					<div class = "form-group">
						<label>Email</label>
						<input type="text" class="email textValidate" name="email" <?php echo "value='".$z."'"  ?> >
						
						<span class="form-message"></span>
					</div>
					<div class = "form-group">
						<label>Sản phẩm cung cấp</br></label>
						<div class="form-group-checkbox">
							<div class="form-group-checkbox-item">
								<input type="checkbox" name="species[]" value="Máy tính xách tay" id="species_1" <?php if  (strpos($w,"Máy tính xách tay")!==false) echo "checked"; ?>>
								<label for="species_1"> Máy tính xách tay</label>
							</div>
							<div class="form-group-checkbox-item">
								<input type="checkbox" name="species[]" value="PC" id="species_2" <?php if  (strpos($w,"PC")!==false) echo "checked"; ?>>
								<label for="species_2"> PC</label>
							</div>
							<div class="form-group-checkbox-item">
								<input type="checkbox" name="species[]" value="Sever" id="species_3" <?php if  (strpos($w,"Sever")!==false) echo "checked"; ?>>
								<label for="species_3"> Sever</label>
							</div>
							<div class="form-group-checkbox-item">
								<input type="checkbox" name="species[]" value="Linh kiện" id="species_4" <?php if  (strpos($w,"Linh kiện")!==false) echo "checked"; ?>>
								<label for="species_4"> Linh kiện</label>
							</div>
							<div class="form-group-checkbox-item">
								<input type="checkbox" name="species[]" value="Phụ kiện" id="species_5" <?php if ( strpos($w,"Phụ kiện")!==false) echo "checked"; ?>>
								<label for="species_5">Phụ kiện</label>
							</div>
							<div class="form-group-checkbox-item">
								<input type="checkbox" name="species[]" value="Thiết bị livestream" id="species_6" <?php if  (strpos($w,"Thiết bị livestream")!==false) echo "checked"; ?>>
								<label for="species_6"> Thiết bị livestream</label>
							</div>
							<div class="form-group-checkbox-item">
								<input type="checkbox" name="species[]" value="Thiết bị mạng" id="species_7" <?php if  (strpos($w,"Thiết bị mạng")!==false) echo "checked"; ?>>
								<label for="species_7"> Thiết bị mạng</label>
							</div>
							<div class="form-group-checkbox-item">
								<input type="checkbox" name="species[]" value="Thiết bị văn phòng" id="species_8" <?php if  (strpos($w,"Thiết bị văn phòng")!==false) echo "checked" ;?>>
								<label for="species_8"> Thiết bị văn phòng</label>
							</div>
							<div class="form-group-checkbox-item">
								<input type="checkbox" name="species[]" value="Thiết bị hội nghị & giảng dạy" id="species_9" <?php if ( strpos($w,"Thiết bị hội nghị & giảng dạy")!==false) echo "checked"; ?>>
								<label for="species_9"> Thiết bị hội nghị & giảng dạy</label>
							</div>
							<div class="species[]">
								<input type="checkbox" name="species[]" value="Camera" id="species_10" <?php if ( strpos($w,"Camera")!==false) echo "checked"; ?>>
								<label for="species_10"> Camera</label>
							</div>
						</div>
						
					
					<div class="btn-box">
						<input type="submit" name="submit" <?php echo "value='".$submit."'" ?> class="submitValidate">
					</div>
				</form>
		</div>
     
        <script  src="../js/test.js"></script>
		<script>
			Validator(
				{
					form: '#add-firm',
					errorSelector:'.form-message',
					rules: [ 
					Validator.isRequired('.firm-name','Vui lòng nhập tên hãng'),
				
					Validator.isRequired('.phone','Vui lòng nhập số điện thoại'),
                    Validator.isEmail('.email','Vui lòng nhập Email')
				
					
					]

				}
			);

