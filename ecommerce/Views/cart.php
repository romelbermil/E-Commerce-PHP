<?php require_once 'cart_script.php'; ?>
<div class="clear"></div>
    <div class="search_panel">
         <?php include 'Products_Search.php'; ?>
     </div>
<div class="clear"></div>
<div class="content_box_aside">
	<?php require_once 'Sidebar_Product.php'; ?>
</div>

<div class="content_box_main">
	<div class="topic_title">
    <h2>
        Payment Summary</h2>
    </div>
    <div class="topic_details">
    
    <p>Please review the following details for this transaction.</p>
        <div class="product_list cart_thumb">
            <table width='100%' border='1' cellspacing='1' cellpadding='5'>
                <thead>
                    <tr>
                        <td width='5%' class="cart_total_price"><b>Image</b></td>
                        <td width='40%' class="cart_total_price"><b>Product</b></td>
                        <td width='15%' class="cart_total_price"><b>Unit</b></td>
                        <td width='20%' class="cart_total_price"><b>Quantity</b></td>
                        <td width='15%' class="cart_total_price"><b>Total</b></td>
                        <td width='5%' class="cart_total_price"><b>Opt.</b></td>
                    </tr>
                </thead>
                <tbody>
           		<?php echo $cartOutput; ?>
            	</tbody>
                <thead>
                    <tr>
                        <td width='5%' class="cart_total_price"><b>Total:</b></td>
                        <td width='40%'></td>
                        <td width='15%'></td>
                        <td width='20%'class="cart_total_price"><b><?php echo $quantityTotal; ?> Items</b></td>
                        <td width='15%' class="cart_total_price"><b><?php echo $cartTotal; ?></b></td>
                        <td width='5%' class="cart_total_price"><b>Tk.</b></td>
                    </tr>
                </thead>
          </table>
        </div>
    <p>      
    <a href="index.php?route=cart&option=empty&cmd=emptycart">Empty Shopping Cart!</a> ||
    <a href="index.php?route=home&option=current">&laquo; Continue to Shopping!</a></p>
    <br />
    <h2>Billing Information</h2>
    
    <div class="check_out">
    	<?php require_once 'validation_checkout.php'; ?>
        <?php require_once 'process/cart_checkout.php'; ?>
        <div class="result">
        <?php if( isset($_GET['status']) )
        {
            $order_id = $_GET['order'];
            $status = $_GET['status'];
            if($status == 1)
            {
				echo "<div style='border:1px solid #F60; background:#FF0; padding:5px; margin-bottom:10px; height:20px'>";
                echo "<img src='Resources/ico/tick.png'><p>Order made successfully</p>";
                echo "<img src='Resources/ico/tick.png'><p>Your Order Id:<b>" . $order_id . "</b></p>";
                echo "<img src='Resources/ico/tick.png'><p>Your Ip Address:<b>" . $ip . "</b></p>";
				echo "</div>";
                sleep(2);
            }
            else if($status == 0)
            {
				echo "<div style='border:1px solid #F60; background:#FF0; padding:5px; margin-bottom:10px; height:20px'>";
                echo "<img src='Resources/ico/cross.png'><p>Empty Shopping Cart!</p>";
				echo "</div>";
                sleep(2);
            }
        }?>
        </div>  
        <h3>Shipping Address:</h3>
        <hr />
        <form action="" method="post" onsubmit="return validForm();" id="check_out" name="Form">              
            <table width="100%" border="0" cellpadding="0" cellspacing="5">
          <tr>
            <td width="25%"><label>Full Name:</label></td>
            <td width="75%"><input type="text" name="name" class="input_field" style="width:280px;"/></td>
          </tr>
          <tr>
            <td><label>Email:</label></td>
            <td><input type="text" name="email" onKeyUp="checkUser(this.value)" class="input_field" style="width:280px;"/></td>
          </tr>
          <tr>
            <td><label>Contact Number:</label></td>
            <td><input type="text" name="contact_no" class="input_field" style="width:280px;"/></td>
          </tr>
          <tr>
            <td><label>Street:</label></td>
            <td><input type="text" name="street" class="input_field" style="width:170px;"/></td>
          </tr>
          <tr>
            <td><label>City:</label></td>
            <td><input type="text" name="city" class="input_field" style="width:170px;"/></td>
          </tr>
          <tr>
            <td><label>State:</label></td>
            <td><input type="text" name="state" class="input_field" style="width:170px;"/></td>
          </tr>
          <tr>
            <td><label>Zip:</label></td>
            <td><input type="text" name="zip" class="input_field" style="width:170px;"/></td>
          </tr>
          <tr>
            <td valign="top"><label>Address:</label></td>
            <td><textarea name="address" class="input_field" style="width:330px; height:100px;"></textarea></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>
            <input type="submit" class="my_input_button icon_save" name="sub" value="Place Order" style="width:220px"/>
            <input type="submit" class="my_input_button icon_reset" name="cancle" value="Cancle" style="width:120px"/></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
        </form>
        </div>
    </div>
</div>
<div class="clear">
</div>

