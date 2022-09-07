<?php
require('top.inc.php');
$categories='';
$msg='';
if(isset($_GET['Id']) && $_GET['Id']!=''){
	$id=get_safe_value($con,$_GET['Id']);
	$res=mysqli_query($con,"select * from catagoreis where Id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$categories=$row['Catagories'];
	}else{
		header('location:categories.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$categories=get_safe_value($con,$_POST['categories']);
	$res=mysqli_query($con,"select * from catagoreis where Catagories='$categories'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['Id']) && $_GET['Id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['Id']){
			
			}else{
				$msg="Categories already exist";
			}
		}else{
			$msg="Categories already exist";
		}
	}
	
	if($msg==''){
		if(isset($_GET['Id']) && $_GET['Id']!=''){
			mysqli_query($con,"update catagoreis set Catagories='$categories' where Id='$id'");
		}else{
			mysqli_query($con,"insert into catagoreis(Catagories,Status) values('$categories','1')");
		}
		header('location:categories.php');
		die();
	}
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Categories</strong><small> Form</small></div>
                        <form method="post">
							<div class="card-body card-block">
							   <div class="form-group">
									<label for="categories" class=" form-control-label">Categories</label>
									<input type="text" name="categories" placeholder="Enter categories name" class="form-control" required value="<?php echo $categories?>">
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