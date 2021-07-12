    <?php 
       
       $sql="SELECT * FROM account ORDER BY account_name LIMIT 0,10";
       $query=mysqli_query($conn,$sql);

       $total_row=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM account"));
       $num_page=ceil($total_row/10);
       $list_page="";
       for($i=1;$i<=$num_page;$i++){
           if ($i==1) $list_page.='<li class="page phantrang_active"  value="'.$i.'" id="phantrang_active">'.$i.'</li>';
           else
           $list_page.='<li class="page" onclick="phanTrang_user('.$i.','.$num_page.')" value="'.$i.'" >'.$i.'</li>';
       }
       ?>
                        <table class="table-admin">
                            <caption>
                                <div class="sort-label">Sắp xếp theo:</div>
                                <select class="user-sort">
                                    
                               
                                    <option value="account_name">User-name</option>
                                    <option value="name">Tên</option>
                                    <option value="date_reigister">Ngày đăng ký</option>
                                    <option value="total">Tổng hóa đơn</option>
          
                                </select>
                                <div class="sort-type">
                                    <input type="radio" name="sort_user" id="lowhigh" value="lowhigh">
                                    <label for="lowhigh">Tăng dần</label>
                                    <input type="radio" name="sort_user" id="highlow" value="highlow">
                                    <label for="highlow">Giảm dần</label>
                                </div>
                               <input class="search-user" placeholder="Tìm kiếm" type="text">

                                Quản lý thành viên
                            </caption>
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên đăng nhập</th>
                                    <th>Họ tên</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                    <th>Địa chỉ</th>
                                    <th>Ngày đăng ký</th>
                                    <th>Tổng hóa đơn</th>
                                </tr>  
                                <tbody class="table_body">
                                <?php 
                                $k=1;
                                    while ($row=mysqli_fetch_array($query)){
                                       
                                        echo " <tr>
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
                                    ?>
                                </tbody>
                            </thead>
                        </table>
                        <ul class="phantrang">
                                <?php 
                                    echo $list_page;
                                ?>
                        </ul>
                   
                 