<?php
   require("ketnoi.php");
session_start();
ob_start();
if (isset($_POST['image'])){
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart']=array([$_POST['image'],$_POST['name'],$_POST['price'],$_POST['id'],$_POST['price_old']]);
        $_SESSION['number']=array(1);
    }else 
    {   $x=array_search([$_POST['image'],$_POST['name'],$_POST['price'],$_POST['id'],$_POST['price_old']], $_SESSION['cart']);
        if ($x===false)
        {
            $_SESSION['cart'][count($_SESSION['cart'])]=[$_POST['image'],$_POST['name'],$_POST['price'],$_POST['id'],$_POST['price_old']];
            $_SESSION['number'][count($_SESSION['number'])]=1;
        }
        else $_SESSION['number'][$x]+=1;
    }
    echo count($_SESSION['cart']);
}
if (isset($_POST['modify'])){
    if ($_POST['modify']==-1){
        $_SESSION['number'][$_POST['index']]-=1;
    }
    else if ($_POST['modify']==1){
        $id=$_POST['id'];
      $sql= "SELECT NUMBERS FROM PRODUCT  WHERE ID_PRODUCT='".$id."'";
      $query=mysqli_query($conn,$sql);
      $row=mysqli_fetch_array($query);
      echo $row[0];
      if ($_SESSION['number'][$_POST['index']]<$row[0])  
      $_SESSION['number'][$_POST['index']]+=1;

    }
    else if ($_POST['modify']==0){
       for ($i=0;$i<count($_SESSION['cart']);$i++){
           if ($_POST['id']==$_SESSION['cart'][$i][3])
           {
            unset($_SESSION['cart'][$i]);
            unset($_SESSION['number'][$i]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);  
            $_SESSION['number'] = array_values($_SESSION['number']);  
               break;
           }
       }
    }
}
if (isset($_POST['pay'])){
    if (isset($_SESSION['user-name'])){
        include_once('./ketnoi.php');
    $total=0;
    $sql="SELECT MAX(id_order) FROM order_product";
     $query=mysqli_query($conn,$sql);
     $row = mysqli_fetch_array($query);
     $id=$row[0]+1;

    for ($i=0;$i<count($_SESSION['cart']);$i++){
        $total+=$_SESSION['cart'][$i][2]*$_SESSION['number'][$i];
        $sql="INSERT INTO detail_order values(".$id.",".$_SESSION['cart'][$i][3].",".$_SESSION['number'][$i].",".$_SESSION['cart'][$i][2].")";
        $query=mysqli_query($conn,$sql);
        $sql="SELECT NUMBERS,number_pay FROM PRODUCT WHERE ID_PRODUCT=".$_SESSION['cart'][$i][3];
        $query=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($query);
        $number=$row[0]-$_SESSION['number'][$i];
        $number_pay=$row[1]+$_SESSION['number'][$i];
        $sql="UPDATE Product SET numbers=".$number.",number_pay=".$number_pay." WHERE ID_PRODUCT=".$_SESSION['cart'][$i][3];
        $query=mysqli_query($conn,$sql);
    }
    $sql="INSERT INTO order_product values(null,now(),'".$_SESSION['user-name']."',".$total.",0,'".$_POST['address']."')";

    $query=mysqli_query($conn,$sql);
    $sql="SELECT total FROM account WHERE account_name='".$_SESSION['user-name']."'";
    $query=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($query);
    $total_acount=$row[0]+$total;
    $sql="UPDATE account SET total=".$total_acount." WHERE account_name='".$_SESSION['user-name']."'";
    $query=mysqli_query($conn,$sql);
    $_SESSION['cart']=null;
    $_SESSION['number']=null;
    echo 1;
    }
    else echo -1;
}

?>