<div class="clear"></div>
    <div class="search_panel">
         <?php include 'Products_Search.php'; ?>
     </div>
<div class="clear"></div>
<div class="content_box_aside">
<?php  
	require_once 'Sidebar_Product.php'; 
?>
</div>

<div class="content_box_main">
    <div class="topic_title">
        <h2>
            Products Archive</h2>
    </div>
    
    <div class="topic_details">
    <!-------------------------pagination --------->
	<?php
	  $catid = $_GET["cat_id"];
	  $subcat_id = $_GET["sub_cat_id"];
	   //PM = product_master //SC = sub_category_master
		
	  $query =  mysql_query("SELECT 
				  count(*) as numofitem, 
				  PM.product_id,
				  PM.product_category_id,
				  PM.product_sub_category_id,
				  PM.product_image,
				  PM.product_thumb_image,
				  PM.posted_date,
				  
				  SC.sub_category_id,
				  SC.sub_category_name
				  
				  FROM sub_category_master SC INNER JOIN product_master PM 
				  ON SC.sub_category_id = PM.product_sub_category_id 
				  group by PM.product_sub_category_id ORDER BY RAND()");
				  
      /*$query = mysql_query("SELECT * FROM product_master WHERE status = 1 GROUP BY product_sub_category_id");*/
      $total_rows = mysql_num_rows($query);
    
      $per_page = 40;//number of results to shown per page 
      $num_links = 8;// how many links you want to show
      $total_rows = $total_rows; 
      $cur_page = 1;// set default current page to 1
      
        if(isset($_GET['paging']))
        {
          $cur_page = $_GET['paging'];
          $cur_page = ($cur_page < 1)? 1 : $cur_page;//if page no. in url is less then 1 or -ve
        }
        $offset = ($cur_page-1)*$per_page; //setting offset
        $pages = ceil($total_rows/$per_page);// no of page to be created
        $start = (($cur_page - $num_links) > 0) ? ($cur_page - ($num_links - 1)) : 1;
        $end   = (($cur_page + $num_links) < $pages) ? ($cur_page + $num_links) : $pages;
/*        $res = mysql_query("SELECT * FROM product_master WHERE status = 1 GROUP BY product_sub_category_id LIMIT ".$per_page." OFFSET ".$offset);*/
		$res = mysql_query("SELECT 
				  count(*) as numofitem, 
				  PM.product_id,
				  PM.product_category_id,
				  PM.product_sub_category_id,
				  PM.product_image,
				  PM.product_thumb_image,
				  PM.posted_date,
				  
				  SC.sub_category_id,
				  SC.sub_category_name
				  
				  FROM sub_category_master SC INNER JOIN product_master PM 
				  ON SC.sub_category_id = PM.product_sub_category_id 
				  group by PM.product_sub_category_id ORDER BY RAND() LIMIT ".$per_page." OFFSET ".$offset);
    ?>
    
	<?php
    if ($total_rows >0){
    ?>
    <!-------------------------pagination --------->
    <?php
    include("pagination.php"); 
    ?>
    <div class="product_box_main">
    <?php
    if(isset($res))
    {	
        while($result = mysql_fetch_assoc($res))
            {
              echo '<div class="product_box_thumb_all">';  
			  echo '<a href="index.php?route=product&option=category&cat_id='.$result['product_category_id'].'&sub_cat_id='.$result['product_sub_category_id'].'" title="View details"><img src="pr_thumb_small/'.$result['product_thumb_image'].'" /></a>';
				 
				if ((time() - strtotime($result['posted_date'])) < (15 * 86400)){
						echo '<span class="newprod_home"><img src="Resources/ico/new.png" alt="New Product"></span>';
					}
					else{
						echo '<span class="oldprod_home"><img src="Resources/ico/add_to_cart.png" alt="New Product"></span>';
					}
                echo '<div class="product_box_details_all">';
                echo '<b>'/*.$result['numofitem'].' */.$result['sub_category_name'].'</b>';
                echo '</div>';
              
              echo '</div>';
			  
            }
    }
    ?>
    </div>
    <?php
    include("pagination.php"); 
    ?>
    <!-------------------------pagination --------->
    <?php
	}
    else{

		echo '<h3>Nothing found..</h3>'; 
		echo '<p style="color:#f60">';  
		echo 'Sorry, but No Product listed Yet!';
		echo '</p>'; 
	}
    ?>
    
</div>
</div>
<div class="clear">
</div>







    





