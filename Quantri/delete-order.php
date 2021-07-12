<?php


	if (isset($_GET['delete_order'])){
	
		$k=$_GET['delete_order'];
		$sql="DELETE FROM order_product WHERE id_order='$k'";
		$query=mysqli_query($conn,$sql);
		$sql="DELETE FROM detail_order WHERE id_order='$k'";
		$query=mysqli_query($conn,$sql);
		header('location: home.php?page=order');
}

?>