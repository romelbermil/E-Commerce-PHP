<div class="aside_box">
    <h2>
        Categories</h2>
        <div class="glossymenu">
			<?php 
				$query_menu = "SELECT * FROM category_master WHERE status = 1";
				$result_menu = $dbObj->doQuery($query_menu);
				while ($row_menu = $dbObj->fetchObject($result_menu))
				{	
				$result=mysql_query("SELECT count(*) as total from sub_category_master WHERE parent_category_id = $row_menu->category_id AND status = 1");
				$data=mysql_fetch_assoc($result);
				
				$query_sub_menu = "SELECT * FROM sub_category_master WHERE parent_category_id = $row_menu->category_id AND status = 1";
				$result_sub_menu = $dbObj->doQuery($query_sub_menu);
				$num_of_sub_menu = $dbObj->numRows($result_sub_menu);
				
				if($num_of_sub_menu > 0)
				{
					$link = "#";
				}
				else
				{
					$link = "index.php?route=product&option=category&cat_id=".$row_menu->category_id;
				}
				?>
				
					<a class="menuitem submenuheader <?php echo $row_menu->position ?>" href="<?php echo $link; ?>">
					<?php echo $row_menu->category_name ?> (<?php echo $data['total'] ?>)</a>
					
					<?php
					if($num_of_sub_menu> 0)
					{
					echo "<div class='submenu'>";
					echo "<ul>";
					while($row_sub_menu = $dbObj->fetchObject($result_sub_menu))
					{
					$result_item=mysql_query("
					SELECT count(*) as total_item from product_master 
					WHERE product_category_id = $row_menu->category_id AND product_sub_category_id = $row_sub_menu->sub_category_id AND status = 1");
					$data_item=mysql_fetch_assoc($result_item);
					?>
						<li>
						<a href="index.php?route=product&option=category&cat_id=<?php echo $row_menu->category_id; ?>&sub_cat_id=<?php echo $row_sub_menu->sub_category_id; ?>" >
						<?php echo $row_sub_menu->sub_category_name; ?> (<?php echo $data_item['total_item'] ?>)</a></li>
						<?php 
						}
					echo "</ul>";
					echo "</div>";
					} 
					?>
				
				<?php 
				}
				?>
    	</div>
    <!------------------------------------->
    </div>
	<div class="aside_box">
    <h2>
        Find us on facebook</h2>
    <div class="fb-like-box" data-href="https://www.facebook.com/pages/banglar-Shova/400913069920049" data-width="250" data-height="320" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>

    </div>