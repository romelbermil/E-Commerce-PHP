<?php
if( isset($_POST['sub']))
{
	$catide = $_POST["cat_id"];
	$subcatname = $_POST["subcat_name"];
	
	if(!empty($subcatname))
	{
		$query = "INSERT INTO sub_category_master SET sub_category_name = '$subcatname', parent_category_id = '$catide'";
		$dbObj->doQuery($query);
    }
		
	echo ("<script>window.location='index.php?route=sub_category&option=setup&status=1';</script>");
}
?>
