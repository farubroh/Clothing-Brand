<?php
require('top.inc.php');
if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='Status'){
		$operation=get_safe_value($con,$_GET['operation']);
		$id=get_safe_value($con,$_GET['Id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update catagoreis set Status='$status' where Id='$id'";
		mysqli_query($con,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['Id']);
		$delete_sql="delete from catagoreis where Id='$id'";
		mysqli_query($con,$delete_sql);
	}
}



$sql="select * from catagoreis order by Catagories asc";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Categories </h4>
				   <h4 class="box-link"><a href="manage_categories.php">Add Categories</a> </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th>ID</th>
							   <th>Categories</th>
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td class="serial"><?php echo $i?></td>
							   <td><?php echo $row['Id']?></td>
							   <td><?php echo $row['Catagories']?></td>
							   <td>
								<?php
								if($row['Status']==1){
									echo "<span class='badge badge-complete'><a href='?type=	Status&operation=deactive&Id=".$row['Id']."'>Active</a></span>&nbsp;";
								}else{
									echo "<span class='badge badge-pending'><a href='?type=	Status&operation=active&Id=".$row['Id']."'>Deactive</a></span>&nbsp;";
								}
								echo "<span class='badge badge-edit'><a href='manage_categories.php?Id=".$row['Id']."'>Edit</a></span>&nbsp;";
								
								echo "<span class='badge badge-delete'><a href='?type=delete&Id=".$row['Id']."'>Delete</a></span>";
								
								?>
							   </td>
							</tr>
							<?php } ?>
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