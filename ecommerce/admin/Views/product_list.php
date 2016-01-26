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
        Product List</h2>
        <div style="float:right; color:#3C0; margin-top:15px; margin-right:15px;">
        <a style="color:#3C0; font-weight:bold" href="index.php?route=product&option=setup">+ Add New Inventory Item</a></div>
    </div>
    <div class="topic_details">
      <div class="product_list">
          <!-------------------------pagination --------->
    <?php include("process/get_product_list.php");?>
    <!-------------------------pagination --------->
    <?php include("pagination.php"); ?>
    <?php
    if(isset($res))
    {	//creating table
        $date = date_create($result[dop]);
        
			echo '<table cellpadding="5"" cellspacing="2" width="90%" class="product_list">
			   <thead>
					<tr> 
						<td width="5%"><b>Image</b></td>
						<td width="20%"><b>Titel</b></td>
						<td width="5%"><b>Prices</b></td>
						<td width="15%"><b>Category</b></td>
						<td width="15%"><b>Entry Date</b></td>
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
                        <a href="../pr_thumb_small/<?php echo $result['product_thumb_image']; ?>" 
                        title="" rel="lightbox"><img src="../pr_thumb_small/<?php echo $result['product_thumb_image']; ?>" 
                        height="60px" width="50px;" alt="" /></a></td>
                    <td><a href="index.php?page=product&option=details&id=<?php echo $result['product_id']; ?>" title="">
						<?php echo $result['product_title']; ?></a></td>
                    <td><?php echo $result['product_price']." ৳ " ; ?></td>
                    <td><?php echo $result['category_name']; ?>
                    </td>
                    <td><?php $date = $result['posted_date']; $date = date_create($date); 
							  echo date_format($date, 'd. M, Y')." at ".date_format($date, 'g:i a'); ?>
                    </td>
                    <td>
                        <?php 
                            $status = $result['status']; 
                            if($status == 1){
                                echo "Active";}
                            elseif ($status == 0){
                                echo "Inactive";
                            } 
                        
                        ?>
                    </td>
                    <td class="actBtns">
                            <a href="index.php?route=product&option=update&id=<?php echo $result['product_id']; ?>" 
                            title="Update" class="tipS"><img src="Resources/ico/tick.png" alt="" /></a>
                            
                            <a href="index.php?route=product&option=delete&id=<?php echo $result['product_id']; ?>&catid=<?php echo $result['product_category_id'] ?>&subcatid=<?php echo $result['product_sub_category_id']?>&img=<?php echo $result['product_image']; ?>&imgthumb=<?php echo $result['product_thumb_image']; ?>" 
                            title="Remove" class="tipS"><img src="Resources/ico/cross.png" alt="" /></a>
                    </td>
                </tr>
                <?php 
                } 
             echo '</tbody>';
             echo '</table>';
			}
		 ?>
		<?php include("pagination.php"); ?>
		</div>
	</div>
</div>
<div class="clear">
</div>
