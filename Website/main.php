<?php 


        $sql="SELECT * FROM product ORDER BY name_product LIMIT 0,24";
        $query=mysqli_query($conn,$sql);
		
        $total_row=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM product"));
        $num_page=ceil($total_row/24);
        $list_page="";
        for($i=1;$i<=$num_page;$i++){
            if ($i==1) $list_page.='<li class="page phantrang_active"  value="'.$i.'" id="phantrang_active">'.$i.'</li>';
            else
            $list_page.='<li class="page" onclick="phanTrang_productweb('.$i.','.$num_page.')" value="'.$i.'" >'.$i.'</li>';
        }
 ?>
					<div class="col l-3 m-0 c-0">
						<nav class="category">
							<div class="category-1">
								<h3 class="category__heading">
									<i class="fas fa-list"></i>
									Danh Mục
								</h3>
								<ul class="category-list">
								
									<li onclick='filterProducts(this)' onmouseenter='catelogyChild(this)' class="category-item">
									<span class='catelory-item-click' >Máy tính xách tay</span>
										
									</li>	
									<li onclick='filterProducts(this)' onmouseenter='catelogyChild(this)' class="category-item">
									<span class='catelory-item-click' >PC</span>
										
									</li>
									</li>	
									<li onclick='filterProducts(this)' mouseenter='catelogyChild(this)' class="category-item" >
									<span class='catelory-item-click' >Sever</span>
										
									</li>	
									<li onclick='filterProducts(this)' onmouseenter='catelogyChild(this)' class="category-item">
									<span class='catelory-item-click' >Phụ kiện</span>
										
									</li>	
									<li onclick='filterProducts(this)' onmouseenter='catelogyChild(this)' class="category-item">
									<span class='catelory-item-click' >Linh kiện</span>
										
									</li>	
									<li onclick='filterProducts(this)' onmouseenter='catelogyChild(this)' class="category-item">
									<span class='catelory-item-click' >Thiết bị livestrem</span>
									
									</li>	
									<li onclick='filterProducts(this)' onmouseenter='catelogyChild(this)' class="category-item">
									<span class='catelory-item-click' >Thiết bị văn phòng</span>
									
									</li>	
									<li onclick='filterProducts(this)' onmouseenter='catelogyChild(this)' class="category-item">
									<span class='catelory-item-click' >Thiết bị mạng</span>
										
									</li>	
									<li onclick='filterProducts(this)' onmouseenter='catelogyChild(this)' class="category-item">
									<span class='catelory-item-click' >Thiết bị hội nghị & giảng dạy</span>
									
									</li>	
									<li onclick='filterProducts(this)' onmouseenter='catelogyChild(this)' class="category-item">
									<span class='catelory-item-click' >Camera</span>
										
									</li>		
								</ul>
							</div>
						</nav>
					</div>
					<div class="col l-9 m-12 c-12">
						<div class="home-filter">
							<span class="home-filter__label">
								Sắp xếp theo
							</span>
							<button class="btn" onclick='filterProduct("Phổ biến",0)'>
								Phổ biến
							</button>
							<button class="btn " onclick='filterProduct("Mới nhất",1)'>Mới nhất</button>
						
							<button class="btn" onclick='filterProduct("Khuyến mại",2)'>Khuyến mại</button>
							<div class="home-filter__price">
								<span class="home-filter__price-label">
									Giá
								</span>
								<i class="fas fa-angle-down"></i>
								<ul class="home-filter__price-sort">
									<li onclick="sort_price(0)" class="home-filter__price-item">
										Từ thấp đến cao
									</li>
									<li  onclick="sort_price(1)" class="home-filter__price-item">
										Từ cao đến thấp
									</li>
								</ul>
							</div>
							
						</div>
						
						<div class="home-product">
							<div class="row list_product">
							<?php 
						
							while ($row=mysqli_fetch_array($query)){

										$x=(int)substr($row['sale'],0,-1);
										if (strpos($row['sale'],"%"))
										{
											
											$price_new= (int)$row['price']*(100-$x)/100 ;
										}                
										else $price_new =(int)$row['price'] - $x;
										if ($row['sale']!=0) {
											if (strpos($row['sale'],"%"))
											$sale=	"<div class='product-item__price'>
													<span class='product-item__numbers'>Còn:".$row['numbers']."</span>
													<span class='product-item__price-old'>".$row['price']." đ</span>
													<span class='product-item__price-new'>".$price_new." đ</span>
													</div><div class='producct-item__sale-off'>
													<div class='product-item__sale-off-label'>Giảm</div>
														<div class='product-item__sale-off-percent'>".$row['sale']."</div>
													</div>";
												else
												$sale=	"<div class='product-item__price'>
													<span class='product-item__numbers'>Còn:".$row['numbers']."</span>
													<span class='product-item__price-old'>".$row['price']." đ</span>
													<span class='product-item__price-new'>".$price_new." đ</span>
													</div><div class='producct-item__sale-off producct-item__sale-off-vnd '>
														
														<div class='product-item__sale-off-label'>Giảm</div>
														<div class='product-item__sale-off-percent'>".$row['sale']."</div>
													</div>";
											}
									else $sale="<div class='product-item__price'>
									<span class='product-item__numbers'>Còn:".$row['numbers']."</span>
									<span class='product-item__price-old'></span>
									<span class='product-item__price-new'>".$price_new." đ</span>
								</div>";	
								$a=$row['name_product'];
										echo "
										<div class='col l-4 m-4 c-6'>
										<a href='index.php?page=chitietsanpham&id=".$row['id_product']."'>
										<div class='product-item'>
										<div class='product-item__img' style='background-image:url(../images/".$row['image'].");'></div>
										<h5 class='product-item__name'>".$row['name_product']."</h5>
										".$sale."</div></a></div>";
						
                                    }
                                    ?>

	
						
						</div>
						<ul class="phantrang">
                                <?php 
                                    echo $list_page;
                                ?>
                        </ul>
					</div>
			