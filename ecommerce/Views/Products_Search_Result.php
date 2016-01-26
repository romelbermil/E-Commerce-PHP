<div class="clear" style="padding-top:20px;"></div>
    <div class="search_panel">
         <?php include 'Products_Search.php'; ?>
     </div>
<div class="clear"></div>
<div class="content_box_aside">
	<?php require_once 'Sidebar_Product.php'; ?>
</div>

<div class="content_box_main">

    <div class="topic_details">
    <!-------------------------pagination --------->
	<?php

	  $cat_id = $_POST["cat_id"];
	  $subcat_id = $_POST["sub_cat_id"];
	  $search_value = $_POST["search"];
	  
	  /*$query = "SELECT * FROM product_master WHERE status=1 AND product_title LIKE '$search_value%'";*/
      $query = mysql_query("SELECT * FROM product_master WHERE status=1 AND product_category_id = '$cat_id' AND product_title LIKE '$search_value%' ORDER BY RAND()");
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
        $res = mysql_query("SELECT * FROM product_master WHERE status=1 AND product_title LIKE '$search_value%' ORDER BY RAND() 
							LIMIT ".$per_page." OFFSET ".$offset);
    ?>
    <!-------------------------pagination --------->

    <?php
    include("pagination_cat.php"); 
    ?>
    <div class="product_box_main">
    <?php
    if(isset($res))
    {	//creating table
	if($total_rows>0)
	{
        while($result = mysql_fetch_assoc($res))
            {
			  echo '<h2>Item matched..</h2>'; 
              echo '<div class="product_box_thumb_all">';  
			  echo '<a href="index.php?route=product&option=product_details&product_id='.$result['product_id'].'"  title="View details of ' . $result['product_title'] . '">
                      <img src="pr_thumb_small/'.$result['product_thumb_image'].'" />
                 </a>';
				 
				if ((time() - strtotime($result['posted_date'])) < (15 * 86400)){
						echo '<span class="newprod_home"><img src="Resources/ico/new.png" alt="New Product"></span>';
					}
					else{
						echo '<span class="oldprod_home"><img src="Resources/ico/add_to_cart.png" alt="New Product"></span>';
					}
					
                echo '<div class="product_box_details_all">';
                echo '<b>' . country_currency($result['product_price']) . '</b>';
                echo '</div>';
              
              echo '</div>';
			  
            }
		}
		else
		{
			
			echo '<h3>Nothing matched..</h3>'; 
			echo '<label style="color:#f60">';  
			echo 'Sorry, but nothing matched your search terms. Please try again with some different keywords!';
			echo '</label>'; 
		}
    }
    ?>
    </div>
    <?php
    include("pagination_cat.php"); 
    ?>
    
</div>
</div>
<div class="clear">
</div>







    





