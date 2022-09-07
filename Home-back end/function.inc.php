<?php
function pr($arr){
    echo '<pre>';
    print_r($arr);
}

function prx($arr){
    echo'<pre>';
    print_r($arr);
    die();
}
function get_safe_value($con,$str){
	if($str!=''){
		$str=trim($str);
		return mysqli_real_escape_string($con,$str);
	}
}

function get_product($con,$limit='',$cat_id='',$product_id=''){
	$sql="select products.*,catagoreis.Catagories from products,catagoreis where products.Status=1 ";
	if($cat_id!=''){
		$sql.=" and products.Catagories_id=$cat_id ";
	}
	if($product_id!=''){
		$sql.=" and products.Id=$product_id ";
	}
	$sql.=" and products.Catagories_id=catagoreis.Id ";
	$sql.=" order by products.Id desc";
	if($limit!=''){
		$sql.=" limit $limit";
	}
	
	$res=mysqli_query($con,$sql);
	$data=array();
	while($row=mysqli_fetch_assoc($res)){
		$data[]=$row;
	}
	return $data;
}
?>

