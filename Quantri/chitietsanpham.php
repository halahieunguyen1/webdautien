
<?php

            if (isset($_GET['id'])){
                $id=$_GET['id'];
            $sql="SELECT * FROM product WHERE id_product='$id'";
            $query=mysqli_query($conn,$sql);
            $product=mysqli_fetch_array($query);
        }
?>
<div class="chitietsanpham__row1">
<div class="chitietsanpham_row1-img">
<img width="100%" height="100%" src=<?php echo "../images/".$product['image'];?> alt="" class="img-product">
</div>
    <div>
        <div class="chitietsanpham__name"><?php echo $product['name_product'] ;?></div>
        <div class="chitietsanpham__1">
            <div class="chitietsanpham__id">
                ID:<?php echo $product['id_product'] ;?>
            </div>
            <div class="chitietsanpham__loaisp">
                Loại Sản Phẩm:<?php echo $product['species'] ;?>
            </div>
            <div class="chitietsanpham__hang">
                Hãng:<?php echo $product['firm'] ;?>
            </div>
            <div class="chitietsanpham__giaban">
                Giá gốc:<?php echo $product['price'] ;?>đ
            </div>
            <div class="chitietsanpham__giamgia">
                Giảm giá:<?php echo $product['sale'] ;?>
            </div>
            <div class="chitietsanpham__giakhuyenmai">
                Giá khuyến mãi:<?php 

                if (strpos($product['sale'],"%"))
                {
                    $sale=(int)substr($product['sale'],0,-1);
                    echo (int)$product['price']*(100-$sale)/100 ;
                }                
                else echo (int)$product['price'] - (int)$product['sale'];
                ?>đ
            </div>
            <div class="chitietsanpham__number">
                Còn:<?php echo $product['numbers'] ;?> chiếc
                 <label for="add" class="">
                     <i class="fas fa-plus add-num-product"></i>
                </label>
                <input hidden type="checkbox" id="add">
                <form action='' method="post"class="them-hang">
                    <div class = "form-group">
                        Nhập số lượng
						<input type="text" name='number'>
						
						<span class="form-message"></span>
					</div>
					
						<input type="submit" name="submit" class='btn-them-hang'value='Thêm' >
                
                </form>
                <?php 
                            if (isset($_POST["submit"])){
                                $number=(int)$product['numbers']+(int)$_POST['number'];
                               
                        $sql="UPDATE product SET  numbers='$number' WHERE id_product='$id'";
                   
                        $query=mysqli_query($conn,$sql);
                        header("location: home.php?page=chitietsanpham&id=".$id);
                            }
                ?>
                 <?php echo "<br>Đã bán:".$product['number_pay'] ;?> chiếc
            </div>
            <a href=<?php echo "home.php?page=product-setting&product-setting=".$product['id_product'] ?> class="suasanpham">Sửa</a>
        </div>
    </div>
</div>
<div class="chitietsanpham__row1">
    <div class="thongtinchitietsp">
        <h3>Thông tin chi tiết<h3>
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
        <h3>Thông số kĩ thuật<h3>
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
<div class="comment_product">

</div>