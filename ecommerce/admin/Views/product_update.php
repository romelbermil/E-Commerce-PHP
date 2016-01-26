<?php require_once 'process/product_update_process.php';?>

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
        Product Update</h2>
    </div>
    <div class="topic_details">
        <div class="result">
            <?php if( isset($_GET['status']) )
            {
                $status = $_GET['status'];
                if($status == 1)
				{
                    echo "<img src='Resources/ico/tick.png'><p>Product added successfully</p>";
                    sleep(2);
                }
                else if($status == 0)
				{
                    echo "<img src='Resources/ico/cross.png'><p>Error on data Saving!</p>";
                    sleep(2);
                }
            }?>
        </div>
        <form id="validate" class="form" method="post" action="" onsubmit="" name="" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <table width="100%" border="0" cellpadding="0" cellspacing="5">
        <tr>
            <td width="15%"><label>Product Title:</label></td>
            <td width="85%"><input type="text" name="product_title" value="<?php echo $row->product_title; ?>" id="title" class="input_field"  style="width:385px" /></td>
          </tr>
          
          <tr>
            <td><label>Parent Category:</label></td>
            <td> 
            <select name="cat_id" id="cat_id" class="input_field" style="width:365px" onchange="subCat()" >
                <?php
                    $getCat = "SELECT * FROM category_master WHERE category_id = $row->product_category_id";
                    $resultCat = $dbObj->doQuery($getCat);
                    $rowCat = $dbObj->fetchObject($resultCat);
                ?>
                <option value="<?php echo $rowCat->category_id ?>"><?php echo ucfirst($rowCat->category_name); ?></option>
                <?php
                    $getCat = "SELECT * FROM category_master WHERE status = 1 ORDER BY category_name";
                    $resultCat = $dbObj->doQuery($getCat);
                ?>
                <?php while($rowCat = $dbObj->fetchObject($resultCat)){ ?>
                <option value="<?php echo $rowCat->category_id ?>"><?php echo ucfirst($rowCat->category_name); ?></option>
                <?php } ?>
            </select>
            </td>
          </tr>
          <tr>
            <td><label> Sub Category:</label></td>
            <td>
               <div id="txtHint"></div>
				<?php
                $sub_cat_id = $row->product_sub_category_id;
                if(!empty($sub_cat_id))
				{
					$getCat = "SELECT * FROM sub_category_master WHERE sub_category_id=$sub_cat_id";
					$resultCat = $dbObj->doQuery($getCat);
					$rowCat = $dbObj->fetchObject($resultCat);
                ?>
                <select name="sub_cat_id" id="sub_cat_id" class="input_field" style="width:365px" >
                <option value="<?php echo $rowCat->sub_category_id ?>"><?php echo ucfirst($rowCat->sub_category_name); ?></option>
                <?php
                echo $getCat1 = "SELECT * FROM sub_category_master 
								WHERE status = 1 AND sub_category_id=$row->product_category_id ORDER BY sub_category_name";
                $resultCat1 = $dbObj->doQuery($getCat1);
                while($rowCat1 = $dbObj->fetchObject($resultCat1))
					{ ?>
                    <option value="<?php echo $rowCat1->sub_category_id ?>"><?php echo ucfirst($rowCat1->sub_category_name); ?></option>
					<?php 
                    } ?>
                <?php		
				}
                ?>
                </select>
            </td>
          </tr>
          <tr>
            <td><label>Product Color:</label></td>
            <td><input type="text" name="product_color" value="<?php echo $row->product_color; ?>" id="title" class="input_field"  style="width:285px" /></td>
          </tr>
          <tr>
            <td><label>Product Fabric:</label></td>
            <td><input type="text" name="product_fabric" value="<?php echo $row->product_fabric; ?>" id="title" class="input_field"  style="width:285px" /></td>
          </tr>
          <tr>
            <td><label>Product Size:</label></td>
            <td><input type="text" name="product_size" value="<?php echo $row->product_size; ?>" id="title" class="input_field"  style="width:285px" /></td>
          </tr>
          <tr>
            <td><label>Product Price:</label></td>
            <td><input type="text" name="product_price" value="<?php echo $row->product_price; ?>" id="title" class="input_field"  style="width:285px" /></td>
          </tr>
         <tr>
            <td valign="top"><label>Product Desc:</label></td>
            <td><textarea class="ckeditor input_field" name="product_desc" style="width:500px;height:150px" ><?php echo $row->product_desc; ?></textarea></td>
          </tr>
          <tr>
            <td></td>
            <td>
            <br /><label>Product Image:</label>
            <br /><br />
            <input type="hidden" name="old_image" value="<?php echo $row->product_image; ?>" />
            <input type="hidden" name="old_image_thumb" value="<?php echo $row->product_thumb_image; ?>" />
            <img src="../pr_thumb_small/<?php echo $row->product_thumb_image; ?>" width="100px" style="padding:3px; border:solid 1px #ccc;" />
            <br /><br /><br />
            <label>Browse Product Image:</label>
            <br /><br />
            <input type="file" name="file" id="file" class="input_field" style="width:385px" multiple/>
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input type="submit" class="my_input_button icon_save" name="sub" value="Submit" style="width:180px"/></td>
          </tr>
        </table>
        </form>
    </div>
</div>
<div class="clear">
</div>

<script type="text/javascript">
function subCat(){
	var cat_id=document.getElementById("cat_id").value; var xmlhttp;    
	if (window.XMLHttpRequest){xmlhttp=new XMLHttpRequest();}
	else{xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
	xmlhttp.onreadystatechange=function()
	{
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("GET","Views/product_subcat_load_ajax.php?c_id="+cat_id,true);
	xmlhttp.send();
}
</script>
