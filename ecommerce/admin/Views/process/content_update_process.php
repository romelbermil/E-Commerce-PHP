<?php

$pageid = $_GET["id"];
$pagname = $_GET["pagename"];

$query = "SELECT * FROM page_master WHERE page_id = $pageid ";
$result= $dbObj->doQuery($query);
$row = $dbObj->fetchObject($result);

if( isset($_POST['sub']))
{
	$content = $_POST["page_content"]; 
	if(!empty($pageid)){
	
		 $query = "UPDATE page_master SET page_content ='$content' WHERE page_id = $pageid";
	     $dbObj->doQuery($query);
					
	}	
	echo ("<script>window.location='index.php?route=content&option=list';</script>");
}
?>
