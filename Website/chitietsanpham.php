
<?php

if (isset($_GET['id'])){
    $id=$_GET['id'];
$sql="SELECT * FROM product WHERE id_product='$id'";
$query=mysqli_query($conn,$sql);
$product=mysqli_fetch_array($query);

}
?>
<div class='chitietsanpham'>
    <div style='font-size:1.3rem; margin:10px 0;'>
        <a href='main.php' style='color:black;'>Trang chủ/</a><?php echo $product['name_product'];?>
    </div>
   <div class='row chitietsanphamblock'>
        
        <div class='column l-5 m-0 c-0'>
            <img id='image_product' style='width:100%;'src="../images/<?php echo $product['image']?>" alt="" class="">
            <div class='parameters_product'>Thông số kĩ thuật
                <?php 
                    $text=explode("\n", $product['parameters_product']);
                    echo "<ul><li>".$text[0]."</li><li>".$text[1]."</li><li>".$text[2]."</li><li>".$text[3]."</li><li>".$text[4]."</li><li>".$text[5]."</li></ul>";
                ?>
            </div>
            <a href='#chitietsanpham'>ĐỌC THÊM 	<i class="fas fa-angle-down"></i></a>
        </div>
        <div class='column l-5 m-0 c-0'>
            <div id="name-product"class='name-product'>
                <?php echo $product['name_product'];?>
            </div>
            <div class='id-product'>
               Mã sản phẩm:<span  id='id' style='color:red'><?php echo $product['id_product'];?></span>
            </div>
            <div class='price-product'>
                <div class='price-old'>
                    Giá niêm yết:<span id='price-old'><?php echo $product['price']?></span>
                </div>
                <div class='price-new'>
                    Giá khuyến mại:<span  id='price-new'><?php echo $product['price']?></span>
                </div>
                <div class='numbers_product'>
                   Số lượng:<?php echo $product['numbers']?>
                </div>
            </div>
            <div class='buy-product' onclick='addCart(0,<?php echo $product["numbers"]?>)'>
               
			    Mua Ngay

            </div>
            
            <div class='cart-product' onclick='addCart(1,<?php echo $product["numbers"]?>)'>
                     Thêm vào giỏ
            </div>
            <div class="card-sale-style card mb-2">
              <div class="card-header-2">
                <i class="fas fa-gift"></i> Khuyến mại
              </div>
              <div class="card-body">
                <p>- Sản phẩm ch&iacute;nh h&atilde;ng 100%<br />
                    - B&aacute;n h&agrave;ng online to&agrave;n quốc<br />
                    - Mua h&agrave;ng trả g&oacute;p l&atilde;i suất thấp<br />
                    - Bảo h&agrave;ng ch&iacute;nh h&atilde;ng<br />
                    - Bảo h&agrave;nh tận nơi cho doanh nghiệp<br />
                    - Gi&aacute; cạnh tranh nhất thị trường</p>
              </div>
            </div>
        </div>
        <div class='column l-2 m-0 c-0'>
        <div class="card-ben-style card mb-2">
              <div class="card-header-1">
                <i class="fas fa-shipping-fast"></i> CHÍNH SÁCH BÁN HÀNG
              </div>
              <div class="card-body">
                <p>- Sản phẩm ch&iacute;nh h&atilde;ng 100%<br />
                    - B&aacute;n h&agrave;ng online to&agrave;n quốc<br />
                    - Mua h&agrave;ng trả g&oacute;p l&atilde;i suất thấp<br />
                    - Bảo h&agrave;ng ch&iacute;nh h&atilde;ng<br />
                    - Bảo h&agrave;nh tận nơi cho doanh nghiệp<br />
                    - Gi&aacute; cạnh tranh nhất thị trường</p>
              </div>
            </div>
            <div class="card-header-1">
                <i class="fas fa-truck"></i> CHÍNH SÁCH GIAO HÀNG
              </div>
              <div class="card-body">
                <p>- Giao h&agrave;ng nhanh ch&oacute;ng<br />
                    - Giao h&agrave;ng trước trả tiền sau COD<br />
                    - Miễn ph&iacute; giao h&agrave;ng (b&aacute;n k&iacute;nh 20km)<br />
                    -&nbsp;Giao h&agrave;ng v&agrave; lắp đặt từ 8h00 - 21h30 h&agrave;ng ng&agrave;y, gồm cả thứ 7, CN, ng&agrave;y lễ</p>

                
              </div>
            </div>
        </div>
       
           <div class='product-similar'>    
                <p>Sản Phẩm Tương Tự</p>
                <div class='row chitietsanphamblock'>
                    <div class="slide-chuyen">
                <?php 
                            $sql="SELECT * FROM product ORDER BY name_product  ";
                            $query=mysqli_query($conn,$sql);
    
							while ($row=mysqli_fetch_array($query)){

										$x=(int)substr($row['sale'],0,-1);
										if (strpos($row['sale'],"%"))
										{
											
											$price_new= (int)$row['price']*(100-$x)/100 ;
										}                
										else $price_new =(int)$row['price'] - $x;
										if ($row['sale']!=0) $sale=	"<div class='product-item__price'>
							
										<span class='product-item__price-old'>".$row['price']." đ</span>
										<span class='product-item__price-new'>".$price_new." đ</span>
									</div><div class='producct-item__sale-off'>
										<div class='product-item__sale-off-percent'>".$row['sale']."</div>
										<div class='product-item__sale-off-label'>Giảm</div>
									</div>";
									else $sale="<div class='product-item__price'>
									<span class='product-item__price-old'></span>
									<span class='product-item__price-new'>".$price_new." đ</span>
								</div>";	
								$a=$row['name_product'];
										echo "
										<div class=' item-chuyen'>
										<a href='index.php?page=chitietsanpham&id=".$row['id_product']."'>
										<div class='product-item'>
										<div class='product-item__img' style='background-image:url(../images/".$row['image'].");'></div>
										<h5 class='product-item__name'>".$row['name_product']."</h5>
										".$sale."</div></a></div>";
						
                                    }
                                    ?>
           </div>
           </div>
        </div>
   <div class='row chitietsanphamblock' id='chitietsanpham'>
        <div class="thongtinchitietsp">
            <h3>THÔNG TIN CHI TIẾT<h3>
            <div class="content">
            <?php 
             $text=explode("\n", $product['describle_product']);
            for ($i=0;$i<=count($text)-1;$i++){
                if (!empty(trim($text[$i])))
                {    
                    $j=stripos($text[$i],":");
                    if ($j){
                        echo "<p><b>".substr($text[$i],0,$j)."</b>".substr($text[$i],$j)."</p>  ";
                    }
                    else echo "<p>".substr($text[$i],$j)."</p>";
                    
                }
            }
            ?>  
            </div>
    
    
        </div>
        <div class="thongsokithuat">
                <h3>THÔNG SỐ KĨ THUẬT<h3>
                    <table>
                        <tbody>
                        <?php 
                        $content="";
                        $flag=0;
                        $text=explode("\n", $product['parameters_product']);
                        for ($i=0;$i<=count($text)-1;$i++){
                            if (!empty(trim($text[$i])))
                                {    
                                $j=stripos($text[$i],":");
                                if ($j){
                                    if($flag==0){
                                        if (empty($content)){
                                            $content.="<tr><td>".substr($text[$i],0,$j)."</td><td>";
                                        }
                                        else  {
                                            $content.=$x."</td></tr><tr><td>".substr($text[$i],0,$j)."</td><td>";    
                                        }
                                    
                                    }
                                    else{
                                        $flag=0;
                                        $content.="</p><tr><td>".substr($text[$i],0,$j)."</td><td>";
                                    }
                                    $x=substr($text[$i],$j+1);
                                }
                                else {
                                    if ($flag==0) 
                                        {$content.="<p>".$x."</p><p>".$text[$i];
                                        $x="";
                                        $flag=1;
                                         }
                                        else $content.="</p><p>".$text[$i];
                                    }
                                
                                }
                            }
                            $content.=$x."</td></tr>";
                            echo $content;
                        ?> 
                        </tbody>
                    </table>
        </div>
    </div>
    <div class='row chitietsanphamblock' id='chitietsanpham'>
        <div class="col c-12 m-12 l-12 wide">
            <h1>Bình luận:</h1>
            <div class="comment_product-header">
            <?php 
                 if (isset($_SESSION['user-name'])) echo "<input class='comment_input' placeholder='Bình luận tại đây' type='text'>   
                 <i class='fas fa-paper-plane' onclick=submitComment(".$product['id_product'].",0,'".$_SESSION['user-name']."')></i>"   
                                
            ?>
           
           
            </div>
            <div class='list_comment_1' >
           
            
                <?php
                 $sql="SELECT * FROM comment WHERE id_product=".$product['id_product']." AND id_rep=0 ORDER BY time DESC";
                 $query=mysqli_query($conn,$sql);
                 while ($row=mysqli_fetch_array($query)){
                     echo "<ul class='comment-text'><li class='account_comment'>".$row['account']."</li>
                             <li class='time_comment'>".$row['time']."</li>
                             <li class='content_comment'><div>".$row['text']."</div></li></ul>";
                    
                 }
               
                ?>
                </div>
          </div>
        </div>

    </div>
    <script  src="../js/chuyenslide.js"></script>   
    <script  src="../js/test.js"></script>   
    <script> 
              
                loadComment(<?php echo $product['id_product']; ?>);
            </script>
</div>

