<?php
if(isset($_POST['sub']))
{
	$title = mysql_real_escape_string($_POST["product_title"]); 
	$cat_id = mysql_real_escape_string($_POST["cat_id"]);
	$sub_cat_id = mysql_real_escape_string($_POST["sub_cat_id"]);
	$color = mysql_real_escape_string($_POST["product_color"]);
	$fabric = mysql_real_escape_string($_POST["product_fabric"]); 
	$size = mysql_real_escape_string($_POST["product_size"]);
	$price = mysql_real_escape_string($_POST["product_price"]);
	$description = mysql_real_escape_string($_POST["product_desc"]);
	$special_tag = mysql_real_escape_string($_POST["product_tag"]);
	$date = date("Y-m-d H:i:s");
	/*--------------------------------------------*/
	$size = 245; // the thumbnail height

	$filedir = '../pr_thumb_big/'; // the directory for the original image
	$thumbdir = '../pr_thumb_small/'; // the directory for the thumbnail image
	$prefix = 'small_'; // the prefix to be added to the original name

	$maxfile = '2000000';
	$mode = '0666';
	
	/*$name = rand(5,5468).basename( $_FILES['file']['name']);*/
	$userfile_name =  rand(5,5468).basename($_FILES['file']['name']);
	$userfile_tmp = $_FILES['file']['tmp_name'];
	$userfile_size = $_FILES['file']['size'];
	$userfile_type = $_FILES['file']['type'];
	
	$sql_chk = "SELECT id FROM product_master WHERE product_title = '$title' LIMIT 1";
		$productMatch = mysql_num_rows($sql_chk);
		if ($productMatch >0){
			echo ("<script>window.location='index.php?route=product&option=setup&status=3");
			exit();
		}
		if (isset($_FILES['file']['name'])) 
		{
			$prod_img = $filedir.$userfile_name;
			$prod_img_thumb = $thumbdir.$prefix.$userfile_name;
			/*---------------------------*/
			$prod_db_img = $userfile_name;
			$prod_db_img_thumb = $prefix.$userfile_name;
			
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

		
			if(!empty($cat_id)){
			$query = "INSERT INTO product_master 
					SET product_title = '$title',
						product_category_id = '$cat_id',
						product_sub_category_id = '$sub_cat_id',
						
						product_color = '$color',
						product_price = '$price', 
						product_fabric = '$fabric',
						
						product_image = '$prod_db_img',
						product_thumb_image = '$prod_db_img_thumb',
						
						product_desc = '$description',
						product_special_tag = '$special_tag',
						
						posted_date='$date'";
			 $dbObj->doQuery($query);
			 /*echo ("<script>window.location='index.php?route=product&option=setup&status=1';</script>");*/	
			 echo ("<script>window.location='index.php?route=product&option=list';</script>");		
		}
	 }
   
}

?>
