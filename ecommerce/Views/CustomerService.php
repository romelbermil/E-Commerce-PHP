<div class="clear"></div>
    <div class="search_panel">
         
     </div>
<div class="clear"></div>
<div class="content_box_aside">
    <?php require_once 'Sidebar.php'; ?>  
</div>
<div class="content_box_main">
	<div class="topic_title">
    <h2>
        Customer Service</h2>
    <div class="topic_details">
    
    <p>
	<?php
       $row = $dbObj->fetchObject($dbObj->doQuery("SELECT page_name,page_content,date FROM page_master Where page_id = '7' and status = '1'"));
       echo $row->page_content;
    ?>  
    </p>
    </div>
</div>
<div class="clear">
</div>







    





