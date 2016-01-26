<?php
$id = $_GET["order_id"];
$query = "SELECT 
			OM.order_total,
			OM.totalQty,
			OM.name,
			OM.email,
			OM.contact,
			OM.street,
			OM.city,
			OM.state,
			OM.zip,
			OM.address,
					
			OM.order_ip,
			OM.date, 
			OM.status,
			OD.description
			
			FROM 
			order_details AS OD 
			INNER JOIN 
			order_master AS OM 
			ON OM.order_id =  OD.pr_order_id 
			WHERE OD.pr_order_id = $id";
						
$result= $dbObj->doQuery($query);
$row = $dbObj->fetchObject($result);

if( isset($_POST['sub']))
{
	if(!empty($id))
	{
		$query = "UPDATE order_master SET status = '1' WHERE order_id = $id";		
		$dbObj->doQuery($query);
	}
	echo ("<script>window.location='index.php?route=order&option=view&order_id=" . $id . "';</script>");
}
?>
<div class="clear">
</div>
<div class="content_box_aside">
    <div class="aside_box">
    <h2>
        Navigation</h2>
        <div class="glossymenu">
			<?php require_once 'SiteMenu.php'; ?>
    	</div>
    </div>
</div>
<div class="content_box_main">
    <div class="topic_title">
    <h2>
        Order Details</h2>
        
    </div>
    <div class="topic_details">
    <div id="Order_Details">
    <div class="product_list cart_thumb">
    <h3>
        Ordered Product Information</h3>
     <table width='100%' border='1' cellspacing='1' cellpadding='5'>
                <thead>
                    <tr>
                        <td width='5%' class="cart_total_price"><b>Image</b></td>
                        <td width='40%' class="cart_total_price"><b>Product</b></td>
                        <td width='15%' class="cart_total_price"><b>Unit</b></td>
                        <td width='20%' class="cart_total_price"><b>Qty</b></td>
                        <td width='20%' class="cart_total_price"><b>Total</b></td>
                    </tr>
                </thead>
                <tbody>
           		<?php echo $row->description; ?>
            	</tbody>
                <thead>
                    <tr>
                        <td width='5%' class="cart_total_price"><b>Total:</b></td>
                        <td width='40%'></td>
                        <td width='15%'></td>
                        <td width='20%' class="cart_total_price"><b><?php echo $row->totalQty; ?> Items</b></td>
                        <td width='20%' class="cart_total_price"><b><?php echo $row->order_total; ?></b></td>
                        
                    </tr>
                </thead>
          </table>
        </div>
        <div class="Order_info">
        <h3>
        	Ordered Person Information</h3>
            <hr />
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td width="20%"><label>Order made by:</label></td>
                <td colspan="3"><b><?php echo $row->name; ?></b></td>
              </tr>
            <tr>
                <td><label>Order Total:</label></td>
                <td colspan="3"><b>
                <span>
					<?php $total = $row->order_total; echo country_currency($total);  ?>
                    </span>
                </b>
                </td>
              </tr>
              <tr>
                <td><label>Order Total In Word:</label></td>
                <td colspan="3"> 
                 <?php  echo '<b>'.convert_number_to_words($total).' Tk. Only.</b>';?>
                </td>
              </tr>
            <tr>
                <td><label>Email Id:</label></td>
                <td width="31%"><p><?php echo $row->email; ?></p></td>
                <td width="12%">&nbsp;</td>
                <td width="37%">&nbsp;</td>
            </tr>
            <tr>
                <td><label>Contact No:</label></td>
                <td><p><?php echo $row->contact; ?></p></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td><label>City:</label></td>
                <td><p><?php echo $row->city; ?></p></td>
                <td><label>State:</label></td>
                <td><p><?php echo $row->state; ?></p></td>
            </tr>
            <tr>
                <td><label>Street:</label></td>
                <td><p><?php echo $row->street; ?></p></td>
                <td><label>Zip Code:</label></td>
                <td><p><?php echo $row->zip; ?></p></td>
            </tr>
            <tr>
                <td><label>Address:</label></td>
                <td colspan="3"><p><?php echo $row->address; ?></p></td>
              </tr>
            <tr>
                <td><label>Ip Address:</label></td>
                <td><p><?php echo $row->order_ip; ?></p></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td><label>Date Requested:</label></td>
                <td><p><?php $date =  $row->date; $date = date_create($date); 
							  echo date_format($date, 'd. M, Y')." at ".date_format($date, 'g:i a'); ?></p></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td><label>Status:</label></td>
                <td><p><?php 
						$status = $row->status; 
						if($status == 1){
							echo "<b style='color:green;'>Delivered <img src='Resources/ico/tick.png' /></b>";}
						elseif ($status == 0){
							echo "<b style='color:red;'>Pending <img src='Resources/ico/cross.png' /></b>";
						} 
					?></p>
               </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            
         </table>

         </div>
        </div>
        
        <form id="validate" class="form" method="post" action="" >
            <input type="submit" class="my_input_button icon_reset" name="sub" value="Issue Order" style="width:170px"/>
            <input type="button" onclick="printContent('Order_Details')" style="width:150px" value="Print!" class="my_input_button"/>
        </form>
     
	</div>
</div>
<div class="clear">
</div>
<script type="text/javascript">
<!--
function printContent(id){
	str=document.getElementById(id).innerHTML
	newwin=window.open('','printwin','left=100,top=100,width=800,height=800')
	newwin.document.write('<HTML>\n<HEAD>\n')
	newwin.document.write('<TITLE>Placed Order Sheet</TITLE>\n')
	
	newwin.document.write('<script>\n')
	newwin.document.write('function chkstate(){\n')
	newwin.document.write('if(document.readyState=="complete"){\n')
	newwin.document.write('window.close()\n')
	newwin.document.write('}\n')
	newwin.document.write('else{\n')
	newwin.document.write('setTimeout("chkstate()",5000)\n')
	newwin.document.write('}\n')
	newwin.document.write('}\n')
	newwin.document.write('function print_win(){\n')
	newwin.document.write('window.print();\n')
	newwin.document.write('chkstate();\n')
	newwin.document.write('}\n')
	newwin.document.write('<\/script>\n')
	
	newwin.document.write('</HEAD>\n')
	
	newwin.document.write('<br />')
	newwin.document.write('<br />')
	newwin.document.write('<BODY onload="print_win()">\n')
	
	newwin.document.write(str)
	
	newwin.document.write('<br />')
	newwin.document.write('<br />')
	newwin.document.write('<br />')
	newwin.document.write('<br />')
	newwin.document.write('<br />')
	newwin.document.write('<br />')

	newwin.document.write('<p>We assure you of our best services at all times.Thank your for choosing banglarshova.</p>')
	newwin.document.write('<div>\n')
	newwin.document.write('<table width="80%" border="0" cellpadding="0" cellspacing="0">')
	newwin.document.write('<tr>')
	newwin.document.write('<td align="left">Approved By..... <?php echo $_SESSION["user_name"]; ?></td>')
	newwin.document.write('<p style="color:#eee;">=================================================================================</p>')
	newwin.document.write('<td align="right">Received By.....</td>')
	newwin.document.write('</tr>')
	newwin.document.write('</table>')
	newwin.document.write('<\/div>\n')
	

	newwin.document.write('<br />')
	newwin.document.write('www.banglarshova.com')
	
	newwin.document.write('</BODY>\n')
	newwin.document.write('</HTML>\n')
	newwin.document.close()
}
//-->
</script>
