<?php
$id = $_GET["id"];
$query = "SELECT * FROM advertise_master WHERE ad_id = $id";
$result= $dbObj->doQuery($query);
$row = $dbObj->fetchObject($result);

if( isset($_POST['sub']))
{
	$url = $_POST["url"]; 
	$position = $_POST["position"];

	if(!empty($id))
	{
		/*---------------------*/
		$imageName = $_FILES["file"]["name"];
		$old_image =$_POST["old_image"];
		$name = $old_image;
		if(!empty($imageName))
		{
			$path = "../advertise/$old_image";
			unlink($path);
	
			$target_path = "../advertise/";
			$newname = rand(5,5468).basename( $_FILES['file']['name']);
			$target_path = $target_path .$name;
			move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
		}
		/*---------------------*/		
		$query = "UPDATE advertise_master 
					SET 
					ad_url ='$url' 
					ad_position ='$position' 
					ad_file_path = '$newname',
					
					WHERE ad_id = $id";		
		$dbObj->doQuery($query);
		echo ("<script>window.location='index.php?route=offer&option=update&status=1';</script>");		 	
	}		
	else
	{
		/*---------------------*/
		$imageName = $_FILES["file"]["name"];
		$target_path = "../advertise/";
		$name = rand(5,5468).basename( $_FILES['file']['name']);
		/*$name = basename( $_FILES['file']['name']);*/
		$target_path = $target_path .$name;
		move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
		/*---------------------*/	
		$query = "INSERT INTO advertise_master 
				  SET ad_url = '$url',
					ad_position = '$position',
					ad_file_path = '$name'";
		 $dbObj->doQuery($query);	
		 echo ("<script>window.location='index.php?route=offer&option=setup&status=1';</script>");	
		
	}	
}

?>
