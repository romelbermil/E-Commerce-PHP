<div class="clear"></div>
    <div class="search_panel">
         <?php include 'Products_Search.php'; ?>
     </div>
<?php 
if (isset($_GET["product_id"]))
{
$id = $_GET["product_id"];
$query = "SELECT * FROM product_master WHERE product_id = '$id' LIMIT 1";
$result = $dbObj->doQuery($query);
$row = $dbObj->fetchObject($result);
?> 
<div class="clear"></div>
<div class="content_box_aside">
<?php require_once 'Sidebar_Product.php'; ?>
</div>

<div class="content_box_main">
<div class="topic_title">
    <h2>
        Payment Details</h2>
    </div>
<div class="topic_details">

<!-------------------------pagination --------->     
<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
<div class="prduct_details_left">
	<div class="zoom-small-image">
	<a href='pr_thumb_big/<?php echo $row->product_image; ?>' class = 'cloud-zoom' id='zoom1' rel="adjustX: 10, adjustY:-4">
	<img src="pr_thumb_big/<?php echo $row->product_image; ?>" alt='' title="<?php echo $row->product_title; ?>" />
	</a></div>
</div>

<div class="prduct_details_right">
	<div class="prduct_details_sec_1">
		<h2><?php echo $row->product_title; ?></h2>
		<p>Posted On:<?php $date = $row->posted_date; $date = date_create($date);
		echo date_format($date, 'd. M, Y')." at ".date_format($date, 'g:i a');?></p>
		<h3><?php echo country_currency($row->product_price)?></h3>
	</div>
	<div class="prduct_details_sec_2">
		<p><b>Color: </b><?php echo $row->product_color; ?> | <b>Fabric: </b><?php echo $row->product_fabric; ?></p>
		<hr />
		<p><b>Cash On</b> Delivery</p>
		<p><b>100% Genuine</b> Products</p>
	</div>
	<?php echo $row->product_special_tag; ?><br />

	<div class="prduct_details_sec_3">
		<form action="index.php?route=cart&option=add" method="post" name="">
			<!--<input name="quantity" class="cart_input_field" type="text" width="50px" id="quantity" onblur="checkValue(this)" value="1">-->
			<input type="hidden" name="pid" id="pid" value="<?php echo $id; ?>" />
			<button type="submit" name="button" id="button" class="cart_input_button" >Add to Cart 
			<img src="Resources/ico/cart.png" width="24" height="24" class="buybtn_image" /></button>
		</form>
	</div>
	
   </div>
   <div class="clear"></div>
   
   <div class="prduct_details_sec_desc">
   <h2>More Details:</h2>
		<p><?php echo $row->product_desc; ?></p>
   </div>
   
   <div class="clear"></div>
   <h2>More similar products</h2>
   <div id='holder' style='display:none; position:relative'>
	<img src='cursor_slider/images/left.png' id='leftNav' />
	<span id='reapeter_thumb'>
			<?php
			$query_sub_menu = "SELECT * FROM product_master 
								WHERE product_category_id = $row->product_category_id ORDER BY RAND() LIMIT 20";
			$res = $dbObj->doQuery($query_sub_menu);
			while($result = mysql_fetch_assoc($res))
			{?>	
				  <!-------------2----------------->
				   <a href="index.php?route=product&option=product_details&product_id=<?php echo $result['product_id']; ?>">
				   <img src=pr_thumb_small/<?php echo $result['product_thumb_image']; ?> class='objImgFrame'/></a>
				   <!------------------------------> 						
		   <?php 
		   } ?>
	</span>
	<img src='cursor_slider/images/right.png' id='rightNav' />
</div>
</div>
</div>
<?php
}
else{

echo '<h3>Nothing found..</h3>'; 
echo '<p style="color:#f60">';  
echo 'Sorry, but No Product listed Yet!';
echo '</p>'; 
}
?>
<div class="clear"></div>
<script>
jQuery(document).ready(function(){
jQuery('#holder').show();
jQuery('#reapeter_thumb').simple_slider({
'leftID': 'leftNav',
'rightID': 'rightNav',
'display': 4
})
});
</script>







    





