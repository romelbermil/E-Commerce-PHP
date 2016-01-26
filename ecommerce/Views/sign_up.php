<?php include 'validation_member.php'; ?>
<?php
	if(isset($_POST['sub'])){
		$data["f_name"] = $_POST["f_name"];
        $data["l_name"] = $_POST["l_name"];
		$data["email"] = $_POST["email"];
		$data["pass1"] = $_POST["pass1"];
		$data["pass2"] = $_POST["pass2"];
		$data["sex"] = $_POST["sex"];
		
		$data["phone"] = $_POST["phone"];
		
		$data["city"] = $_POST["city"];
		$data["state"] = $_POST["state"];
		$data["zip"] = $_POST["zip"];
		
		$date = date("Y-m-d H:i:s");
		
		if(isset($_POST['email'])){
			$checkQuery = "SELECT member_id FROM member_master WHERE email='$data[email]' LIMIT 1";
			$result = $dbObj->doQuery($checkQuery);
			$row = $dbObj->numRows($result);
			if($row>0){
				echo ("<script>window.alert('Your email id already exist!');</script>");
			}
			else{
				if($data["pass1"] != $data["pass2"]){
					echo ("<script>window.alert('Retype Password Dose Not Match!');</script>");
				}
				else{	
					$query = "INSERT INTO member_master 
							  SET first_name = '$data[f_name]', 
							  last_name = '$data[l_name]',
							  gender = '$data[sex]',
							  email = '$data[email]',
							  password = '$data[pass1]',
							  contact_no = '$data[phone]',
							  city = '$data[city]',
							  state = '$data[state]',
							  zip_code = '$data[zip]',
							  join_date = '$date'";
						 
					$result = $dbObj->doQuery($query);
						if($result){
							echo ("<script>window.location='index.php?route=member&option=signup&status=1';</script>");
						}
						else{
							echo ("<script>window.location='index.php?route=member&option=signup&status=0';</script>");
						
						}
				}
			}
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
     <h2>Create New Account.</h2>
    </div>
    <div class="topic_details">
   
	        <div class="result">
            <?php if( isset($_GET['status']) )
            {
                $status = $_GET['status'];
                if($status == 1)
				{
                    echo "<img src='Resources/ico/tick.png'><p>Membership  successfull</p>";
                    sleep(2);
                }
                else if($status == 0)
				{
                    echo "<img src='Resources/ico/cross.png'><p>Error on data Saving!</p>";
                    sleep(2);
                }
            }?>
        </div>
        <form action="" method="post" id="signup_form" novalidate="novalidate">
            <table width="100%" border="0" cellspacing="3" cellpadding="0">
                <tr>
                    <td width="19%"></td>
                    <td></td>
                </tr>
                <tr>
                    <td><label>First Name:</label></td>
                    <td><input type="text" name="f_name" class="input_field" style="width:250px"/></td>
                </tr>
                <tr>
                    <td><label>Last Name:</label></td>
                    <td><input type="text" name="l_name" class="input_field" style="width:250px"/></td>
                </tr>
                <tr>
                    <td><label>Gender</label></td>
                    <td>
                    <input class="input_field_radio" type="radio" name="sex" value="m" checked /><span>Male</span>
           			<input class="input_field_radio" type="radio" name="sex" value="f"/><span>Female</span>
                 </td>
                </tr>
                <tr>
                    <td><label>Date of birth:</label></td>
                    <td>
                    <select name='month' value='' class="input_field" style="width:100px">Select Month</option>
                    <option value='01'>January</option>
                    <option value='02'>February</option>
                    <option value='03'>March</option>
                    <option value='04'>April</option>
                    <option value='05'>May</option>
                    <option value='06'>June</option>
                    <option value='07'>July</option>
                    <option value='08'>August</option>
                    <option value='09'>September</option>
                    <option value='10'>October</option>
                    <option value='11'>November</option>
                    <option value='12'>December</option>
                    </select>
                    
                    <select name='date' class="input_field" style="width:100px">
                    <?php 
                    for ($d=1; $d<32; $d++)
                    {
                      echo "<option value='$d'>$d</option>";
                    }
                    ?>
                    </select>
            
                    <select name="year"  class="input_field" style="width:100px">
                    <?php
                    if($year == 'year') {
                        echo '<option value="2014" selected="selected">2014</option>';
                    } else {
                        echo '<option value="2014">2014</option>';
                    }
                    for($year = intval(date('Y')); $year > 1800; $year --) {
                        if($year == $birthdayYear) {
                            echo '<option value="'.$year.'" selected="selected">'.$year.'</option>';
                        } else {
                            echo '<option value="'.$year.'">'.$year.'</option>';
                        }
                    }
                    ?>
                    </select>
                  </td>
                 </tr>
                 <tr>
                    <td><label>Email (Login ID):</label></td>
                    <td><input type="text" name="email" placeholder="eg: email@example.com" class="input_field" style="width:250px"/></td>
                </tr>
                <tr>
                    <td><label>New Password</label></td>
                    <td><input type="password" name="pass1" class="input_field" style="width:250px"/></td>
                </tr>
                <tr>
                    <td><label>Retype Password:</label> </td>
                    <td><input type="password" name="pass2" class="input_field" style="width:250px;"/></td>
                  </tr>
                <tr>
                    <td><label>Phone/Mobile:</label></td>
                    <td><input type="text" name="phone" class="input_field" style="width:150px"/></td>
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
              	</tr>
               
                <tr>
                    <td>&nbsp;</td>
                    <td><br />
                	<input type="submit" class="my_input_button icon_save" name="sub" value="Submit" style="width:180px"/>
                  </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><a href="index.php?route=member&option=signin"><h3>Already have an account? Sign In</h3></a></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <td colspan="2"><p>By clicking Sign Up, you agree to our Terms and that you have read our Data Use Policy, including our Cookie Use.</p></td>
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







    





