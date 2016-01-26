<?php
if(isset($_POST['sub']))
	{
		$name = $_POST["name"];
		$email = $_POST["email"];
		$contact = $_POST["phone"];
		$address = $_POST["address"];
		$message = $_POST["message"];
		$city = $_POST["city"];
		$zip = $_POST["zip"];
		$state = $_POST["state"];
		$country = $_POST["country"];
		$date = date("Y-m-d H:i:s");

		$query = "INSERT INTO tbl_contact 
					SET name ='$name',
						email ='$email',
						contact = '$contact',
						address ='$address',
						message = '$message',
						city = '$city',
						zip = '$zip',
						state = '$state',
						date = '$date'";
						 
		$result = $dbObj->doQuery($query);
			if($result)
			{
	echo ("<script>window.location='index.php?route=contact&option=view&status=1';</script>");
			}
			else
			{
	echo ("<script>window.location='index.php?route=contact&option=view&status=0';</script>");
			
			}
	}
	 ?>

<div class="clear"></div>
    <div class="search_panel">
         
     </div>
<div class="clear"></div>
<div class="content_box_aside">
    <?php require_once 'Sidebar.php'; ?>  
</div>
<div class="content_box_main">
	<div class="topic_title">
     <h2>
        Get in Touch</h2>
    </div>
    <div class="topic_details">
    
    <p>
	<?php
       $row = $dbObj->fetchObject($dbObj->doQuery("SELECT page_name,page_content,date FROM page_master Where page_id = '2' and status = '1'"));
       echo $row->page_content;
    ?>  
    </p>
    <div class="clear"></div>
    
    <p>For any kind of information please feel free to contact us. We are always looking forward to hearing from you</p>

    <br />
	<h2>Fill out the form</h2>
        
        <form action="" method="post" id="Signup_form" novalidate="novalidate">
        <b style="font-weight:bold; font-size:18px; position:relative;padding-left:22px">
            <?php if( isset($_GET['status']) )
            {
				$status = $_GET['status'];
				 if($status == 1){
					echo "<img style='color:green;border:none;position:absolute;left:0px' src='Resources/ico/tick.png'>Query sent successfully";
					sleep(2);
				 }
				 else if($status == 0){
					echo "<img style='color:red;border:none;position:absolute;left:0px' src='Resources/ico/cross.png'>Unable to send";
					sleep(2);
				 }
            }?>
        </b>
            <table width="100%" border="0" cellspacing="3" cellpadding="0">
                <tr>
                    <td width="19%"></td>
                    <td></td>
                </tr>
                <tr>
                    <td><label>Full Name:</label></td>
                    <td><input type="text" name="name" class="input_field" style="width:250px"/></td>
                </tr>
                <tr>
                    <td><label>Phone/Mobile:</label></td>
                    <td><input type="text" name="phone" class="input_field" style="width:150px"/></td>
                </tr>
                <tr>
                    <td><label>Email:</label></td>
                    <td><input type="text" name="email" class="input_field" style="width:250px"/></td>
                </tr>
                <tr>
                    <td><label>City:</label></td>
                    <td><input type="text" name="city" class="input_field" style="width:150px"/></td>
                </tr>
                <tr>
                    <td><label>State:</label></label></td>
                    <td><input type="text" name="state" class="input_field" style="width:150px"/></td>
                </tr>
                <tr>
                    <td><label>Zip:</label></td>
                    <td><input type="text" name="zip" class="input_field" style="width:150px"/></td>
                </tr>
                <!--<tr>
                    <td>Country:</td>
                    <td><input type="text" name="country" class="input_field" style="width:150px"/></td>
                </tr>-->
                <tr>
                	<td><label>Message:</label></td>
                	<td><textarea type="text" class="input_field" name="message" style="width:250px ; height:100px;" ></textarea>
                </td>
              	</tr>
                <tr>
                    <td><label>How did you hear about us?</label></td>
                    <td><input class="radio" type="radio" name="search_found" checked /> <span>Google Search</span>
                        <br />
                        <input class="radio" type="radio" name="search_found" /> <span>My Friends</span>
                        <br />
                        <input class="radio" type="radio" name="search_found" /> <span>Facebook</span>
                        <br />
                        <input class="radio" type="radio" name="search_found" /> <span>Twitter</span>
                        <br />
                        <input class="radio" type="radio" name="search_found" /> <span>Email</span>
                        <br />
                        <input class="radio" type="radio" name="search_found" /> <span>Web banner</span>
                        <br />
                        <input class="radio" type="radio" name="search_found" /> <span>Newspaper</span>
                        <br />
                        <input class="radio" type="radio" name="search_found" /> <span>Word of mouth (from who? His/her email)</span>
                        <br />
                        <input class="radio" type="radio" name="search_found" /> <span>Magazine, </span>
                        <br />
                        <input class="radio" type="radio" name="search_found" /> <span>Brochure</span>
                        <br />
                        <input class="radio" type="radio" name="search_found" /> <span>Billboard</span>
                        <br />
                        <input class="radio" type="radio" name="search_found"  /> <span>Others</span></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                <input type="submit" class="my_input_button icon_save" name="sub" value="Submit" style="width:180px"/></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>
            </form>

    
    </div>
</div>
<div class="clear">
</div>







    





