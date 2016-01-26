<div class="clear"></div>
<div class="content_box_aside">
	<?php require_once 'Sidebar_Product.php'; ?>
</div>

<div class="content_box_main">
    <div class="topic_title">
    <h2>
        New Arrivals</h2>
    </div>
    
    <div class="topic_details">
    <!-------------------------pagination --------->
    <?php
      $query = mysql_query("SELECT * FROM product_master");
      $total_rows = mysql_num_rows($query);
    
      $per_page = 20;//number of results to shown per page 
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
        $res = mysql_query("SELECT * FROM product_master LIMIT ".$per_page." OFFSET ".$offset);
    ?>
    <!-------------------------pagination --------->
    <?php
    include("pagination.php"); 
    ?>
    
    <?php
    if(isset($res))
    {	//creating table
	
        $date = date_create($result[dop]);
        while($result = mysql_fetch_assoc($res))
            {			 
				
				echo '<div class="product_box_thumb">';
				echo '<a href="index.php?route=product&option=product_details&product_id='.$result['product_id'].'" title="View Details" class="">
					  <img src="media_library/'.$result['product_image'].'" /></a>';
					  
				if ((time() - strtotime($result['posted_date'])) < (14 * 86400))
				{
				echo '<span class="newprod"><img src="Resources/ico/new.png" alt="New Product"></span>';
				}
			    echo '</div>';
			
		   }
		?>
    <?php } ?>
    <?php
    include("pagination.php"); 
    ?>
    <!-------------------------pagination --------->
    </div>

</div>
<div class="clear">
</div>



