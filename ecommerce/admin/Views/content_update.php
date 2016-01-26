<?php require_once 'process/content_update_process.php';?>

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
        Content Setup</h2>
    </div>
    <div class="topic_details">
        <div class="result">
            <?php if( isset($_GET['status']) )
            {
                $status = $_GET['status'];
                if($status == 1)
				{
                    echo "<img src='Resources/ico/tick.png'><p>Page Updated successfully</p>";
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
        <input type="hidden" name="id" value="<?php echo $pageid; ?>">
        <input type="hidden" name="id" value="<?php echo $pagname; ?>">
        <table width="100%" border="0" cellpadding="0" cellspacing="5">
        <tr>
            <td width="15%"></td>
            <td width="85%"></td>
          </tr>
         <tr>
            <td valign="top"><label>Page Contet:</label></td>
            <td>
            <textarea name="page_content" class="input_field ckeditor"  style="width:485px">
			<?php echo $row->page_content; ?></textarea></td>
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

