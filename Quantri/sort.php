<?php
   require("ketnoi.php");
    if (isset($_POST['sort_user']))
      {
        $data="";
        $x= $_POST['sort_user'];
        if ($_POST['sort_type']=='highlow')
        $sql="SELECT * FROM account ORDER BY ".$x." DESC LIMIT 0,10";
        else
        $sql="SELECT * FROM account ORDER BY ".$x." LIMIT 0,10";
       
        $query=mysqli_query($conn,$sql);
        $y=mysqli_num_rows($query);
        $list_page="";
        $total_row=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM account "));

      $num_page=ceil($total_row/10);
        for($i=1;$i<=$num_page;$i++){
          if ($i==1) $list_page.='<li class="page phantrang_active"  value="'.$i.'" id="phantrang_active">'.$i.'</li>';
          else
          $list_page.='<li class="page" onclick="phanTrang_user('.$i.','.$num_page.')" value="'.$i.'" >'.$i.'</li>';
      }    
        if ($y>0){ 
         $k=1;
            
            while ($row=mysqli_fetch_array($query)){
                                    
              $data.= " <tr>
                <td>".$k."</td>
                <td>". $row['account_name']."</td>
                <td>".$row['name']."</td>
                <td>".$row['phone']."</td>
                <td>". $row['email']."</td>
                <td>".$row['address']."</td>
                <td>".$row['date_reigister']."</td>
                <td>".$row['total']."</td>
            </tr> ";
            $k++;
            }       
          
            
            
        }
        $data.="???".$list_page;
        echo $data;
      }
      if (isset($_POST['num5']))
      {
        $data="";
     
        $first_row=($_POST['page']-1)*10;
        if ($_POST['sort']=='lowhigh')
        $sql="SELECT * FROM account ORDER BY ".$_POST['species5']." LIMIT $first_row,10";
        else   $sql="SELECT * FROM account ORDER BY ".$_POST['species5']." DESC LIMIT $first_row,10";
        $query=mysqli_query($conn,$sql);
        $list_page="";
        for($i=1;$i<=$_POST['num5'];$i++){
          if ($i==$_POST['page']) $list_page.='<li class="page phantrang_active"  value="'.$i.'" id="phantrang_active">'.$i.'</li>';
          else
          $list_page.='<li class="page" onclick="phanTrang_user('.$i.','.$_POST['num5'].')" value="'.$i.'" >'.$i.'</li>';
      }    
      $k=1+$_POST['page']*10-10;  
      while ($row=mysqli_fetch_array($query)){
                                            
        $data.=" <tr>
        <td>".$k."</td>
        <td>". $row['account_name']."</td>
        <td>".$row['name']."</td>
        <td>".$row['phone']."</td>
        <td>". $row['email']."</td>
        <td>".$row['address']."</td>
        <td>".$row['date_reigister']."</td>
        <td>".$row['total']."</td>
    </tr> ";
        $k++;
    } 
        
    $data.="???".$list_page;
    echo $data;     
     
    
    }
?>