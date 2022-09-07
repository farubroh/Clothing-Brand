<?php
require('top.inc.php');

$categories_id='';
$name='';
$mrp='';
$price='';
$qty='';
$image='';
$short_desc	='';
$description	='';
$meta_title	='';
$meta_description='';
$meta_keyword='';

$msg='';
$image_required = 'required';
if(isset($_GET['Id']) && $_GET['Id']!=''){
	$image_required='';
	$id=get_safe_value($con,$_GET['Id']);
	$res=mysqli_query($con,"select * from products where Id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$categories_id=$row['Catagories_id'];
		$name=$row['P_name'];
		$mrp=$row['P_mrp'];
		$price=$row['Selling_price'];
		$qty=$row['Quantity'];
		$short_desc=$row['Short_desc'];
		$description=$row['Description'];
		$meta_title=$row['Meta_titile'];
		$meta_description=$row['Meta_desc'];
		$meta_keyword=$row['Meta_keyword'];
	}else{
		header('location:product.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$categories_id=get_safe_value($con,$_POST['Catagories_id']);
	$name=get_safe_value($con,$_POST['name']);
	$mrp=get_safe_value($con,$_POST['mrp']);
	$price=get_safe_value($con,$_POST['price']);
	$qty=get_safe_value($con,$_POST['qty']);
	
	$short_desc=get_safe_value($con,$_POST['short_desc']);
	$description=get_safe_value($con,$_POST['description']);
	$meta_title=get_safe_value($con,$_POST['meta_title']);
	$meta_description=get_safe_value($con,$_POST['meta_desc']);
	$meta_keyword=get_safe_value($con,$_POST['meta_keyword']);


	$res=mysqli_query($con,"select * from products where P_name='$name'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['Id']) && $_GET['Id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['Id']){
			
			}else{
				$msg="Product already exist";
			}
		}else{
			$msg="Product already exist";
		}
	}
	if($_GET['Id']==0){
		if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
			$msg="Please select only png,jpg and jpeg image formate";
		}
	}else{
		if($_FILES['image']['type']!=''){
				if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
				$msg="Please select only png,jpg and jpeg image formate";
			}
		}
	}

	if($msg==''){
		if(isset($_GET['Id']) && $_GET['Id']!=''){
			if($_FILES['image']['name']!=''){
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
			    move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
				$update_sql="update products set Catagories_id='$categories_id',P_name='$name',P_mrp='$mrp',Selling_price='$price',Quantity='$qty',Short_desc='$short_desc',Description='$description',Meta_titile='$meta_title',Meta_desc='$meta_description',Meta_keyword='$meta_keyword',Image='$image' where Id='$id'";
			}else{
				$update_sql="update products set Catagories_id='$categories_id',P_name='$name',P_mrp='$mrp',Selling_price='$price',Quantity='$qty',Short_desc='$short_desc',Description='$description',Meta_titile='$meta_title',Meta_desc='$meta_description',Meta_keyword='$meta_keyword' where Id='$id'";
			}
			mysqli_query($con,$update_sql);
		}else{
			$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
			mysqli_query($con,"insert into products(Catagories_id,P_name,P_mrp,Selling_price,Quantity,Short_desc,Description,Meta_titile,Meta_desc,Meta_keyword,Status,Image) values('$categories_id','$name','$mrp','$price','$qty','$short_desc','$description','$meta_title','$meta_description','$meta_keyword','1','$image')");
		}
		header('location:product.php');
		die();
	}
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Product</strong><small> Form</small></div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
							   <div class="form-group">
									<label for="categories" class=" form-control-label">Categories</label>
									<select class="form-control" name="Catagories_id">
										<option>Select Category</option>
										<?php
										
										$res=mysqli_query($con,"select Id,Catagories from catagoreis order by Catagories asc");
										while($row=mysqli_fetch_assoc($res)){
											if($row['Id']==$categories_id){
												echo "<option selected value=".$row['Id'].">".$row['Catagories']."</option>";
											}else{
												echo "<option value=".$row['Id'].">".$row['Catagories']."</option>";
											}
											
										}
										?>
									</select>
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Product Name</label>
									<input type="text" name="name" placeholder="Enter product name" class="form-control" required value="<?php echo $name?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">MRP</label>
									<input type="text" name="mrp" placeholder="Enter product mrp" class="form-control" required value="<?php echo $mrp?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Price</label>
									<input type="text" name="price" placeholder="Enter product price" class="form-control" required value="<?php echo $price?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Qty</label>
									<input type="text" name="qty" placeholder="Enter qty" class="form-control" required value="<?php echo $qty?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Image</label>
									<input type="file" name="image" class="form-control" <?php echo  $image_required?>>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Short Description</label>
									<textarea name="short_desc" placeholder="Enter product short description" class="form-control" required><?php echo $short_desc?></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Description</label>
									<textarea name="description" placeholder="Enter product description" class="form-control" required><?php echo $description?></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Meta Title</label>
									<textarea name="meta_title" placeholder="Enter product meta title" class="form-control"><?php echo $meta_title?></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Meta Description</label>
									<textarea name="meta_desc" placeholder="Enter product meta description" class="form-control"><?php echo $meta_description?></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Meta Keyword</label>
									<textarea name="meta_keyword" placeholder="Enter product meta keyword" class="form-control"><?php echo $meta_keyword?></textarea>
								</div>
								
								
							   <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							   <div class="field_error"><?php echo $msg?></div>
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
<?php
require('footer.inc.php');
?>