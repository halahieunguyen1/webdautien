<div class = "form-group">
						<label>Loại sản phẩm</label>
						<select id="species-product-selected" name="species">
                        <option>---------------</option>
							<?php 
								$array_species=['PC','Máy tính xách tay','Sever','Linh kiện','Phụ kiện','Thiết bị livestream','Thiết bị mạng','Thiết bị văn phòng','Thiết bị hội nghị & giảng dạy','Camera'];
								for ($i=0;$i<=count($array_species)-1;$i++)
								{
								
									echo "<option value='".$array_species[$i]."'>".$array_species[$i]."</option>";
								};
							?>
						</select>
							
						<label>Hãng</label>
						
						<select id="firm-product-selected" name="firm" >
						<option>---------------</option>
						</select>
				
					</div>
             