<?php require_once 'process/product_setup_process.php';?>

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
        Add New Inventory Item.</h2>
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
				else if($status == 3)
				{
                    echo "<img src='Resources/ico/cross.png'><p>Sorry Product name already Exist!</p>";
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
        <table width="100%" border="0" cellpadding="0" cellspacing="5">
        <tr>
            <td width="15%"><label>Product Title:</label></td>
            <td width="85%"><input type="text" name="product_title" id="title" class="input_field"  style="width:350px" /></td>
          </tr>
          
          <tr>
            <td><label>Parent Category:</label></td>
            <td>      
			<?php
            $getCat = "SELECT * FROM category_master WHERE status = 1 ORDER BY category_name";
            $resultCat = $dbObj->doQuery($getCat);
            ?>
            <select name="cat_id" id="cat_id" class="input_field" style="width:365px" onchange="subCat()" >
                <option value="0">Select Category</option>
                <?php while($rowCat = $dbObj->fetchObject($resultCat)){ ?>
                <option value="<?php echo $rowCat->category_id ?>"><?php echo ucfirst($rowCat->category_name); ?></option>
                <?php } ?>
            </select>
            </td>
          </tr>
          <tr>
            <td></td>
            <td>
               <div id="txtHint"></div>
            </td>
          </tr>
          <tr>
            <td><label>Product Color:</label></td>
            <td><input type="text" name="product_color" id="title" class="input_field"  style="width:285px" /></td>
          </tr>
          <tr>
            <td><label>Product Fabric:</label></td>
            <td><input type="text" name="product_fabric" id="title" class="input_field"  style="width:285px; " /></td>
          </tr>
          <tr>
            <td><label>Product Size:</label></td>
            <td><input type="text" name="product_size" id="title" class="input_field"  style="width:285px" /></td>
          </tr>
          <tr>
            <td><label>Product Price:</label></td>
            <td><input type="text" name="product_price" id="title" class="input_field"  style="width:285px" /></td>
          </tr>
         <tr>
            <td valign="top"><label>Product Desc:</label></td>
            <td><textarea class="ckeditor input_field" name="product_desc" style="width:400px;height:150px" ></textarea>
           </td>
          </tr>
          <tr>
            <td valign="top"><label>Special Tag:</label></td>
            <td><textarea name="product_tag" class="input_field ckeditor"  style="width:485px"></textarea>
           </td>
          </tr>
          <tr>
            <td><label>Browse Product Image:</label></td>
            <td><input type="file" name="file" id="file" class="input_field" style="width:350px" multiple/>
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
