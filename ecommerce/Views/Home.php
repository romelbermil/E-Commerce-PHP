<div class="slider_box">
    <div class="slider_box_Section_Left">
    	<!-- Insert to your webpage where you want to display the slider -->
        <div id="amazingslider-1" style="display:block;position:relative;">
            <ul class="amazingslider-slides" style="display:none;">
            <?php
				$query_sub_menu = "SELECT * FROM slider_master ORDER BY RAND() LIMIT 5";
				$res = $dbObj->doQuery($query_sub_menu);
				while($result = mysql_fetch_assoc($res))
				{?>	
				<!------------------------------>
                <li><img src=sliderengine/images/<?php echo $result['image_path']; ?> alt="" />
                <!------------------------------>
				<?php 
				}?>	
            </ul>
          </div>
        <!-- End of body section HTML codes -->
    </div>
    <div class="slider_box_Section_Right">
		<?php
        $query = "SELECT * FROM advertise_master WHERE ad_id = 3 AND ad_position = 'top' AND status = 1"; 
        $result = $dbObj->doQuery($query);
        $row = $dbObj->fetchObject($result);
        ?>
        <a href="<?php echo $row->ad_url; ?>" title=""><img src="advertise/<?php echo $row->ad_file_path; ?>"  width="349px" height="350px"/></a>
    </div>
</div>

<div class="clear">
</div>   
   
<div class="content_box_Details">
    <div class="search_panel">
        <?php include 'Products_Search.php'; ?>
    </div>
    <div class="clear">
    </div>
    <!--<div class="topic_title">
    	
    </div>-->
    <div class="topic_details">
        <div class="home_sec">
        <h2><span>Featured</span> Product</h2>
        <!-------------------------pagination --------->
			<?php
              $catid = $_GET["cat_id"];
              $subcat_id = $_GET["sub_cat_id"];
              
              $query = "SELECT * FROM product_master WHERE status = 1 GROUP BY product_sub_category_id ORDER BY RAND()"; 
              $result = $dbObj->doQuery($query);
              $product_number = $dbObj->numRows($result); 
            ?>
            <!-------------------------repeater --------->
            <?php
            if($product_number>0)
            {
                $date = date_create($result[dop]);
        
                while ($row = $dbObj->fetchObject($result))
                    {	
                    ?>		 
                        <div class="product_box_thumb_home">
                        <a href="index.php?route=product&option=category&cat_id=<?php echo $row->product_category_id; ?>&sub_cat_id=<?php echo $row->product_sub_category_id; ?>" title="View details of <?php echo $row->product_title?>"><img src="pr_thumb_small/<?php echo $row->product_thumb_image; ?>"  /></a>
                              
                        <?php if ((time() - strtotime($row->posted_date)) < (15 * 86400)){
                        	echo '<span class="newprod_home"><img src="Resources/ico/new.png" alt="New Product"></span>';
                        }
						else{
							echo '<span class="oldprod_home"><img src="Resources/ico/add_to_cart.png" alt="New Product"></span>';
						}
						
						?>
                        
                        <div class="product_box_details_home">
                            <b><?php echo country_currency($row->product_price); ?></b>
                            </div>
                        </div>
                        
                <?php }?>
            
            <?php } ?>
            <!-------------------------repeater --------->
            </div>
            <div class="clear"></div> 
            <div class="home_sec">
            <h2>Welcome to E-Commerce PHP</h2>
                <div class="clear"></div>
                <?php
                   $row = $dbObj->fetchObject($dbObj->doQuery("
                   SELECT page_name,page_content,date FROM page_master Where page_id = '1' and status = '1' "));
                   
                    $description =  $row->page_content;
                    $words = explode(" ",$description);
                    
                    $numofwords = count($words);
                    if($numofwords>50)
                    {
                        echo substr($row->page_content, 0, 290) ." ... ... ...";
                        echo '<a href="index.php?route=company&option=view">Read More+</a>';
                    } 
                    else{
                        echo $row->page_content;
                    }
                ?>
            </div> 
            <div class="clear"></div>
    </div>
</div>

<div class="clear"></div>
<script>
jQuery(document).ready(function(){
	jQuery('#holder').show();
	jQuery('#reapeter_thumb').simple_slider({
		'leftID': 'leftNav',
		'rightID': 'rightNav',
		'display': 6
	})
});
</script>










    





