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
        Slider List</h2>
    </div>
    <div class="topic_details">
        <div class="product_list">
          <table cellpadding="5"" cellspacing="2" width="90%" class="product_list">
           <thead>
                <tr> 
                    <td width="40%"><b>Image</b></td>
                    <td width="30%"><b>Status</b></td>
                    <td width="30s%"><b>Actions</b></td>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM slider_master ORDER BY slider_id DESC";
                $result= $dbObj->doQuery($query);
                while ($row = $dbObj->fetchObject($result)){
                ?>   
                <tr>
                    <td align="center">
                        <a href="../sliderengine/images/<?php echo $row->image_path; ?>"
                         title="" rel="lightbox"><img src="../sliderengine/images/<?php echo $row->image_path; ?>" width="250px;" alt="" /></a></td>  
                    </td>
                    <td>
                        <?php 
                            $status = $row->status;
                            if($status == 1){
                                echo "Active";
                            }
                            elseif ($status == 0){
                                echo "Inactive";
                            } 
                        
                        ?>
                    
                    </td>
                    <td class="actBtns">
                <a href="index.php?route=slider&option=update&id=<?php echo $row->slider_id; ?>" title="Update" class="tipS"><img src="Resources/ico/tick.png" alt="" /></a>
                    </td>
                </tr>
                <?php 
                }
                ?>    
             </tbody>
         </table>
         </div>
    </div>
</div>
<div class="clear">
</div>
