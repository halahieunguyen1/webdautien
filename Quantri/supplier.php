        <?php 
       
        $sql="SELECT * FROM firm ORDER BY name LIMIT 0,10";
        $query=mysqli_query($conn,$sql);

        $total_row=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM firm"));
        $num_page=ceil($total_row/10);
        $list_page="";
        for($i=1;$i<=$num_page;$i++){
            if ($i==1) $list_page.='<li class="page phantrang_active"  value="'.$i.'" id="phantrang_active">'.$i.'</li>';
            else
            $list_page.='<li class="page" onclick="phanTrang_firm('.$i.','.$num_page.')" value="'.$i.'" >'.$i.'</li>';
        }
        ?>
        
        <table class="table-admin" >
                            <caption>
                                <select class="supplier-list__select list__select" id="firm-selected">
                                    <option value="all" >--Sản phẩm cung cấp--</option>
                                    <option value="Máy tính xách tay" >Máy tính xách tay</option>
                                    <option value="PC">PC</option>
                                    <option value="Camera">Camera</option>
                                    <option value="Sever">Sever</option>
                                    <option value="Linh kiện">Linh kiện</option>
                                    <option value="Phụ kiện">Phụ kiện</option>
                                    <option value="Thiết bị văn phòng">Thiết bị văn phòng</option>
                                    <option value="Thiết bị mạng">Thiết bị mạng</option>
                                    <option value="Thiết bị livestream">Thiết bị livestream</option>
                                    <option value="Thiết bị hội nghị & giảng dạy">Thiết bị hội nghị & giảng dạy</option>
                                    <option value=""><a href="facebook.com">----Thêm loại mới-----</a></option>
                                </select>
                            
                                <a href="home.php?page=firm-setting" class="add-firm">Thêm hãng</a>
                               <div class="caption">Quản lý nhà cung cấp</div> 
                            </caption>
                            <thead>
                                <tr>
                                    <th class="supplier-c1">Nhà cung cấp</th>
                                    <th class="supplier-c2">Phone</th>
                                    <th class="supplier-c3">Email</th>
                                    <th class="supplier-c4">Sản phẩm cung cấp</th>
                                    <th class="supplier-c5"></th>
                                </tr>  
                                <tbody id="firm-table" class="table_body"> 
                                    <?php 
                                    while ($row=mysqli_fetch_array($query)){
                                        $a=$row['name'];
                                        $sql0="SELECT * FROM product_species WHERE firm='$a'";
                                        $query0=mysqli_query($conn,$sql0);
                                        $w="";
                                        while ($row0=mysqli_fetch_array($query0)){
                                           if (empty($w))
                                            $w.=$row0['name'];
                                            else $w.="-".$row0['name'];
                                        }
                                        echo " <tr>
                                        <td>". $row['name']."</td>
                                        <td>".$row['phone']."</td>
                                        <td>".$row['email']."</td>
                                        <td>".$w."</td>
                                        <td class='icon'> <a href='home.php?page=firm-setting&setting_firm=".$row['name']."' class='setting-firm'><i class='fas fa-wrench'></i></a>  <a href='home.php?page=firm-setting&delete_firm=".$row['name']."' class='delete-firm'><i class='fas fa-times-circle'></i></a></td>
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
                        
                   