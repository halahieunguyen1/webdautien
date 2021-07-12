<?php
 require("ketnoi.php");
if (isset($_POST['search'])){
	$search=$_POST['search'];
	if ($search=='') $where='';
	else $where=" WHERE name_product LIKE '%".$search."%'";
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
if (!$_POST['user']==0){
    $sql="SELECT * FROM history_search WHERE user_name='".$_POST['user']."' ";
    $query=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($query);
   $history='';
    if (!!$row){
        $text=explode('!@#',$row[1]);
        if (!in_array($_POST['search'], $text))
        {
            if (count($text)>4) 
            {
                unset($text[0]);
                $text = array_values($text);  
            }
            $text[count($text)]=$_POST['search'];
            $content=implode('!@#',$text); 
            $sql="UPDATE history_search SET text='".$content."' WHERE user_name='".$_POST['user']."' ";
        $query=mysqli_query($conn,$sql);
        }  
		for ($i=count($text)-1;$i>=0;$i--)
											{
												$onclick='searchProduct("'.$_POST['user'].'","'.$text[$i].'")';
												$history.="<li class='header__search-item' onclick='$onclick'>
												<div class='header__search-link'>".$text[$i]."</div>
											</li>";
											}  
    }
    else{
        $sql="INSERT INTO history_search values ('".$_POST['user']."','".$_POST['search']."') ";
        $query=mysqli_query($conn,$sql);
        }
}

 echo $data."???".$history;
}
?>