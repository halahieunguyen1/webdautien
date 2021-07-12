<?php 
        
        $sql="SELECT * FROM product ORDER BY    id_product LIMIT 0,10 ";
        $query=mysqli_query($conn,$sql);
        $total_row=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM product"));
        $num_page=ceil($total_row/10);
        $list_page="";
        for($i=1;$i<=$num_page;$i++){
            if ($i==1) $list_page.='<li class="page phantrang_active"  value="'.$i.'" id="phantrang_active">'.$i.'</li>';
            else
            $list_page.='<li class="page" onclick="phanTrang_product('.$i.','.$num_page.')" value="'.$i.'" >'.$i.'</li>';
        }
        ?>
        
                        <table class="table-admin">

                            <caption>
                                <select class="supplier-list__select list__select" id="species-product-selected-table">
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
                            
                                <a href="home.php?page=product-setting" class="add-firm">Thêm sản phẩm</a>
                               <div class="caption">Quản lý sản phẩm</div> 
                            </caption>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Hãng</th>
                                    <th>Số lượng</th>
                                    <th>Giá bán gốc</th>
                                 
                                </tr>  
                                <tbody id="product-table" class="table_body"> 
                                    <?php 
                                    while ($row=mysqli_fetch_array($query)){
                                        
                                        echo " <tr>
                                        <td>". $row['id_product']."</td>
                                        <td><a href='./home.php?page=chitietsanpham&id=".$row['id_product']."'>".$row['name_product']."</a></td>
                                        <td>".$row['firm']."</td>
                                        <td>".$row['numbers']."</td>
                                        <td>".$row['price']."</td>
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
                        
                   