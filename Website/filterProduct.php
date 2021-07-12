<?php
 require("ketnoi.php");
 if (isset($_POST['value'])){
	$species=$_POST['species2'];
	$search=$_POST['search1'];
	$where='';
	if (!$species=='') $where=" WHERE species='$species'";
	if (!$search=='') $where=" WHERE name_product LIKE '%".$search."%'";
	$data="";
	$sql="SELECT * FROM product".$where."";
	$query=mysqli_query($conn,$sql);
	$total_row=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM product".$where));
	$num_page=ceil($total_row/24);
    switch ($_POST['value'])   {
        case 'all': $sql="SELECT * FROM product".$where." ORDER BY    name_product  LIMIT 0,24 ";
	   break;
	   case 'Phổ biến':$sql="SELECT * FROM product".$where." ORDER BY    number_pay DESC LIMIT 0,24 ";
	   break;
	   case 'Mới nhất':$sql="SELECT * FROM product".$where." ORDER BY    id_product DESC LIMIT 0,24 ";
		break;
	   case 'Khuyến mại':$sql="SELECT * FROM product".$where." ORDER BY   price_sale DESC LIMIT 0,24 ";
		break;
		case 'Từ thấp đến cao': $sql="SELECT * FROM product".$where." ORDER BY    price LIMIT 0,24 ";
		break;
		case 'Từ cao đến thấp': $sql="SELECT * FROM product".$where." ORDER BY    price DESC LIMIT 0,24 ";
		break;
	   default:$sql="SELECT * FROM product".$where." ORDER BY    name_product  LIMIT 0,24 ";
	   break;
    }
     $query=mysqli_query($conn,$sql);
   $list_page="";
   for($i=1;$i<=$num_page;$i++){
     if ($i==1) $list_page.='<li class="page phantrang_active"  value="'.$i.'" id="phantrang_active">'.$i.'</li>';
     else
     $list_page.='<li class="page" onclick="phanTrang_productweb('.$i.','.$num_page.')" value="'.$i.'" >'.$i.'</li>';
 }      
 while ($row=mysqli_fetch_array($query)){
    $x=(int)substr($row['sale'],0,-1);
										if (strpos($row['sale'],"%"))
										{
											
											$price_new= (int)$row['price']*(100-$x)/100 ;
										}                
										else $price_new =(int)$row['price'] - $x;
										
										if ($row['sale']!=0) {
											if (strpos($row['sale'],"%"))
											$sale=	"<div class='product-item__price'>
													<span class='product-item__numbers'>Còn:".$row['numbers']."</span>
													<span class='product-item__price-old'>".$row['price']." đ</span>
													<span class='product-item__price-new'>".$price_new." đ</span>
													</div><div class='producct-item__sale-off'>
													<div class='product-item__sale-off-label'>Giảm</div>
														<div class='product-item__sale-off-percent'>".$row['sale']."</div>
													</div>";
												else
												$sale=	"<div class='product-item__price'>
													<span class='product-item__numbers'>Còn:".$row['numbers']."</span>
													<span class='product-item__price-old'>".$row['price']." đ</span>
													<span class='product-item__price-new'>".$price_new." đ</span>
													</div><div class='producct-item__sale-off producct-item__sale-off-vnd '>
														
														<div class='product-item__sale-off-label'>Giảm</div>
														<div class='product-item__sale-off-percent'>".$row['sale']."</div>
													</div>";
											}
									else $sale="<div class='product-item__price'>
									<span class='product-item__numbers'>Còn:".$row['numbers']."</span>
									<span class='product-item__price-old'></span>
									<span class='product-item__price-new'>".$price_new." đ</span>
								</div>";	
								$a=$row['name_product'];
                                $data.="<div class='col l-4 m-4 c-6'>
										<a href='index.php?page=chitietsanpham&id=".$row['id_product']."'>
										<div class='product-item'>
										<div class='product-item__img' style='background-image:url(../images/".$row['image'].");'></div>
										<h5 class='product-item__name'>".$row['name_product']."</h5>
										".$sale."</div></a></div>";                                   
   
}
   
$data.="???".$list_page;
 echo $data;
}
//------------------------------------------------------------------------------------------------------------------------------ 
if (isset($_POST['species1'])){
	$species=$_POST['species1'];
	if ($species=='') $where='';
	else $where=" WHERE species='$species'";
	$data="";
	$sql="SELECT * FROM product".$where."";
	$query=mysqli_query($conn,$sql);
	$total_row=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM product".$where));
	$num_page=ceil($total_row/24);
	
	$sql="SELECT * FROM product".$where." ORDER BY    name_product  LIMIT 0,24 ";

     $query=mysqli_query($conn,$sql);
   $list_page="";
   for($i=1;$i<=$num_page;$i++){
     if ($i==1) $list_page.='<li class="page phantrang_active"  value="'.$i.'" id="phantrang_active">'.$i.'</li>';
     else
     $list_page.='<li class="page" onclick="phanTrang_productweb('.$i.','.$num_page.')" value="'.$i.'" >'.$i.'</li>';
 }      
 while ($row=mysqli_fetch_array($query)){
    $x=(int)substr($row['sale'],0,-1);
										if (strpos($row['sale'],"%"))
										{
											
											$price_new= (int)$row['price']*(100-$x)/100 ;
										}                
										else $price_new =(int)$row['price'] - $x;
										
										if ($row['sale']!=0) {
											if (strpos($row['sale'],"%"))
											$sale=	"<div class='product-item__price'>
													<span class='product-item__numbers'>Còn:".$row['numbers']."</span>
													<span class='product-item__price-old'>".$row['price']." đ</span>
													<span class='product-item__price-new'>".$price_new." đ</span>
													</div><div class='producct-item__sale-off'>
													<div class='product-item__sale-off-label'>Giảm</div>
														<div class='product-item__sale-off-percent'>".$row['sale']."</div>
													</div>";
												else
												$sale=	"<div class='product-item__price'>
													<span class='product-item__numbers'>Còn:".$row['numbers']."</span>
													<span class='product-item__price-old'>".$row['price']." đ</span>
													<span class='product-item__price-new'>".$price_new." đ</span>
													</div><div class='producct-item__sale-off producct-item__sale-off-vnd '>
														
														<div class='product-item__sale-off-label'>Giảm</div>
														<div class='product-item__sale-off-percent'>".$row['sale']."</div>
													</div>";
											}
									else $sale="<div class='product-item__price'>
									<span class='product-item__numbers'>Còn:".$row['numbers']."</span>
									<span class='product-item__price-old'></span>
									<span class='product-item__price-new'>".$price_new." đ</span>
								</div>";	
								$a=$row['name_product'];
                                $data.="<div class='col l-4 m-4 c-6'>
										<a href='index.php?page=chitietsanpham&id=".$row['id_product']."'>
										<div class='product-item'>
										<div class='product-item__img' style='background-image:url(../images/".$row['image'].");'></div>
										<h5 class='product-item__name'>".$row['name_product']."</h5>
										".$sale."</div></a></div>";                                   
   
}
   
$data.="???".$list_page;
 echo $data;
}
//------------------------------------------------------------------------------------------------------------------    

?>