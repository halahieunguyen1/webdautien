<?php
   require("ketnoi.php");
    if (isset($_POST['comment']))
    {
      $comment=$_POST['comment'];
      $id_product=$_POST['id_product'];
      $id_rep=$_POST['id_rep'];
      $user=$_POST['user_name'];
      $sql="INSERT INTO comment VALUES (null,'$id_product','$user',NOW(),'$comment',$id_rep)";
      $query=mysqli_query($conn,$sql);
  }
  
?>