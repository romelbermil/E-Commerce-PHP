<?php
    if(isset($pages))
    {  
        if($pages > 1)        
        {  
			echo '<div id="pagination">';
            if($cur_page > $num_links)     ///////////to take to page 1 //////////
            {   $dir = "first";
                echo '<span id="prev"> <a href="'.$_SERVER['PHP_SELF'].'?route=product&option=category&cat_id='.$catid.'&sub_cat_id='.$subcat_id.'&paging='.(1).'">'.$dir.'</a> </span>';
            }
           if($cur_page > 1) 
            {
                $dir = "&laquo; Prev";
                echo '<span id="prev"> <a href="'.$_SERVER['PHP_SELF'].'?route=product&option=category&cat_id='.$catid.'&sub_cat_id='.$subcat_id.'&paging='.($cur_page-1).'">'.$dir.'</a> </span>';
            }                 
            
            for($x=$start ; $x<=$end ;$x++)
            {
                
                echo ($x == $cur_page) ? '<strong>'.$x.'</strong> ':'<a href="'.$_SERVER['PHP_SELF'].'?route=product&option=category&cat_id='.$catid.'&sub_cat_id='.$subcat_id.'&paging='.$x.'">'.$x.'</a> ';
            }
            if($cur_page < $pages )
            {   $dir = "Next &raquo;";
                echo '<span id="next"> <a href="'.$_SERVER['PHP_SELF'].'?route=product&option=category&cat_id='.$catid.'&sub_cat_id='.$subcat_id.'&paging='.($cur_page+1).'">'.$dir.'</a> </span>';
            }
            if($cur_page < ($pages-$num_links) )
            {   $dir = "last";
           
                echo '<a href="'.$_SERVER['PHP_SELF'].'?route=product&option=category&cat_id='.$catid.'&sub_cat_id='.$subcat_id.'&paging='.$pages.'">'.$dir.'</a> '; 
            } 
			
            echo '<span id="total"><p>Total: ' .$total_rows.' || Page ' .$cur_page. ' of ' .$pages. '</p></span>'; 
			echo '</div>'; 
        }
    }
?>
