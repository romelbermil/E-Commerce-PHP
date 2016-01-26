<?php
	error_reporting(0);
	session_start();
	$route = $_GET["route"];
	$option = $_GET["option"];
    require_once 'Model/dbclass.php';
	require_once 'Model/functions.php';
    $dbObj = new Model_DBClass();
	
	if(!isset($_SESSION["user_name"]))
	{
	header("Location: login.php");
	}
	else
	{
		$user_name = $_SESSION["user_name"];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="Description" content="Fashion design house, manufacturer and retailer of fashion wear, fashion accessories, home textiles, handicraft, and hand loom based products of Bangladesh" />
    <meta name="robots" content="default, follow" />
    <meta name="author" content="Administrator" />
    <meta name="googlebot" content="noodp" />
    <meta name="application-name" content=">eCommerce" />
    <title>E-Commerce || Clothes store,Boutique</title>
    <link rel="Shortcut Icon" href="http://shashangka.com/Resources/ico/fvicon.png" />
    <!--======================menu link start========================-->
    <link href="Style/global_style.css" rel="stylesheet" type="text/css" />
    <link href="Style/layout_style.css" rel="stylesheet" type="text/css" />
    <link href="Style/font.css" rel="stylesheet" type="text/css" />
    <link href="Style/default_style.css" rel="stylesheet" type="text/css" />
    <!--======================menu link start========================-->
    <link rel="stylesheet" type="text/css" href="menu/ddsmoothmenu.css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <script type="text/javascript" src="menu/ddsmoothmenu.js"></script>
    <script type="text/javascript">
        ddsmoothmenu.init({ mainmenuid: "smoothmenu1", orientation: 'h', classname: 'ddsmoothmenu', contentsource: "markup" })
    </script>
    <!--=====================menu link End==========================-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script type="text/javascript" src="v_menu/ddaccordion.js"></script>
    <script type="text/javascript" src="v_menu/ddmenu.js"></script>
    <link href="v_menu/ddmenu_style.css" rel="stylesheet" type="text/css" />
    
    <!-- editor -->
    <!--<link href="ckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
    <script src="ckeditor/_samples/sample.js"></script>
    <script src="ckeditor/ckeditor.js"></script>-->
    <!-- editor -->
    <!-- editor -->
    <!--<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
	<script type="text/javascript">
	bkLib.onDomLoaded(nicEditors.allTextAreas);
	bkLib.onDomLoaded(function() {
          var myNicEditor = new nicEditor();
          myNicEditor.setPanel('myNicPanel');
          myNicEditor.addInstance('myInstance1');
     });
    </script>-->
	<script type="text/javascript" src="tinymce/tinymce.min.js"></script>
	<script type="text/javascript">
    tinymce.init({
        selector: "textarea",

    });
	
    </script>
    
			
    <!-- editor -->
</head>
<body id="page">
    <!------------------------------container Section------------------------------->
    <div id="container">
	<!------------------------------navigation Section------------------------------->
        <div id="navigation">
            <div class="navigation_box">
                <div id="smoothmenu1" class="ddsmoothmenu">
                    <ul>
                        <li><a href="index.php?route=home&option=current" class="last" title="Home Page">
                        	<img src="menu/link.gif"/></a></li>
                    </ul>
                </div>
                <div class="top_text"> 
                	<p>Hello! <span style="color:#C30;font-weight:900"><?php echo $user_name; ?></span> | <a href="logout.php" title="">Logout</a></p>
                 </div>
            </div>
        </div>
        <!------------------------------navigation Section------------------------------->
        <!------------------------------Header Section------------------------------->
        <div id="header">
            <div class="header_box">
                <div class="logo">
                    <a href="index.php?route=home&option=current" title="Home">
                        <!--<h2>scmesbd</h2>-->
                            <img src="Resources/images/logo.png" />
                    </a>
                </div>
                <div class="top_text"> 
                	<h2></h2>
                    </div>
                <div class="social_link">
                    <ul>
                        <li><a href="https://www.facebook.com/pages/eCommerce/400913069920049" target="_blank">
                        <span><img src="Resources/images/facebook.png" /></span></a></li>
                        <li><a href="https://twitter.com/eCommerce" target="_blank" >
                        <span><img src="Resources/images/twitter.png" /></span></a></li>
                        <li><a href="http://www.youtube.com/eCommerce" target="_blank">
                        <span><img src="Resources/images/googleplus.png" /></span></a></li>
                        <br><br>
                        <p>sales@eCommerce.com <img src="Resources/ico/mail.png"></p>
                        <p>+88028180780 <img src="Resources/ico/phone.png"></p>
                   </ul>
                </div>
            </div>
        </div>
        <!------------------------------Header Section------------------------------->
        
        <!------------------------------content Section------------------------------->
        <div id="content">
            <div class="content_box">
            <?php require_once 'Controller/indexController.php'; ?>
            </div>
        </div>
        <div class="clear">
        </div>
        <!-------------------------------content Section--------------------------------->
        <div id="action_bar">
            <div class="action_bar_box">
            <section id="special">
                <div class="twitter"><a href="" title"">Follow eCommerce on Twitter</a></div>
                <div class="rss"><a href="" title="">Facebook latest news on eCommerce</a></div>
                
            </section>
            </div>
        </div>
        <!------------------------------upper footer Section----------------------------------->
        <div id="upper_footer">
            <div class="upper_footer_box">
                <div class="colms_4">
                        <ul class="upper_footer_menu border_right">
                            <strong>Contact</strong>
                                 <br>
                                 <p>2/1 block a lalmatia , 1207 Dhaka, Bangladesh</p>
                                 <br>
                                 <p><img src="Resources/ico/mail.png"> sales@eCommerce.com</p>
                                 <p><img src="Resources/ico/phone.png"> +88028180780</p>
                            </ul>
                    </div>
                <div class="colms_4">
                        <ul class="upper_footer_menu border_right">
                         <strong>Guide</strong>
                             <li><a href="index.php?route=product&option=setup">New Product</a></li>
        					 <li><a href="index.php?route=product&option=list">Product List</a></li>
                        </ul>
                </div>
                <div class="colms_4">
                    <ul class="upper_footer_menu">
                     <strong>Help</strong>
                     	<li><a href="index.php?route=category&option=setup">Category List</a></li>
  						<li><a class="menuitem last" href="#">Help & Support!</a></li>
                    </ul>
                </div> 
                <div class="colms_4">
                	<ul class="upper_footer_menu border_right">
                     <strong>Account Setting</strong>
                        <li><a href="index.php?route=user&option=list">All Users</a></li>
                        <li><a href="index.php?route=user&option=add">Add Users</a></li>
                        <li><a href="index.php?route=myprofile&option=view">My Profile</a></li>
                	</ul>
                </div>
                
            </div>
        </div>
        <!------------------------------upper footer Section------------------------------->
        <!------------------------------footer Section----------------------------------->
        <div id="footer">
            <div class="footer_box">
                <div class="copyright">
                    <div class="colms_2">
                        <p>Copyright &copy;  <?php echo date("Y"); ?> E-Commerce</p>
                    </div>
                    <div class="colms_2">
                    <span style="text-align:right;float:right"> powered by 
                 				<a href="http://shashangka.com/" target="_blank">E-Commerce</a></span>
                    </div>
                </div>
            </div>
        </div>
        <!------------------------------footer Section------------------------------->
       
    </div>
    <!------------------------------container Section------------------------------->
</body>
</html>
