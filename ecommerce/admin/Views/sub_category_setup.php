<?php require_once 'process/sub_category_setup_process.php';?>

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
        Sub Category Setup</h2>
    </div>
    <div class="topic_details">
        <div class="result">
                <?php if( isset($_GET['status']) )
                {
                    $status = $_GET['status'];
                    if($status == 1)
                    {
                        echo "<img src='Resources/ico/tick.png'><p>Sub Category added successfully</p>";
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
            <td width="20%"><label>Sub Category Name:</label></td>
            <td width="80%">
            <input type="text"  name="subcat_name" id="cat_name"  class="input_field"  style="width:350px"/>
            </td>
          </tr>
          <tr>
            <td><label>Parent Category:</label></td>
            <td>
            <select name="cat_id" id="cat_id" class="input_field" style="width:365px">
                <?php
                $getcat = "SELECT * FROM category_master";
                $resultcat = $dbObj->doQuery($getcat);
                ?>
                <?php while($rowcat = $dbObj->fetchObject($resultcat)){ ?>
                <option value="<?php echo $rowcat->category_id ?>">
                <?php echo ucfirst($rowcat->category_name); ?></option>
                <?php } ?>
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
        <h2>Sub Category List</h2>

        <div class="product_list">
          <table cellpadding="5"" cellspacing="2" width="90%" class="product_list">
            <thead>
                <tr>                    
                    <td width="50%"><b>Sub Category Name</b></td>
                    <td width="40%"><b>Category Name</b></td>
                    <td width="10%"><b>Actions</b></td>
                </tr>
            </thead>
            
            <tbody>
            <?php //SCM = sub_category_master //CM = category_master
                $query = "
						SELECT 
						SCM.sub_category_id, 
						CM.category_name,
						SCM.sub_category_name
						FROM 
						sub_category_master AS SCM 
						INNER JOIN 
						category_master AS CM
						ON SCM.parent_category_id = CM.category_id";
                $resultCat = $dbObj->doQuery($query);
                $sl = 0;
                while ($rowCat = $dbObj->fetchObject($resultCat)){
            ?>
                <tr>
                    <td><a href="index.php?page=Category&option=Update&id=<?php echo $rowCat->parent_category_id ?>" title=""><?php echo $rowCat->sub_category_name ?></a>
                    </td>
                     <td><?php echo $rowCat->category_name ?></td>
                    <td class="actBtns">
                        <a href="index.php?route=Category&option=Update&id=<?php echo $rowCat->parent_category_id ?>" title="Update" class="tipS"><img src="Resources/ico/tick.png" alt="" /></a>
                        <a href="index.php?route=sub_category&option=delete&catid=<?php echo $rowCat->parent_category_id ?>&subcatid=<?php echo $rowCat->sub_category_id ?>" title="Remove" class="tipS"><img src="Resources/ico/cross.png" alt="" /></a>
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


