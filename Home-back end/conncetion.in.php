<?php
session_start();
$con = new mysqli("localhost","root","","clothing_brand");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/Clothing brand/');
define('SITE_PATH','http://127.0.0.80/Clothing%20brand/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'/Image_admin/Admin-products/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'Image_admin/Admin-products/');
?>