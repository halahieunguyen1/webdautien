<?php
ob_start();
session_start();
include_once './ketnoi.php';
if (!isset($_SESSION["password"])) 	header('location: index.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel= "stylesheet" type="text/css" href="../css/reset.css">
	<link rel= "stylesheet" type="text/css" href="../css/grid.css">
    <link rel= "stylesheet" type="text/css" href="../css/base.css">
	<link rel= "stylesheet" type="text/css" href="../icons/fontawesome-free-5.15.3-web/css/all.min.css">
	<link rel= "stylesheet" type="text/css" href="../css/baseadmin.css">
    <link rel= "stylesheet" type="text/css" href="../css/mainadmin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script  src="../js/ajax-selected.js" type="text/javascript"></script>
  
    <script  src="../js/test.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;1,700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="admin">
        <header class="header">
            <div class="grid wode">
                <nav class="header__navbar">
                    <div class="header__navbar-home">
                        <span class="header__navbar-home-name">BCShop</span>
                        <span >admin</span>
                    </div>
                    <div class="header__navbar-info">
                        <i class="fas fa-user"></i>
                        Xin chào,Hiếu
                    </div>
                </nav>
            </div>
        </header>
        <div class="container">
            <div class="grid wode">
                <div class="row">
                    <div class="column l-2 m-2 c-2">
                        <div class="category-ad">
                            <div class="category-ad-head">
                                <input type="text" class="category-ad__search" placeholder="Tìm kiếm">		
                            </div>
                            <div class="category-body">
                                <ul class="category-body__list">
                                    <li class="category-body__item category-body__item-active"><a href="./home.php"><i class="fas fa-house-damage"></i>Trang chủ quản trị</a></li>
                                    <li class="category-body__item"><a href="./home.php?page=user"><i class="fas fa-users"></i>Quản lý thành viên</a></li>
                                    <li class="category-body__item"><a href="./home.php?page=product"><i class="fas fa-laptop"></i>Quản lý sản phẩm</a></li>
                                    <li class="category-body__item"><a href="./home.php?page=order"><i class="fas fa-clipboard"></i>Quản lý đơn hàng</a></li>
                                    <li class="category-body__item"><a href="./home.php?page=comment"><i class="fas fa-comment"></i>Quản lý bình luận</a></li>
                                    <li class="category-body__item"><a href="./home.php?page=supplier"><i class="fas fa-industry"></i>Quản lý nhà cung cấp</a></li>
                                    <li class="category-body__item"><a href="./home.php?page=statistics"><i class="fas fa-chart-bar"></i>Thống kê</a></li>
                                </ul>
                            </div>
                            <div class="category-footer">
                                <a href="./logoff.php" class="log-off"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a>
                            </div>
                        </div>
                    </div>
                    <div class="column l-10 c-10 m-10 ">
                    <?php 
                           if(isset($_GET['page'])){
                                switch($_GET['page']){
                                case 'supplier': include_once('supplier.php');
                                break;
                                case 'user':include_once('user.php');
                                break;
                                case 'product':include_once('product.php');
                                break;
                                case 'firm-setting':include_once('firm-setting.php');
                                break;
                                case 'product-setting':include_once('product-setting.php');
                                break;
                                case 'chitietsanpham':include_once('chitietsanpham.php');
                                break;
                                case 'order':include_once('order.php');
                                break;
                                case 'chitietdonhang':include_once('chitietdonhang.php');
                                break;
                                case 'delete-order':include_once('delete-order.php');
                                break;
                                default:
                                include_once('gioithieu.php');
                                break;
                            }
                           }
                           else include_once('gioithieu.php');
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <footer>
                    
        </footer>
    </div>
</body>
</html>