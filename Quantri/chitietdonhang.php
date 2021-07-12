<?php 
$id=$_GET['id'];
        $sql="SELECT * FROM detail_order where id_order='$id'";
        $query=mysqli_query($conn,$sql);
       
        
        ?>
                                <h1 class='chitietdonhang__title'>Đơn hàng số:<?php echo $id;?></h1>
                                <?php 
                                      $sql1="SELECT * FROM account where account_name='".$_GET['user']."'";
                                      $query1=mysqli_query($conn,$sql1);
                                      $row1=mysqli_fetch_array($query1);
                                      echo "<p>Họ tên:".$row1['name']."</p>";
                                      echo "<p>Tài khoản:".$row1['account_name']."</p>";
                                      echo "<p>Số điện thoại:".$row1['phone']."</p>";
                                      
                                      $sql2="SELECT * FROM order_product where id_order='$id'";
                                      $query2=mysqli_query($conn,$sql2);
                                      $row2=mysqli_fetch_array($query2);
                                      if ($row2['address']=="")echo "<p>Địa chỉ nhận hàng:".$row1['address']."</p>";
                                      else
                                      echo "<p>Địa chỉ nhận hàng:".$row2['address']."</p>";
                                ?>
                                <ul class='chitietdonhang__list'>
                                    <?php 
                                    $total=0;
                                    while ($row=mysqli_fetch_array($query)){
                                        $x=$row['id_product'];
                                        $sql="SELECT * FROM product where id_product='$x'";
                                        $query1=mysqli_query($conn,$sql);
                                        $row1=mysqli_fetch_array($query1);
                                        $img="../images/".$row1['image'];
                                        $price1=$row['price']*$row['number'];
                                        $total+=$price1;
                                        echo " <li class='chitietdonhang__item'><div style='background-image:url(".$img.");' class='chitietdonhang__img-item'>"
                                        ."</div><div class='chitietdonhang__item-layout1'><div class='chitietdonhang__name-item'><a href='./home.php?page=chitietsanpham&id=".$row1['id_product']."'>". $row1['name_product']
                                        ."</a></div><div class='chitietdonhang__id-item'>Mã sản phẩm:".$row['id_product']
                                        ."</div></div><div class='chitietdonhang__number-item'>Số lượng:".$row['number']
                                        ."</div><div class='chitietdonhang__item-layout2'><div class='chitietdonhang__price-item'>Đơn giá:".$row['price'].
                                        "đ</div><div class='chitietdonhang__price1-item'>Thành tiền:".$price1."đ</div></div></li>";
                                        
                                    }
                                    ?>
                                   
                                </ul>
                                <div class="chitietdonhang__footer">
                                <div class="chitietdonhang__total">
                                    Tổng Hóa đơn:<?php echo $total ?>đ
                                </div>
                                <div class='delete-firm' onclick=thanhToan(<?php echo $id;?>)>Thanh toán</div>
                               

                                </div>