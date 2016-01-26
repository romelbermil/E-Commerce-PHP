<?php
$id = $_GET["id"];
$query = "SELECT * FROM product_master WHERE product_id = $id";
$result= $dbObj->doQuery($query);
$row = $dbObj->fetchObject($result);
?> 
<?php
if(isset($_POST['sub']))

{
	$title = $_POST["product_title"]; 
	
	$cat_id = $_POST["cat_id"];
	$sub_cat_id = $_POST["sub_cat_id"];
	
	$color = $_POST["product_color"];
	$fabric = $_POST["product_fabric"]; 
	$size = $_POST["product_size"];
	$price = $_POST["product_price"];
	$description = $_POST["product_desc"];
	$special_tag = $_POST["product_tag"];
	$date = date("Y-m-d H:i:s");
	/*--------------------------------------------*/
	$size = 245; // the thumbnail height

	$filedir = '../pr_thumb_big/'; // the directory for the original image
	$thumbdir = '../pr_thumb_small/'; // the directory for the thumbnail image
	$prefix = 'small_'; // the prefix to be added to the original name

	$maxfile = '2000000';
	$mode = '0666';
	
	/*$name = rand(5,5468).basename( $_FILES['file']['name']);*/
	$old_image =$_POST["old_image"];
	$old_name = $old_image;
	
	$old_image_thumb =$_POST["old_image_thumb"];
	$old_thumb_name = $old_image_thumb;
	
	$userfile_name =  $_FILES['file']['name'];
	$userfile_tmp = $_FILES['file']['tmp_name'];
	$userfile_size = $_FILES['file']['size'];
	$userfile_type = $_FILES['file']['type'];
	
	if(!empty($userfile_name))
	{
		$path = "../pr_thumb_big/$old_image";
		unlink($path);
		
		$thumb_path = "../pr_thumb_small/$old_image_thumb";
		unlink($thumb_path);

		$prod_img = $filedir.$old_name;
		$prod_img_thumb = $thumbdir.$old_thumb_name;
		/*---------------------------*/
		$prod_db_img = $old_name;
		$prod_db_img_thumb = $old_thumb_name;
		
		move_uploaded_file($userfile_tmp, $prod_img);
		chmod ($prod_img, octdec($mode));
		
		$sizes = getimagesize($prod_img);

		$aspect_ratio = $sizes[1]/$sizes[0]; 

		if ($sizes[1] <= $size)
		{
			$new_width = $sizes[0];
			$new_height = $sizes[1];
		}
		else{
			$new_height = $size;
			$new_width = abs($new_height/$aspect_ratio);
		}

		$destimg=ImageCreateTrueColor($new_width,$new_height)
			or die('Problem In Creating image');
		$srcimg=ImageCreateFromJPEG($prod_img)
			or die('Problem In opening Source Image');
		if(function_exists('imagecopyresampled'))
		{
			imagecopyresampled($destimg,$srcimg,0,0,0,0,$new_width,$new_height,ImageSX($srcimg),ImageSY($srcimg))
			or die('Problem In resizing');
		}else{
			Imagecopyresized($destimg,$srcimg,0,0,0,0,$new_width,$new_height,ImageSX($srcimg),ImageSY($srcimg))
			or die('Problem In resizing');
		}
		ImageJPEG($destimg,$prod_img_thumb,90)
			or die('Problem In saving');
		imagedestroy($destimg);
	}
	
	if(!empty($id))
	{
		$query = "UPDATE product_master 
				SET product_title = '$title',
				    product_category_id = '$cat_id',
					product_sub_category_id = '$sub_cat_id',
					
					product_color = '$color',
					product_price = '$price', 
					product_fabric = '$fabric',
					
					product_image = '$old_name',
					product_thumb_image = '$old_thumb_name',
					
					product_desc = '$description',
					product_special_tag = '$special_tag',
					
					posted_date='$date'
					
					WHERE product_id = $id";
	     $dbObj->doQuery($query);
		 /*echo ("<script>window.location='index.php?route=product&option=setup&status=1';</script>");*/	
		 echo ("<script>window.location='index.php?route=product&option=list';</script>");		
	}
}

?>
