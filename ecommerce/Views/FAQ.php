<div class="clear"></div>
    <div class="search_panel">
         
     </div>
<div class="clear"></div>
<div class="content_box_aside">
    <?php require_once 'Sidebar.php'; ?>  
</div>
<div class="content_box_main">
    <div class="topic_details">
    <h2>
        FAQ's</h2>
    <p>
	<?php
       $row = $dbObj->fetchObject($dbObj->doQuery("SELECT page_name,page_content,date FROM page_master Where page_id = '9' and status = '1'"));
       echo $row->page_content;
    ?>  
    </p>
    </div>
</div>
<div class="clear">
</div>







    





