<?php
if( isset($_POST['sub']))
{
	$catname = $_POST["cat_name"];
	$position = $_POST["position"];
	
	if(!empty($catname))
	{
		$query = "INSERT INTO category_master SET category_name='$catname', position = '$position'";
		$dbObj->doQuery($query);
    }
		
	echo ("<script>window.location='index.php?route=category&option=setup&status=1';</script>");
}
?>
