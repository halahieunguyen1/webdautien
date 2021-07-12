<?php
		$number=(int)$_POST['number']+(int)$_GET['number'];
		$id=$_GET['id_product'];
		$sql="UPDATE product SET  numbers='$number' WHERE id_product='$id'";
	
		$query=mysqli_query($conn,$sql);
		header("location: home.php?page=chitietsanpham&id=".$id);
?>