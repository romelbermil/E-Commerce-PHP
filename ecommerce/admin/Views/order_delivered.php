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
        Order List</h2>
        
    </div>
    <div class="topic_details">
      <div class="product_list">
          <!-------------------------pagination --------->
    <?php include("process/get_delivered_order_list.php");?>
    <!-------------------------pagination --------->
    <?php include("pagination_order.php"); ?>
    <?php
    if(isset($res))
    {	//creating table
        $date = date_create($result[dop]);
        
			echo '<table cellpadding="5"" cellspacing="2" width="90%" class="product_list">
			   <thead>
					<tr> 
						<td width="5%"><b>order_id</b></td>
						<td width="20%"><b>name</b></td>
						<td width="5%"><b>email</b></td>
						<td width="15%"><b>order_ip</b></td>
						<td width="15%"><b>date</b></td>
						<td width="5%"><b>Status</b></td>
						<td width="5%"><b>Options</b></td>
					</tr>
				</thead>';
				echo '<tbody>';
                while($result = mysql_fetch_assoc($res))
				{
                ?>   
                <tr>
                    <td align="center">
					     <?php echo $result['order_id']; ?></td>
                    <td><?php echo $result['name']; ?></td>
                    <td><?php echo $result['email'];?></td>
                    <td><?php echo $result['order_ip']; ?>
                    </td>
                    <td><?php $date = $result['date']; $date = date_create($date); 
							  echo date_format($date, 'd. M, Y')." at ".date_format($date, 'g:i a'); ?>
                    </td>
                    <td>
                        <?php 
						$status = $result['status'] ;
						if($status == 1){
							echo "<b style='color:green;'><img src='Resources/ico/delivered.png' title='Delivered'/></b>";}
						elseif ($status == 0){
							echo "<b style='color:red;'><img src='Resources/ico/pending.png' title='Pending'/></b>";
						} 
					   ?>
                    </td>
                    <td class="actBtns">
                            <a href="index.php?route=order&option=view&order_id=<?php echo $result['order_id']; ?>" 
                            title="View Details" class="tipS"><img src="Resources/ico/tick.png" alt="" /></a>
                            
                            <a href="index.php?route=order&option=delete&order_id=<?php echo $result['order_id']; ?>" 
                            title="Remove" class="tipS"><img src="Resources/ico/cross.png" alt="" /></a>
                    </td>
                </tr>
                <?php 
                } 
             echo '</tbody>';
             echo '</table>';
			}
		 ?>
		<?php include("pagination_order.php"); ?>
		</div>
	</div>
</div>
<div class="clear">
</div>
