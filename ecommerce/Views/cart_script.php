<?php
	//Error Reporting
	error_reporting(E_ALL ^ E_NOTICE);
	//error_reporting(E_ALL);
	ini_set('display_rror','1');
?>

<?php /////////////////////////////////////////////////
//// Section 1 [add Item to cart]
///////////////////////////////////////////////// 

if (isset($_POST['pid'])){
	$pid = $_POST['pid'];
	$wasFound = false;
	$i = 0;
	//if the cart session is not set or cart array is empty 
	if( !isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"])<1 ){
		//run if the cart empty or not set
		$_SESSION["cart_array"] = array(0 => array("item_id" => $pid,"quantity" => 1 ));
	}
	else{
		//run if the cart atleast one item
		foreach($_SESSION["cart_array"] as $each_item)
		{
			$i++;
			while(list($key, $value) = each($each_item)){
				if($key == "item_id" && $value == $pid){
					array_splice($_SESSION["cart_array"],$i-1,1,array(array("item_id" => $pid,"quantity" => $each_item['quantity'] + 1)));
					$wasFound = true;					
				}//close condition	
			}//while loop	
		}//foreach loop	
		if($wasFound == false){
			array_push($_SESSION["cart_array"], array("item_id" => $pid,"quantity" => 1 ));			
		}
	}
	echo ("<script>window.location='index.php?route=cart&option=add';</script>");
	exit();
}

?>

<?php /////////////////////////////////////////////////
//// Section 2 [Empty Cart]
///////////////////////////////////////////////// 

if(isset($_GET['cmd']) && $_GET['cmd'] == "emptycart"){
	unset($_SESSION["cart_array"]);
	unset($_SESSION["cart_total"]);
}
?>

<?php /////////////////////////////////////////////////
//// Section 3 [adjust Item Quntity]
///////////////////////////////////////////////// 

if(isset($_POST['item_to_adjust']) && $_POST['item_to_adjust'] != "")
{
	$item_to_adjust = $_POST['item_to_adjust'];
	$quantity = $_POST['quantity'];
	$quantity = preg_replace('#[^0-9]#i','',$quantity);
	if($quantity >= 100){$quantity = 99;}
	if($quantity < 1){$quantity = 1;}
	$i = 0;
	//run if the cart atleast one item
	foreach($_SESSION["cart_array"] as $each_item)
	{
		$i++;
		while(list($key, $value) = each($each_item)){
			if($key == "item_id" && $value == $item_to_adjust){
				array_splice($_SESSION["cart_array"],$i-1,1,array(array("item_id" => $item_to_adjust,"quantity" => $quantity)));
				$wasFound = true;
				}//close condition	
		}//while loop	
	}//foreach loop	
}
?>


<?php /////////////////////////////////////////////////
//// Section 4 [Remove Item]
///////////////////////////////////////////////// 

if(isset($_POST['index_to_remove']) && $_POST['index_to_remove'] != "")
{
	$key_to_remove = isset($_POST['index_to_remove']);
	if(count($_SESSION["cart_array"]) <= 1){
		unset($_SESSION["cart_array"]);
		unset($_SESSION["cart_total"]);
	}
	else{
		unset($_SESSION["cart_array"]["$key_to_remove"]);
		sort($_SESSION["cart_array"]);
		unset($_SESSION["cart_total"]);
	}
	
	echo ("<script>window.location='index.php?route=cart&option=add';</script>");
	exit();	
}
?>

<?php /////////////////////////////////////////////////
//// Section 5 [render Cart]
/////////////////////////////////////////////////
$cartOrder = "";
$cartOutput = "";
$quantityTotal = "0";
$cartTotal = "0.00";
if( !isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"])<1 ){
	$cartOutput = "<h3>Your shopping cart is Empty! You don't have any Item!</h3>";
}
else
{
	$i = 0;
	foreach($_SESSION["cart_array"] as $each_item){
		$item_id = $each_item['item_id'];
		$query = "SELECT * FROM product_master WHERE product_id = '$item_id' LIMIT 1";
		$result = $dbObj->doQuery($query);
		while($row = $dbObj->fetchObject($result)){
			$product_name = $row->product_title;
			$product_price = $row->product_price;
			$product_details = $row->product_title;	
			$product_thumb_image = $row->product_thumb_image;	
		}
		
		//table row total------------------------------------------------------------
		$pricetotal = $product_price * $each_item['quantity'];
		$cartTotal = $pricetotal + $cartTotal;
		$quantityTotal = $each_item['quantity'] + $quantityTotal;
		
		//table row assembly------------------------------------------------------------
        $cartOutput .= '<tr>';
		$cartOutput .= '<td><img class="cart_thumb" src="pr_thumb_small/'. $product_thumb_image .'" width="40" />'.'</td>';
		$cartOutput .= '<td><p>'. $product_name .'</p></td>';
		$cartOutput .= '<td class="cart_total_price"><b>'. $product_price .'</b></td>';
		$cartOutput .= '<td><form action="index.php?route=cart&option=adjust" method="post">
			<div class="cart_qty_adjst">
			<input name="quantity" type="text" value="'. $each_item['quantity'] .'" size="1" maxlength="3" class="cart_qty_field" />
			<button name="adjustButton' . $item_id . '" type="submit" class="cart_submit_button"><img src="Resources/ico/tick.png"/></button>
			</div>
			<input name="item_to_adjust" type="hidden" value="' . $item_id . '" />
		</form></td>';
/*		$cartOutput .= '<td><p>'. $each_item['quantity'] .'</p></td>';*/

		$cartOutput .= '<td class="cart_total_price"><b>'. $pricetotal .'</b></td>';
		$cartOutput .= '<td><form action="index.php?route=cart&option=delete" method="post">
			<button name="deleteButton' . $item_id . '" type="submit" class="cart_submit_button"><img src="Resources/ico/remove.png"/></button>
			<input name="index_to_remove" type="hidden" value="' . $i . '" />
		</form></td>';
		$cartOutput .= "</tr>";
		
		//table row assembly for order---------------------------------------------------
        $cartOrder .= '<tr>';
		$cartOrder .= '<td><img class="cart_thumb" src="../pr_thumb_small/'. $product_thumb_image .'" width="40" />'.'</td>';
		$cartOrder .= '<td><p>'. $product_name .'</p></td>';
		$cartOrder .= '<td class="cart_total_price"><b>'. $product_price .'</b></td>';
		$cartOrder .= '<td class="cart_total_price"><b>'. $each_item['quantity'] .'</b></td>';
		$cartOrder .= '<td class="cart_total_price"><b>'. $pricetotal .'</b></td>';
		$cartOrder .= "</tr>";

		$i++;
	}	
}

?>

