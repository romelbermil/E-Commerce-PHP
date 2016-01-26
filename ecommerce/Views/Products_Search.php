<form id="myform" action="index.php?route=product&option=search" method="post" class="form-wrapper cf">
<?php
$getCat = "SELECT * FROM category_master WHERE status = 1 ORDER BY category_name";
$resultCat = $dbObj->doQuery($getCat);
?>
<select name="cat_id" id="cat_id" class="search_input_field" style="height:40px" onchange="subCat()" >
<option value="0">All Categories</option>
	<?php while($rowCat = $dbObj->fetchObject($resultCat))
    { ?>
        <option value="<?php echo $rowCat->category_id ?>"><?php echo ucfirst($rowCat->category_name); ?></option>
    <?php 
    } ?>
</select>
<input type="text" name="search" value="Search here..." onBlur="if (this.value == ''){this.value = 'Search here...'; }" onFocus="if (this.value == 'Search here...'){this.value = '';}" class="search_input_field" required/>

<button type="submit" class="search_button">Search</button>
</form>	
