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
	
	<div class="aside_box">
    <h2>
        Find us on facebook</h2>
    <div class="fb-like-box" data-href="https://www.facebook.com/pages/banglar-Shova/400913069920049" data-width="250" data-colorscheme="dark" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
    </div>
    
</div>
<div class="content_box_main">
    <div class="topic_title">
    <h2>
        About Us</h2>
    </div>
    <div class="topic_details">
    <p>
	<?php
       $row = $dbObj->fetchObject($dbObj->doQuery("SELECT page_name,page_content,date FROM page_master Where page_id = '1' and status = '1'"));
       echo $row->page_content;
    ?>  
    </p>
    </div>
</div>
<div class="clear">
</div>







    





