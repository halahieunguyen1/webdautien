<?php 
        if (isset($_GET['page_order'])){
            $page=$_GET['page_order'];
        }
        else $page=1;
        $first_row=($page-1)*10;
        $sql="SELECT * FROM order_product ORDER BY    id_order desc LIMIT $first_row,10 ";
        $query=mysqli_query($conn,$sql);
        $total_row=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM order_product"));
        $num_page=ceil($total_row/10);
        $list_page="";
        for($i=1;$i<=$num_page;$i++){
            if ($i==$page) $list_page.='<li class="phantrang_active"><a href="home.php?page=order&page_order='.$i.'">'.$i.'</a></li>';
            else
            $list_page.='<li><a href="home.php?page=order&page_order='.$i.'">'.$i.'</a></li>';
        }
        ?>
        
                        <table class="table-admin">
                            <caption>
                           
                               <div class="caption">Quản lý đơn hàng</div> 
                            </caption>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tài khoản</th>
                                    <th>Ngày đặt</th>
                                    <th>Tổng tiền</th>
                                 
                                </tr>  
                                <tbody>
                                    <?php 
                                    while ($row=mysqli_fetch_array($query)){
                                        if ($row['checked']==0)
                                        echo " <tr class='order__not-check'>
                                        <td><a href='home.php?page=chitietdonhang&id=".$row['id_order']."&user=".$row['user']."' onclick='checkedOrder(".$row['id_order'].")'>".$row['id_order']."</a></td>
                                        <td><a href='#'>".$row['user']."</a></td>
                                        <td>".$row['date']."</td>
                                        <td>".$row['total']."</td>
                                       
                                    </tr> ";
                                    else 
                                    echo " <tr class='order__checked'>
                                    <td><a href='home.php?page=chitietdonhang&id=".$row['id_order']."&user=".$row['user']."'>".$row['id_order']."</a></td>
                                    <td><a href='#'>".$row['user']."</a></td>
                                    <td>".$row['date']."</td>
                                    <td>".$row['total']."</td>
                                   
                                </tr> ";
                                   
                                    }
                                    ?>
                                   
                                    
                                </tbody>
                            </thead>
                        </table>
                        <ul class="phantrang">
                                <?php 
                                    echo $list_page;
                                ?>
                        </ul>
                        
                   