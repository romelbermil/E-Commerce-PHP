<?php
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
	$ip = $_SERVER['HTTP_CLIENT_IP'];
} 
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} 
else {
	$ip = $_SERVER['REMOTE_ADDR'];
}

date_default_timezone_set('Asia/Dhaka');
$datetime = date("Y-m-d H:i:s a");
$order_id = "";

if( isset($_POST['sub']))
{
	$full_name = $_POST["name"];
	$email = $_POST["email"];
	$contact =	$_POST["contact_no"];
	$street = $_POST["street"];
	$city =	$_POST["city"];
	$state =	$_POST["state"];
	$zip =	$_POST["zip"];
	$address =	$_POST["address"];
	$description = $cartOrder;
	$order_total = $cartTotal;
	$totalItem = $quantityTotal;
	
	if(!empty($email) && ($cartTotal != "0.00"))
	{
		$query = "INSERT INTO order_master 
					SET
					order_total = '$order_total',
					totalQty = '$totalItem',
					name = '$full_name',
					email = '$email',
					contact = '$contact',
					street = '$street',
					city = '$city',
					state = '$state',
					zip = '$zip',
					address= '$address',
					order_ip = '$ip',
					date = '$datetime'";	
		$dbObj->doQuery($query);
		$order_id = mysql_insert_id();
		//-----------------------------------------	
		$query_det = "INSERT INTO order_details SET pr_order_id = '$order_id',description = '$description'";
		$dbObj->doQuery($query_det);
		echo ("<script>window.location='index.php?route=cart&option=view&status=1&order=" . $order_id . "';</script>");
		exit();
	}
	echo ("<script>window.location='index.php?route=cart&option=view&status=0';</script>");		
	
}
?>

