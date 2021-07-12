
<div class='cart-product-page'>

    <div class="cart-product-page__title">
        Giỏ hàng
    </div>
    <div class="row">
        <div class="col l-8 m-12 c-12">
            <div class="cart-product-page__control">
                <a href='index.php' class="cart-product-page__continue">
                    Tiếp tục mua hàng
                </a>
                <a href="#" class="cart-product-page__delete-cart">
                    Xóa giỏ hàng
                </a>
            </div>
            <div class="cart-product-page__list">
                <?php
                    for ($i=0;$i<count($_SESSION['cart']);$i++){
                       
                        echo "<div class='cart-product-page__item' id='cart-product-page__item".$i."'>
                                <img src='".$_SESSION['cart'][$i][0]."' alt='không'>
                                <div class='cart-product-page__block1'>
                                    <span class='cart-product-page__name-item'>".$_SESSION['cart'][$i][1]."</span>
                                    <span id='cart-product-page__id-item".$_SESSION['cart'][$i][3]."' class='cart-product-page__id-item'>Mã sản phẩm:".$_SESSION['cart'][$i][3]."</span>
                                </div>
                                <div class='cart-product-page__price-item'>
                                    <div class='row cart-product-page__price-old'>
                                        <span class='col l-6 m-6 c-6'> Giá niêm yết:</span><span class='product-item__price-old l-6 col m-6 c-6'>".$_SESSION['cart'][$i][4]."</span>
                                    </div>
                                    <div class='row cart-product-page__price-new'>
                                        <span class='col l-6 m-6 c-6'>  Giá khuyến mại:</span><span id='product-item__price-new".$i."' class='product-item__price-new col l-6 m-6 c-6'>".$_SESSION['cart'][$i][2]."</span>
                                    </div>
                                </div>
                                <div class='cart-product-page__modify'><i class='fas fa-minus' onclick='minusNumber(".$i.")'></i><span id='cart-product-page__modify-number".$i."'>".$_SESSION['number'][$i]."</span><i class='fas fa-plus' onclick='addNumber(".$i.",".$_SESSION['cart'][$i][3].")'></i><i class='fas fa-trash-alt' onclick='removeNumber(".$i.",".$_SESSION['cart'][$i][3].")'></i></div>
                            </div>";
                    }
                ?>
             
            </div>
        </div>
        <div class="col l-4 m-0 c-0 cart-product-page__pay1">
           <div class="cart-product-page__pay">
                <div class="cart-product-page__pay-total">
                    Giá tạm tính: <span id='total'><?php
                                        
                                            $total=0;
                                            for($i=0;$i<count($_SESSION['cart']);$i++)
                                                {
                                                    $total+=$_SESSION['cart'][$i][2]*$_SESSION['number'][$i];
                                                }
                                        
                                                echo $total."  đ";
                                        ?></span>
                </div>
                                                
                <div class="cart-product-page__pay-information">
                    Nhập địa chỉ nhận hàng:<br><br>
                    <input type="text" name="address" class="cart-product-page__pay-address" placeholder="Nếu để trống,shop sẽ vận chuyển đến địa chỉ mà khách hàng đã đăng kí">
                </div>
               <div onclick='payCart()' class="cart-product-page__pay-button">Đặt đơn</div>
               
                <div class="cart-product-page__pay-content">
                    <p>-Bấm thanh toán để hoàn tất đơn hàng </p>
                    <p>- Ben Computer miễn phí vận chuyển cho các đơn hàng trong khu vực nội thành Hà Nội</p>
                    
                </div>
                </div>
        </div>
    </div>
</div>