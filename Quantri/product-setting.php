<?php

$name_product="";
$species="";
$firm="";
$image="";
$price="";
$parameter_product="";
$describle_product="";
$submit='Thêm';

if (isset($_POST["submit"])){
	if(isset($_POST['name-product'])){
		$name_product=$_POST['name-product'];
		$species=$_POST['species'];
		$firm=$_POST['firm'];

		$price=$_POST['price'];
		$parameter_product=$_POST['parameter_product'];
		$describle_product=$_POST['describle_product'];
		move_uploaded_file($_FILES['image']['tmp_name'],'../images/'.$_FILES['image']['name']);
		$image=$_FILES['image']['name'];
		$query=mysqli_query($conn,"SELECT MAX(id_product) FROM product");
		$row=mysqli_fetch_array($query);
		$id_product=$row['id_product']+1;
    	$sql="INSERT INTO product values('$name_product','$firm','$parameter_product','$image','$species','$describle_product',0,$price,0,NULL,0,0)";
		$query=mysqli_query($conn,$sql);
		header("location: home.php?page=chitietsanpham&id=".$id_product);
		
	}

	else if(isset($_POST['parameter_product']))
	{	
		$id_product=$_GET['product-setting'];
		$sql="SELECT * FROM product WHERE id_product='$id_product'";
		$query=mysqli_query($conn,$sql);
		$row=mysqli_fetch_array($query);
		$species=$_POST['species'];
		$firm=$_POST['firm'];
		$price=$_POST['price'];
		$image=$row['image'];
		$sale=$_POST['sale'];
		if($_FILES['image']['name']!=="")
	
		{	unlink('../images/'.$image);
			move_uploaded_file($_FILES['image']['tmp_name'],'../images/'.$_FILES['image']['name']);
			 $image=$_FILES['image']['name'];
		}
		$parameter_product=$_POST['parameter_product'];
		$describle_product=$_POST['describle_product'];
		if (strpos($sale,"%"))
		{
			$sale1=(int)substr($sale,0,-1);
			$price_sale=$price-(int)$price*(100-$sale1)/100 ;
		}                
		else $price_sale=(int)$sale;
	
		$sql= "UPDATE product SET sale='$sale',species = '$species',firm = '$firm',image = '$image',parameters_product = '$parameter_product',price = '$price',price_sale = '$price_sale',describle_product = '$describle_product' WHERE id_product='$id_product'";
		$query=mysqli_query($conn,$sql);
		header("location: home.php?page=chitietsanpham&id=".$id_product);
		
	} 

	
	}
	if (isset($_GET['product-setting'])){
		$submit="Sửa";
		$id_product=$_GET['product-setting'];
		$sql="SELECT * FROM product WHERE id_product='$id_product'";
		$query=mysqli_query($conn,$sql);
		$row=mysqli_fetch_array($query);
		$name_product=$row['name_product'];
		$species=$row['species'];
		$firm=$row['firm'];
		$image=$row['image'];
		
		$price=$row['price'];
		$parameter_product=$row['parameters_product'];
		$describle_product=$row['describle_product'];
		$sale=$row['sale'];

	}

	if (isset($_GET['delete_product'])){
	
		$id_product=$_GET['delete_product'];
		$sql="DELETE FROM product WHERE id_product='$id_product'";
		$query=mysqli_query($conn,$sql);
		header('location: home.php?page=product');
}

?>

      
           
        <div class="form-product-setting">
		<form action="" method="post" id="add-firm" enctype="multipart/form-data">
                <div class="form-product-setting-layout1">
					<div class = "form-group">
						<label>Tên sản phẩm</label>
						<?php 
						if ($name_product=="") echo "<input class='firm-name textValidate'type='text' name='name-product' value='".$name_product."'> ";
						else echo  "<br><br><label style='color:red;font-size:30px;' class='firm-name ' >".$name_product."</label><br><br>
						<label>Loại sản phẩm:".$species."</label><br><br>Hãng:".$firm;
						?>
					
						
						<span class="form-message"></span>
					</div>    
					<?php 
						if (!isset($_GET['product-setting']))
						include_once('./select.php');
						
					?>
					<div class = "form-group">
						<label>Ảnh:</label>
						<input type="file" class="image" name="image"  >
						
						<span class="form-message"></span>
					</div>
					<div class = "form-group">
						<label>Giá gốc</label>
						<input type="text" class="price textValidate" name="price" <?php echo "value='".$price."'"  ?> >
						
						<span class="form-message"></span>
					</div>
					<?php 
						if (isset($_GET['product-setting'])){
							echo "<div class = 'form-group'>
							<label>Khuyến mại</label>
							<input type='text' class='price textValidate' name='sale' value='".$sale."' >
							
							<span class='form-message'></span>
						</div>";
						}
					?>
				</div>
				<div class="form-product-setting-layout">
					<?php 
					 if (!empty($image))
				
						 echo "<img width='100%' height='100%' src='../images/".$row['image']."' alt='' class='img-product'>"
					 
					?>
				</div>
				<div class="form-product-setting-layout2">
					<div class = "form-group">
						<label style='color:red;font-size:30px;'>Thông số kĩ thuật</label>
						<textarea  rows="10" cols="100" class="parameter_product textValidate" name="parameter_product" ><?php echo $parameter_product; ?>
						</textarea>
						
						<span class="form-message"></span>
					</div>
					<div class = "form-group">
						<label style='color:red;font-size:30px;'>Miêu tả sản phẩm</label>
						<textarea rows="10" cols="100" class="describle_product textValidate" name="describle_product"><?php echo $describle_product; ?></textarea>
						
						<span class="form-message"></span>
					</div>
					<div class="btn-box">
						<input type="submit" name="submit" <?php echo "value='".$submit."'" ?> class="submitValidate">
					</div>
				</div>
				
            </form>
		</div>
        </div>
        <script  src="../js/test.js"></script>
		<script>
			Validator(
				{
					form: '#add-firm',
					errorSelector:'.form-message',
					rules: [ 
					Validator.isRequired('.name-product','Vui lòng nhập tên hãng'),
				
					Validator.isRequired('.firm','Vui lòng nhập số điện thoại'),
                    Validator.isEmail('.price','Vui lòng nhập Email')
				
					
					]

				}
			);
 