<?php
   require("ketnoi.php");

 if (isset($_POST['num3']))
 {
   $data="";
   $species=$_POST['species3'];
   $first_row=($_POST['page']-1)*24;
   switch ($species){
	   case 'all': $sql="SELECT * FROM product ORDER BY    name_product LIMIT $first_row,24 ";
	   break;
	   case 'Phổ biến':$sql="SELECT * FROM product ORDER BY    number_pay DESC LIMIT $first_row,24 ";
	   break;
	   case 'Mới nhất':$sql="SELECT * FROM product ORDER BY    id_product DESC LIMIT $first_row,24 ";
		break;
	   case 'Khuyến mại':$sql="SELECT * FROM product ORDER BY    price_sale DESC LIMIT $first_row,24 ";
		break;
		case 'Từ thấp đến cao': $sql="SELECT * FROM product ORDER BY    price DESC LIMIT $first_row,24 ";
		break;
		case 'Từ cao đến thấp': $sql="SELECT * FROM product ORDER BY    price DESC LIMIT $first_row,24 ";
		break;
	   default:$sql="SELECT * FROM product ORDER BY    name_product LIMIT $first_row,24 ";
	   break;
   }
   
   $query=mysqli_query($conn,$sql);
   $list_page="";
   for($i=1;$i<=$_POST['num3'];$i++){
     if ($i==$_POST['page']) $list_page.='<li class="page phantrang_active"  value="'.$i.'" id="phantrang_active">'.$i.'</li>';
     else
     $list_page.='<li class="page" onclick="phanTrang_productweb('.$i.','.$_POST['num3'].')" value="'.$i.'" >'.$i.'</li>';
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
?>