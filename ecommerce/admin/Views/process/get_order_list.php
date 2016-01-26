<?php
//PM = product_master //CM = category_master
  $query = mysql_query("SELECT *
                        FROM 
                        order_master ORDER BY order_id DESC");
  $total_rows = mysql_num_rows($query);

  $per_page = 15;//number of results to shown per page 
  $num_links = 5;// how many links you want to show
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
    //PM = product_master //CM = category_master
    $res = mysql_query("SELECT *
                        FROM 
                        order_master ORDER BY order_id DESC LIMIT ".$per_page." OFFSET ".$offset);
?>
