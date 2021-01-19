
<div class="table-responsive" style="width: 90%; margin: 20px auto 30px; height: 60vh;">
				<table class="table-bordered">
                    
					
					<?php
					if(empty($_SESSION["shopping_cart"])) {
				
						echo "siziň sebediňizde haryt ýok"; } 
					else 
					{
                        $total = 0;
                        $total_item = 0;
						
						
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr class="table-head">
						<th width="30%">Harydyň ady</th>
						<th width="5%">Mukdary</th>
						<th width="15%">Bahasy</th>
						<th width="15%">Jemi</th>
						<th width="15%">Düzelt</th>
					</tr>
					<tr>
						<td style="text-align: center;"><?php echo htmlspecialchars($values["item_name"]); ?></td>
						<td style="text-align: center;"><?php echo htmlspecialchars($values["item_quantity"]); ?></td>
						<td style="text-align: center;"><?php echo htmlspecialchars($values["item_price"]); ?>TMT</td>
						<td style="text-align: center;"><?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?>TMT</td>
						<td style="text-align: center;"><a href="sebedim.php?action=delete&product_id=<?php echo htmlspecialchars($values["item_id"]); ?>"><span style="color:red;">Aýyr</span></a></td>
					</tr>
					<?php
                            $total = $total + ($values["item_quantity"] * $values["item_price"]);
                            $total_item = $total_item + $values['item_quantity'];
						} 
						
					?>
					<tr>
						<td colspan="3" align="right" ><b>Jemi</b></td>
						<td align="right" style="border-top: 1px solid #ccc;"><b><?php echo number_format($total, 2); ?>TMT</b></td>
						<td></td>
						<p style="padding-left: 10px;"> Siziň sebediňizde jemi <?php echo $total_item; ?> haryt bar. </p>
					
                    </tr>
					
                    <tr>
					
						<td style="text-align: center;"><?php
					
					}
					?></td>
						<td style="text-align: center;"></td>
						<td style="text-align: center;"></td>
						<td style="text-align: center;"></td>
						<td style="text-align: center;"></td>
						
                        
					</tr>
                    
                    
					
				</table>
				<div class="order-info-p" style="text-align:center;"><a href="sarga.php" class="order-btn-send">Harytlary sarga</a> <a href="index.php" class="order-btn-send">Söwda dowam et</a> <a class="order-btn-send">tel: +993 61 877465</a></div>
                
			</div>