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
        Dashboard</h2>
        
    </div>
    <div class="topic_details">
    <h4>Welcome to cPanel!</h4>
      <h3><strong>Logged in as:</strong><span style="color:#C30; font-size:20px; font-weight:900"> <?php echo $user_name; ?></span></h3> 
    	<h3>Status: <span style="color:#C30; font-size:20px; font-weight:900">
        <?php 
		if($_SESSION["status"] == 1)
			{
				echo 'active';
			}
		else
			{
				echo 'inactive';
			}	 
		?></span>
		</h3>
        <hr />
	<p>We've assembled some links to get you started:</p>
	<p>Get Started</p>
    <h4>Actions!</h4>
	<ul class="home_action">
    	<li><img src="../Resources/ico/edit.png" /><a href="index.php?route=content&option=list"> Update Pages</a></li>
        <li><img src="../Resources/ico/edit.png" /><a href="index.php?route=slider&option=list"> Change Slider</a></li>
    </ul>
    </div>
</div>
<div class="clear">
</div>







    





