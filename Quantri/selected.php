<?php
   require("ketnoi.php");
    if (isset($_POST['species']))
      {
        $x= $_POST['species'];
       

        $sql="SELECT * FROM product_species WHERE name='$x'";
      
        $query=mysqli_query($conn,$sql);
        $y=mysqli_num_rows($query);
        
        if ($y>0){ 
          while ($row=mysqli_fetch_array($query)){
            
              echo "<option value='".$row['firm']."'>".$row['firm']."</option>";                
          
            }
            
        }
        else echo "<option>---------------</option>";
      }
      if (isset($_POST['species1']))
      {
        $data="";
        $list_page="";
        $x= $_POST['species1'];
        if ($x=='all') {
          $sql0="SELECT * FROM firm ORDER BY name LIMIT 0,10 ";
          $total_row=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM firm"));
          $num_page=ceil($total_row/10);
          for($i=1;$i<=$num_page;$i++){
            if ($i==1) $list_page.='<li class="page phantrang_active"  value="'.$i.'" id="phantrang_active">'.$i.'</li>';
            else
            $list_page.='<li class="page" onclick="phanTrang_firm('.$i.','.$num_page.')" value="'.$i.'" >'.$i.'</li>';
        }
          $query0=mysqli_query($conn,$sql0);
          $w="";
          while ($row0=mysqli_fetch_array($query0)){
            $a=$row0['name'];
            $sql1="SELECT * FROM product_species WHERE firm='$a'";
            $query1=mysqli_query($conn,$sql1);
            $w="";
            while ($row1=mysqli_fetch_array($query1)){
              if (empty($w))
                $w.=$row1['name'];
                else $w.="-".$row1['name'];
            }
            $data.= " <tr>
            <td>". $row0['name']."</td>
            <td>".$row0['phone']."</td>
            <td>".$row0['email']."</td>
            <td>".$w."</td>
            <td class='icon'> <a href='home.php?page=firm-setting&setting_firm=".$row0['name']."' class='setting-firm'><i class='fas fa-wrench'></i></a>  <a href='home.php?page=firm-setting&delete_firm=".$row0['name']."' class='delete-firm'><i class='fas fa-times-circle'></i></a></td>
        </tr> ";
          }
          $data.="???".$list_page;
        }  else
        {
          $sql="SELECT * FROM product_species WHERE name='$x' ORDER BY firm LIMIT 0,10";
          $total_row=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM product_species WHERE name='$x'"));
          $num_page=ceil($total_row/10);
         for($i=1;$i<=$num_page;$i++){
          if ($i==1) $list_page.='<li class="page phantrang_active"  value="'.$i.'" id="phantrang_active">'.$i.'</li>';
          else
          $list_page.='<li class="page" onclick="phanTrang_firm('.$i.','.$num_page.')" value="'.$i.'" >'.$i.'</li>';
      }
          $query=mysqli_query($conn,$sql);
          $y=mysqli_num_rows($query);
          if ($y>0){ 
            while ($row=mysqli_fetch_array($query)){
              $a=$row['firm'];
              $sql0="SELECT * FROM firm where name='$a'";
              $query0=mysqli_query($conn,$sql0);
              $w="";
              while ($row0=mysqli_fetch_array($query0)){
                $a=$row0['name'];
                $sql1="SELECT * FROM product_species WHERE firm='$a'";
                $query1=mysqli_query($conn,$sql1);
                $w="";
                while ($row1=mysqli_fetch_array($query1)){
                  if (empty($w))
                    $w.=$row1['name'];
                    else $w.="-".$row1['name'];
                }
                $data.=" <tr>
                <td>". $row0['name']."</td>
                <td>".$row0['phone']."</td>
                <td>".$row0['email']."</td>
                <td>".$w."</td>
                <td class='icon'> <a href='home.php?page=firm-setting&setting_firm=".$row0['name']."' class='setting-firm'><i class='fas fa-wrench'></i></a>  <a href='home.php?page=firm-setting&delete_firm=".$row0['name']."' class='delete-firm'><i class='fas fa-times-circle'></i></a></td>
            </tr> ";
              }
            }  
            }
            
        }
        $data.="???".$list_page;
        echo $data;
      }
      if (isset($_POST['species2']))
      {
        $x= $_POST['species2'];
        if ($x=='all') 
        {
          $sql="SELECT * FROM product ORDER BY id_product LIMIT 0,10";
          $total_row=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM product"));
        }  else
        {
          $sql="SELECT * FROM product WHERE species='$x' ORDER BY id_product LIMIT 0,10";
          $total_row=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM product  WHERE species='$x'"));
        }
        $num_page=ceil($total_row/10);
        $list_page="";
        for($i=1;$i<=$num_page;$i++){
          if ($i==1) $list_page.='<li class="page phantrang_active"  value="'.$i.'" id="phantrang_active">'.$i.'</li>';
          else
          $list_page.='<li class="page" onclick="phanTrang_product('.$i.','.$num_page.')" value="'.$i.'" >'.$i.'</li>';
      }
        $query=mysqli_query($conn,$sql);
        $y=mysqli_num_rows($query);
        $data="";
        if ($y>0){ 
          while ($row=mysqli_fetch_array($query)){
         
                                        
              $data.= " <tr>
              <td>". $row['id_product']."</td>
              <td><a href='./home.php?page=chitietsanpham&id=".$row['id_product']."'>".$row['name_product']."</a></td>
              <td>".$row['firm']."</td>
              <td>".$row['numbers']."</td>
              <td>".$row['price']."</td>
          </tr> ";
              
            
            
        }
        $data.="???".$list_page;
        echo $data;
      }
  }

  if (isset($_POST['num3']))
  {
    $data="";
    $species=$_POST['species3'];
    $first_row=($_POST['page']-1)*10;
    if ($species=='all')$sql="SELECT * FROM product ORDER BY    id_product LIMIT $first_row,10 ";else 
    $sql="SELECT * FROM product where species='$species' ORDER BY    id_product LIMIT $first_row,10 ";
    $query=mysqli_query($conn,$sql);
    $list_page="";
    for($i=1;$i<=$_POST['num3'];$i++){
      if ($i==$_POST['page']) $list_page.='<li class="page phantrang_active"  value="'.$i.'" id="phantrang_active">'.$i.'</li>';
      else
      $list_page.='<li class="page" onclick="phanTrang_product('.$i.','.$_POST['num3'].')" value="'.$i.'" >'.$i.'</li>';
  }      
  while ($row=mysqli_fetch_array($query)){
                                        
    $data.=" <tr>
    <td>". $row['id_product']."</td>
    <td><a href='./home.php?page=chitietsanpham&id=".$row['id_product']."'>".$row['name_product']."</a></td>
    <td>".$row['firm']."</td>
    <td>".$row['numbers']."</td>
    <td>".$row['price']."</td>
</tr> ";
    
}     
  $data.="???".$list_page;
   echo $data;     
    

  }
  if (isset($_POST['num4']))
  {
    $data="";
    $list_page="";
    $x= $_POST['species4'];
    $first_row=($_POST['page']-1)*10;

    if ($x=='all') {
      $sql0="SELECT * FROM firm ORDER BY name LIMIT     $first_row,10 ";
     
      for($i=1;$i<=$_POST['num4'];$i++){
        if ($i==$_POST['page']) $list_page.='<li class="page phantrang_active"  value="'.$i.'" id="phantrang_active">'.$i.'</li>';
        else
        $list_page.='<li class="page" onclick="phanTrang_firm('.$i.','.$_POST['num4'].')" value="'.$i.'" >'.$i.'</li>';
    }
      $query0=mysqli_query($conn,$sql0);
      $w="";
      while ($row0=mysqli_fetch_array($query0)){
        $a=$row0['name'];
        $sql1="SELECT * FROM product_species WHERE firm='$a'";
        $query1=mysqli_query($conn,$sql1);
        $w="";
        while ($row1=mysqli_fetch_array($query1)){
          if (empty($w))
            $w.=$row1['name'];
            else $w.="-".$row1['name'];
        }
        $data.= " <tr>
        <td>". $row0['name']."</td>
        <td>".$row0['phone']."</td>
        <td>".$row0['email']."</td>
        <td>".$w."</td>
        <td class='icon'> <a href='home.php?page=firm-setting&setting_firm=".$row0['name']."' class='setting-firm'><i class='fas fa-wrench'></i></a>  <a href='home.php?page=firm-setting&delete_firm=".$row0['name']."' class='delete-firm'><i class='fas fa-times-circle'></i></a></td>
    </tr> ";
      }
      $data.="???".$list_page;
    }  else
    {
      $sql="SELECT * FROM product_species WHERE name='$x' ORDER BY firm LIMIT   $first_row,10";
      $total_row=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM product_species WHERE name='$x'"));
  
     for($i=1;$i<=$_POST['num4'];$i++){
      if ($i==$_POST['page']) $list_page.='<li class="page phantrang_active"  value="'.$i.'" id="phantrang_active">'.$i.'</li>';
      else
      $list_page.='<li class="page" onclick="phanTrang_firm('.$i.','.$_POST['num4'].')" value="'.$i.'" >'.$i.'</li>';
  }
      $query=mysqli_query($conn,$sql);
      $y=mysqli_num_rows($query);
      if ($y>0){ 
        while ($row=mysqli_fetch_array($query)){
          $a=$row['firm'];
          $sql0="SELECT * FROM firm where name='$a'";
          $query0=mysqli_query($conn,$sql0);
          $w="";
          while ($row0=mysqli_fetch_array($query0)){
            $a=$row0['name'];
            $sql1="SELECT * FROM product_species WHERE firm='$a'";
            $query1=mysqli_query($conn,$sql1);
            $w="";
            while ($row1=mysqli_fetch_array($query1)){
              if (empty($w))
                $w.=$row1['name'];
                else $w.="-".$row1['name'];
            }
            $data.=" <tr>
            <td>". $row0['name']."</td>
            <td>".$row0['phone']."</td>
            <td>".$row0['email']."</td>
            <td>".$w."</td>
            <td class='icon'> <a href='home.php?page=firm-setting&setting_firm=".$row0['name']."' class='setting-firm'><i class='fas fa-wrench'></i></a>  <a href='home.php?page=firm-setting&delete_firm=".$row0['name']."' class='delete-firm'><i class='fas fa-times-circle'></i></a></td>
        </tr> ";
          }
        }  
        }
        
    }
    $data.="???".$list_page;
    echo $data;
  }

  if (isset($_POST['id_order']))
      {
        $x= $_POST['id_order'];
       

        $sql= "UPDATE order_product SET checked =1  WHERE id_order='".$x."'";
        $query=mysqli_query($conn,$sql);
        echo $sql;
      }
      if (isset($_POST['delete_order'])){
	
        $k=$_POST['delete_order'];
        $sql="DELETE FROM order_product WHERE id_order='$k'";
        $query=mysqli_query($conn,$sql);
        $sql="DELETE FROM detail_order WHERE id_order='$k'";
        $query=mysqli_query($conn,$sql);
    }
    
?>