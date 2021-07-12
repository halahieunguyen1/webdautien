<?php 
session_start();
ob_start();
include_once('./ketnoi.php');
?>	
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;1,700&display=swap" rel="stylesheet">
	<link rel= "stylesheet" type="text/css" href="../icons/fontawesome-free-5.15.3-web/css/all.min.css">
	<link rel= "stylesheet" type="text/css" href="../css/reset.css">
	<link rel= "stylesheet" type="text/css" href="../css/grid.css">
	<link rel= "stylesheet" type="text/css" href="../css/base.css">
	<link rel= "stylesheet" type="text/css" href="../css/main.css">
	<script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>

	
<title>Untitled Document</title>
</head>

<body>
	<div class="app">
		<header class="header ">
			<div class="grid wide">
				<nav class="header__navbar">
					<ul class="header__navbar-list">
						<li class="header__navbar-item header__navbar-item--separation"><a href="./index.php" >BCShop.com.vn</a></li>
						<li class="header__navbar-item"><a href="https://www.facebook.com/profile.php?id=100028167710421" >Facebook</a></li>
					</ul>
					<ul class="header__navbar-list">
						<li class="header__navbar-item">
							<i class="header__navbar-icons far fa-bell"></i>
							Thông báo
							<div class="hearder__notify">
								<hearder class="hearder__notify-hearder">
									<h3>Thông báo mới nhận</h3>
								</hearder>
								<ul class="hearder__notify-list">
									<li class="hearder__notify-item">
										<a href="" class="hearder__notify-link">
												<span>
													<img src="../images/18758_laptop_hp_pavilion_15_eg0006tx_2d9c9pa_2.png" alt="" class="hearder__notify-img">
												</span>
												<span class="hearder__notify-name">Ra mắt Laptop Asus Vivobook</span>


										</a>
									</li>
									<li class="hearder__notify-item hearder__notify-item-view">
										<a href="" class="hearder__notify-link">
												<span>
													<img src="../images/18758_laptop_hp_pavilion_15_eg0006tx_2d9c9pa_2.png" alt="" class="hearder__notify-img">
												</span>
												<span class="hearder__notify-name">Ra mắt Laptop Asus Vivobook</span>


										</a>
									</li>
									<li class="hearder__notify-item">
										<a href="" class="hearder__notify-link">
												<span>
													<img src="../images/18758_laptop_hp_pavilion_15_eg0006tx_2d9c9pa_2.png" alt="" class="hearder__notify-img">
												</span>
												<span class="hearder__notify-name">Chương trình tri ân khách hàng</span>


										</a>
									</li>
									<li class="hearder__notify-item">
										<a href="" class="hearder__notify-link">
												<span>
													<img src="../images/18758_laptop_hp_pavilion_15_eg0006tx_2d9c9pa_2.png" alt="" class="hearder__notify-img">
												</span>
												<span class="hearder__notify-name">Giảm giá laptop Lenovo,ưu đãi đến 50% duy nhất ngày 1-6</span>


										</a>
									</li>
								</ul>
								<footer class="hearder__notify-footer">
										<a href="" class="hearder__notify-footer-bnt">Xem tất cả</a>
								</footer>
							</div>
						</li>
						<li class="header__navbar-item">
							<a href="" class="hearder__help">
							<i class="header__navbar-icons far fa-question-circle"></i>
							Trợ giúp
							</a>
						</li>
					
						<?php
								
							if (!isset($_SESSION['name']))
									echo '<li class="header__navbar-item header__navbar-item--bold header__navbar-item--separation"><a href="index.php?page=register&value=register">Đăng kí</a></li>
									<li class="header__navbar-item header__navbar-item--bold"><a href="index.php?page=log&value=log-in">Đăng nhập</a></li>';
								else
								echo '<li class="header__navbar-user header__navbar-item">
								<i class="fas fa-user"></i>Xin chào '.explode(" ",$_SESSION['name'])[count(explode(" ",$_SESSION['name']))-1].'
								<div class="header__navbar-user-list">
									<div class="header__navbar-user-item">Tài khoản của tôi</div>
									<div class="header__navbar-user-item">Đơn hàng</div>
									<a  href="./logoff.php" class="header__navbar-user-item log-off">Đăng xuất</a>
								</div>
							</li>';
						?>

					</ul>
				</nav>
				<!--Khung tìm kiếm-->
				<div class="header-with-search">
					<div class="header__logo">
						<a href="./index.php" class="header__logo-link">
							<img src="https://upload.wikimedia.org/wikipedia/en/thumb/5/56/Real_Madrid_CF.svg/1200px-Real_Madrid_CF.svg.png" alt="" class="header__logo-img">
						</a>
					</div>
					
					<div class="header__search">
						<div class="header__search-input-wrap">
							<input type="text" class="header__search-input" placeholder="Tìm kiếm sản phẩm trong shop">					
							<div class="header__search-history">
								<div class="header__search-header">
									Lịch sử tìm kiếm
								</div>
								<ul class="header__search-items">
									<?php
									  if (isset($_SESSION['user-name'])){
										$sql="SELECT * FROM history_search WHERE user_name='".$_SESSION['user-name']."' ";
										$query=mysqli_query($conn,$sql);
										$row=mysqli_fetch_array($query);	
										if (!!$row){
											$text=explode('!@#',$row[1]);
											for ($i=count($text)-1;$i>=0;$i--)
											{
												$onclick='searchProduct("'.$_SESSION["user-name"].'","'.$text[$i].'")';
												echo "<li class='header__search-item' onclick='$onclick'>
												<div class='header__search-link'>".$text[$i]."</div>
											</li>";
											} 
										}
											
										} 
									?>
									
								</ul>
							</div>
						</div>
						<div class="header__search-icon" onclick="searchProduct('<?php if (isset($_SESSION['user-name'])) echo $_SESSION['user-name']; else echo 0; ?>','')">
							<div class="header__search-icon1" >
								<i class="fas fa-search"></i>
							</div>
						</div>
					</div>
					<div class="header__cart">
						<i class="header__cart-icons fas fa-shopping-cart"></i>
						<?php if (isset($_SESSION['cart'])&&count($_SESSION['cart'])) echo  '<span id="header__cart-product-number"class="header__cart-product-number">'.count($_SESSION['cart']).'</span> <div class="header__cart-product header__cart-exist-product ">';
							else echo '<div id="header__cart-no-product" class="header__cart-product header__cart-no-product ">'
						?>
					
						
<!--						class= header__cart-no-product truong hop không có sẳn phẩm-->
						
						
							<img src="https://bizweb.dktcdn.net/100/363/411/themes/761926/assets/empty-cart.png?1593180610687" alt="" class="header__cart-no-product-img"id="header__cart-no-product-img">
							<ul class="header__cart-product-list" id="header__cart-product-list">
						
								<?php
								if (isset($_SESSION['cart']))	
									for ($i=0;$i<count($_SESSION['cart']);$i++)
										echo "<li class='header__cart-product-item' ><img src='".$_SESSION['cart'][$i][0]
										."' alt='' class='header__cart-product-img'><span class='header__cart-product-name'>".
										$_SESSION['cart'][$i][1]."</span><span class='header__cart-product-price'>".$_SESSION['cart'][$i][2]."đx".$_SESSION['number'][$i]."</span></li>"
								?>
							
							</ul>
							<div class="header__cart-product-footer">
									<div class="header__cart-product-total">
										Tổng tiền:<?php 
										if (isset($_SESSION['cart']))
										{
											$total=0;
											for ($i=0;$i<count($_SESSION['cart']);$i++){
												$total+=$_SESSION['cart'][$i][2]*$_SESSION['number'][$i];
											}				
											echo $total.'đ';	
										}					
										?>
									</div>	
									<a href='index.php?page=cart-product'class="header__cart-product-see">
										Xem Giỏ Hàng
									</a>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- ----------------------------------------------------------------------Main-app----------------------------------------------------------------------- -->
		<div class="container">
			<div class="grid wide">
				<div class="row">
					<?php 
                           if(isset($_GET['page'])){
                                switch($_GET['page']){
                                case 'log': include_once('log.php');
                                break;
                                case 'register':include_once('register.php');
                                break;
								case 'chitietsanpham':include_once('chitietsanpham.php');
								break;
								case 'cart-product':include_once('cart-product.php');
								break;
                                default:
                                include_once('main.php');
                                break;
                            }
                           }
                           else include_once('main.php');
                    ?>
				</div>
			</div>
		</div>
		<footer class="footer">
			<div class="grid wide">
				<div class="row">
					<div class="col l-3 m-6 c-1">
						<div class="footer__introduct">
							<div class="header__logo">
								<a href="" class="header__logo-link">
									<img src="https://upload.wikimedia.org/wikipedia/en/thumb/5/56/Real_Madrid_CF.svg/1200px-Real_Madrid_CF.svg.png" alt="" class="header__logo-img">
								</a>
							</div>
							<p>Cửa hàng laptop BCShop</p>
							<p>Địa chỉ:118 Minh Khai-Đồng Nguyên-Từ Sơn-Bắc Ninh</p>
							<p>Điện thoại:0368505826</p>
							<p>Gmail:vanhieubn1207@gmail.com</p>
						</div>
					</div>
					<div class="col l-3 m-6 c-1">
						<div class="footer__policy-warranty">
								<p>Chính sách và bảo hành</p>
								<a href="" class="footer__policy-warranty-link">Chính sách bảo hành</a>
								<a href="" class="footer__policy-warranty-link">Chính sách đổi trả hoàn tiền</a>
								<a href="" class="footer__policy-warranty-link">Chính sách bảo mật thông tin</a>
								<a href="" class="footer__policy-warranty-link">Vận chuyển lắp đặt</a>
								
						</div>
					</div>
					<div class="col l-3 m-6 c-1">
						<div class="footer__policy-warranty">
								<p>Hỗ trợ khách hàng</p>
								<a href="" class="footer__policy-warranty-link">Chương trình khuyến mại</a>
								<a href="" class="footer__policy-warranty-link">Liên hệ </a>
								<a href="" class="footer__policy-warranty-link">Thông báo giờ làm việc</a>
							
								
						</div>
						
				</div>
				<div class="col l-3 m-6 c-1">
					<div class="footer__policy-warranty">
							<p>Cộng đồng BCShop</p>
							<a href="" class="footer__policy-warranty-link"><i class="fab fa-facebook"></i>BCShop fanpage</a>
							<a href="" class="footer__policy-warranty-link"><i class="fab fa-instagram"></i>BCShop</a>
							<a href="" class="footer__policy-warranty-link"><i class="fab fa-youtube"></i>BCShop </a>
						
							
					</div>
			</div>
				</div>
				<div class="grid__row">
					<div class="footer-end">
						<p>Bản quyền thuộc về cửa hàng BCShop.GPKD số 0101760800 do Sở KHĐT TP. Hà Nội cấp ngày 22/8/2020</p>	
					</div>
				</div>
			</div>
		</footer>
		
	</div>
	<script  src="../js/test.js"></script>
	<!-- Form Đăng Ký,Đăng Nhập-->

</body>
</html>
