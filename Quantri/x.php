<?php
      if (isset($_POST['species2']))
      {
        $x= $_POST['species2'];
        if ($x=='all') 
        {
          $sql="SELECT * FROM product ORDER BY id_product LIMIT 1=0,10";
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
          $list_page.='<li class="page" onclick="phanTrang('.$i.','.$num_page.')" value="'.$i.'" >'.$i.'</li>';
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

?>