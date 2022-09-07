<?php
require('top.inc.php');
$order_id=get_safe_value($con,$_GET['id']);

if(isset($_POST['update_order_status'])){
	$update_order_status=$_POST['update_order_status'];
	if($update_order_status=='5'){
		mysqli_query($con,"update `order` set order_status='$update_order_status',payment_status='Success' where id='$order_id'");
	}else{
		mysqli_query($con,"update `order` set order_status='$update_order_status' where id='$order_id'");
	}
	
}
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Order Detail </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table">
					  <thead>
                                            <tr>
                                                <th class="product-thumbnail">Product Name</th>
												<th class="product-thumbnail">Product Image</th>
                                                <th class="product-name">Qty</th>
                                                <th class="product-price">Price</th>
                                                <th class="product-price">Total Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php
										
										$res=mysqli_query($con,"select distinct(order_detail.id) ,order_detail.*,products.P_name,products.Image,`order`.address,`order`.city,`order`.pincode from order_detail,products ,`order` where order_detail.order_id='$order_id' and  order_detail.product_id=products.Id GROUP by order_detail.id");
											$total_price=0;
											
									
										
											while($row=mysqli_fetch_assoc($res)){
												
												$total_price=$total_price+($row['qty']*$row['price']);
											?>
                                            <tr>
												<td class="product-name"><?php echo $row['P_name']?></td>
                                                <td class="product-name"> <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['Image']?>"></td>
												<td class="product-name"><?php echo $row['qty']?></td>
												<td class="product-name"><?php echo $row['price']?></td>
												<td class="product-name"><?php echo $row['qty']*$row['price']?></td>
                                                
                                            </tr>
                                            <?php } ?>
											<tr>
												<td colspan="3"></td>
												<td class="product-name">Total Price</td>
												<td class="product-name"><?php echo $total_price?></td>
                                                
                                            </tr>
                                        </tbody>
							
						</table>
						
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<?php
require('footer.inc.php');
?>