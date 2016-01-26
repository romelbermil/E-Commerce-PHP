<?php require_once 'process/offer_setup_process.php';?>

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
        Offer Setup</h2>
    </div>
    <div class="topic_details">
        <div class="result">
            <?php if( isset($_GET['status']) )
            {
                $status = $_GET['status'];
                if($status == 1)
				{
                    echo "<img src='Resources/ico/tick.png'><p>Product added successfully</p>";
                    sleep(2);
                }
                else if($status == 0)
				{
                    echo "<img src='Resources/ico/cross.png'><p>Error on data Saving!</p>";
                    sleep(2);
                }
            }?>
        </div>
        <form id="validate" class="form" method="post" action="" onsubmit="" name="" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <table width="100%" border="0" cellpadding="0" cellspacing="5">
        <tr>
            <td width="15%"><label>URL:</label></td>
            <td width="85%"><input type="text" name="url" id="title" class="input_field" value="<?php echo $row->ad_url; ?>" style="width:350px" /></td>
          </tr>
          
          <tr>
            <td><label>Placement:</label></td>
            <td>      
            <select name="position" id="position" class="input_field" style="width:365px" value="<?php echo $row->ad_position; ?>">
            	<option value="top">Banner Side</option>
                <option value="left">Left Side</option>
                <option value="bottom">Bottom Page</option>
            </select>
            </td>
          </tr>
          <tr>
            <td><label>Browse Offer image:</label></td>
            <td>
            <input type="hidden" name="old_image" value="<?php echo $row->ad_file_path; ?>" />
            <img src="../advertise/<?php echo $row->ad_file_path; ?>" width="380px" height="150px" />
            <input type="file" name="file" id="file" class="input_field" style="width:350px" multiple/>
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input type="submit" class="my_input_button icon_save" name="sub" value="Submit" style="width:180px"/></td>
          </tr>
        </table>
        </form>
        
        <h2>Offer List</h2>
        <table cellpadding="5"" cellspacing="2" width="90%" class="product_list">
           <thead>
                <tr> 
                    <td width="40%"><b>Image</b></td>
                    <td width="25%"><b>URL</b></td>
                    <td width="15%"><b>Position</b></td>
                    <td width="10%"><b>Status</b></td>
                    <td width="10%"><b>Actions</b></td>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM advertise_master ORDER BY ad_id DESC";
                $result= $dbObj->doQuery($query);
                while ($row = $dbObj->fetchObject($result)){
                ?>   
                <tr>
                    <td align="center">
                        <a href="../advertise/<?php echo $row->ad_file_path; ?>"
                         title="" rel="lightbox"><img src="../advertise/<?php echo $row->ad_file_path; ?>" width="250px;" alt="" /></a></td>  
                    </td>
                    <td><?php echo $row->ad_url; ?></td>
                    <td><?php echo $row->ad_position; ?></td>
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
                <a href="index.php?route=offer&option=update&id=<?php echo $row->ad_id; ?>" title="Update" class="tipS"><img src="Resources/ico/tick.png" alt="" /></a>
                <a href="index.php?route=offer&option=delete&id=<?php echo $row->ad_id; ?>&img=<?php echo $row->ad_file_path; ?>" 
                            title="Remove" class="tipS"><img src="Resources/ico/cross.png" alt="" /></a>
                    </td>
                </tr>
                <?php 
                }
                ?>    
             </tbody>
         </table>
    </div>
</div>
<div class="clear">
</div>


