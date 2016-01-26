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
        Content List</h2>
    </div>
    <div class="topic_details">
        <div class="product_list">
          <table cellpadding="5"" cellspacing="2" width="90%" class="product_list">
           <thead>
                <tr> 
                    <td width="15%"><b>Page</b></td>
                    <td width="45%"><b>Content</b></td>
                    <td width="25%"><b>Date</b></td>
                    <td width="7%"><b>Status</b></td>
                    <td width="5%"><b>Actions</b></td>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM page_master ORDER BY page_id DESC";
                $result= $dbObj->doQuery($query);
                while ($row = $dbObj->fetchObject($result)){
                ?>   
                <tr>
                    <td><?php echo $row->page_name; ?></td>
                    <td><?php

							$description =  $row->page_content;
							$words = explode(" ",$description);
							
							$numofwords = count($words);
							if($numofwords>50)
							{
								echo substr($row->page_content, 0, 300) ." ... ... ...";
							} 
							else{
								echo $row->page_content;
							}
					   ?>
					   
					</td>
                    <td>
                        <?php 
                            $date = $row->date;
                            $date = date_create($date);
                            echo date_format($date, 'd. M, Y')." at ".date_format($date, 'g:i a'); 
                        ?>
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
                    <a href="index.php?route=content&option=update&id=<?php echo $row->page_id; ?>&pagename=<?php echo $row->page_name; ?>" 
                    title="Update""><img src="Resources/ico/tick.png" alt="" /></a>

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
