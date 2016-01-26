<?php require_once 'process/category_setup_process.php';?>

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
</div>
<div class="content_box_main">
    <div class="topic_title">
    <h2>
        Category Setup</h2>
    </div>
    <div class="topic_details">
      <div class="result">
            <?php if( isset($_GET['status']) )
            {
                $status = $_GET['status'];
                if($status == 1)
				{
                    echo "<img src='Resources/ico/tick.png'><p>Category added successfully</p>";
                    sleep(2);
                }
                else if($status == 0)
				{
                    echo "<img src='Resources/ico/cross.png'><p>Error on data Saving!</p>";
                    sleep(2);
                }
            }?>
        </div>
        <form id="validate" class="form" method="post" action="" >
        <table width="100%" border="0" cellpadding="0" cellspacing="3">
          <tr>
            <td width="20%"><label>Category Name:</label></td>
            <td width="80%">
            <input type="text"  name="cat_name" id="cat_name"  class="input_field"  style="width:350px"/>
            </td>
          </tr>
          <tr>
            <td><label>Menu Position:</label></td>
            <td><select name="position" id="position" class="input_field" style="width:365px">
                <option value="first">First</option>
                <option value="last">Last</option>
            </select>
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input type="submit" class="my_input_button icon_save" name="sub" value="Submit" style="width:180px"/></td></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
        </form>
        <h2>Category List</h2>
        <div class="product_list">
          <table cellpadding="5"" cellspacing="2" width="90%" class="product_list">
            <thead>
                <tr>                    
                    <td width="10%"><b>SL</b></td>
                    <td width="75%"><b>Category Name</b></td>
                    <td width="15%"><b>Actions</b></td>
                </tr>
            </thead>
            
            <tbody>
            <?php
                $query = "SELECT * FROM category_master";
                $resultCat = $dbObj->doQuery($query);
                $sl = 0;
                while ($rowCat = $dbObj->fetchObject($resultCat)){
            ?>
                <tr>
                    <td align="center"><?php $i++; echo $i; ?></td>
                    <td><a href="index.php?route=Category&option=Update&id=<?php echo $rowCat->category_id ?>" title=""><?php echo $rowCat->category_name ?></a>
                    </td>
                    
                    <td class="actBtns">
                        <a href="index.php?route=Category&option=Update&id=<?php echo $rowCat->category_id ?>" title="Update" class="tipS"><img src="Resources/ico/tick.png" alt="" /></a>
                        <a href="index.php?route=category&option=delete&id=<?php echo $rowCat->category_id ?>" title="Remove" class="tipS"><img src="Resources/ico/cross.png" alt="" /></a>
                    </td>
                </tr>
            <?php
                }
            ?>
            </tbody>
            </table>
        </div>
    </div>
</div>
<div class="clear">
</div>


