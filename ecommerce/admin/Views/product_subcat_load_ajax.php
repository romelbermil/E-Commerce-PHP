<?php  
$id = $_GET["c_id"];
require_once '../Model/dbclass.php';
$dbObj = new Model_DBClass();
$getCat = "SELECT * FROM sub_category_master WHERE status = 1 AND parent_category_id=$id ORDER BY sub_category_name";
$resultCat = $dbObj->doQuery($getCat);

$num = $dbObj->numRows($resultCat);
if($num>0)
{
?>
	<select name="sub_cat_id" id="sub_cat_id" class="input_field" style="width:365px">
		<option value="0">Select Sub-Category</option>
		<?php while($rowCat = $dbObj->fetchObject($resultCat))
		{ ?>
			<option value="<?php echo $rowCat->sub_category_id ?>"><?php echo ucfirst($rowCat->sub_category_name); ?></option>
		<?php 
		} ?>
	</select>

<?php 
} 
?>
            