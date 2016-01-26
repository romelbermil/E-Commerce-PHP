<?php
	error_reporting(0);
	session_start();
	$route = $_GET["route"];
	$option = $_GET["option"];
    require_once 'Model/dbclass.php';
	require_once 'Model/functions.php';
    $dbObj = new Model_DBClass();
?>
<!DOCTYPE html>
<html lang="en"><head>
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
    
    <!-- Insert to your webpage before the </head> -->
    <script src="sliderengine/jquery.js"></script>
    <script src="sliderengine/amazingslider.js"></script>
    <script src="sliderengine/initslider-1.js"></script>
    <!-- End of head section HTML codes -->
    <div id="fb-root"></div>
	<script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    
    <!-- cursoral -->
    <link rel="stylesheet" type="text/css" href="cursor_slider/cursor_style.css" />
	<!--<script src="cursor_slider/js/jquery-1.3.2.min.js" type="text/javascript"></script>-->
	<script src="cursor_slider/js/jquery.simple_slider.js" type="text/javascript"></script>
    
    <!-- cursoral -->
    <link href="cloudzoom/css/main.css" rel="stylesheet" type="text/css" />
    <link href="cloudzoom/css/cloud-zoom.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="cloudzoom/js/cloud-zoom.1.0.2.js"></script>

</head>
<body id="page">
    <!------------------------------container Section------------------------------->
    <div id="container">
    <!------------------------------navigation Section------------------------------->
        <div id="user_panel">
            <div class="user_panel_box">
                <div class="terms_view_top">
                	<img src="Resources/ico/shipping.png">
                    <a href="index.php?route=shipping&option=view">Shipping</span></a>
                </div>
               
                <div class="cart_view_top">
                    <img src="Resources/ico/cart_home.png" />
                    	<a href="index.php?route=cart&option=view">Checkout: 
						<?php require_once 'Views/cart_script.php'; 
						echo '<span>'.$quantityTotal . '</span> Item\'s - <span>' . country_currency($cartTotal).'</span>';?></a>
                  </div>
                <div class="site_login">
                    <ul>
                       <?php if(!empty($_SESSION["customer_id"]))
                       { ?>
                        Hi! <a href="#">
                        <?php echo $_SESSION["customer_name"]; ?></a> 
                        <a href="index.php?route=member&option=logout">[Log Out]</a>&nbsp;
                        <?php }
                        else
                        { ?>
                        <li><a href="index.php?route=member&option=signup">New User? Sign Up</a></li> 
                        <li>|</li>
                        <li><a href="index.php?route=member&option=signin">Sign In </a></li>
                       <?php 
                        } ?>
                    
                     </ul>
                  </div>
            </div>
        </div>
    <!------------------------------navigation Section------------------------------->
	<!------------------------------navigation Section------------------------------->
        <div id="navigation">
            <div class="navigation_box">
                <div id="smoothmenu1" class="ddsmoothmenu">
                    <ul>
                        <li><a href="index.php?route=home&option=current" title="Home Page">
                        	<img src="menu/link.gif"/></a></li>
                        <!--<li><a href="#" title="">WHO WE ARE</a>
                            <ul>
                            	<li><a href="index.php?route=team&option=view" title="">Our Team</a></li>
                                <li><a href="index.php?route=partnerships&option=view" title="">Partnerships </a></li>
                                <li><a href="index.php?route=FAQ&option=view" title="">FAQ </a></li>
                            </ul>
                        </li> -->  
                        <li><a href="index.php?route=company&option=view" title="">Company</a></li> 
                        <li><a href="index.php?route=product&option=view" title="">product Archive</a></li>
                        <li><a href="index.php?route=outlets&option=view" title="">Outlets</a></li> 
                        <li><a href="index.php?route=privacypolicy&option=view" title="">Privacy Policy</a></li>
                        <li><a href="index.php?route=termsuse&option=view" title="">Terms of use</a></li>  
                        <li><a class="last" href="index.php?route=contact&option=view" title="">Contact Us</a></li> 

                    </ul>
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
                        <li><a href="https://www.facebook.com/shashangka-963800680348581/" target="_blank">
                        <span><img src="Resources/images/facebook.png" /></span></a></li>
                        <li><a href="https://twitter.com/eCommerce" target="_blank" >
                        <span><img src="Resources/images/twitter.png" /></span></a></li>
                        <li><a href="http://www.youtube.com/eCommerce" target="_blank">
                        <span><img src="Resources/images/googleplus.png" /></span></a></li>
                        <br><br>
                        <p>sales@eCommerce.com <img src="Resources/ico/mail.png"></p>
                        <p>+88028100785 <img src="Resources/ico/phone.png"></p>
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
            <div class="ad_bar_box">
                <div class="home_sec_ad">
                <?php
				  $query = "SELECT * FROM advertise_master WHERE ad_id = 1 AND ad_position = 'bottom' AND status = 1"; 
				  $result = $dbObj->doQuery($query);
				  $row = $dbObj->fetchObject($result);
				?>
                <div class="colms_2" style="border-right:1px solid #ddd">
                    <a href="<?php echo $row->ad_url; ?>" title=""><img src="advertise/<?php echo $row->ad_file_path; ?>" /></a>
                 </div>
                 <?php
				  $query = "SELECT * FROM advertise_master WHERE ad_id = 2 AND ad_position = 'bottom' AND status = 1"; 
				  $result = $dbObj->doQuery($query);
				  $row = $dbObj->fetchObject($result);
				?>
                <div class="colms_2">
                    <a href="<?php echo $row->ad_url; ?>" title=""><img src="advertise/<?php echo $row->ad_file_path; ?>" /></a>
                 </div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="action_bar_box">
            <section id="special">
                <div class="twitter"><a href="" title"">Follow eCommerce on Twitter</a></div>
                <div class="rss"><a href="" title="">Facebook latest news on eCommerce</a></div>
                <span class="news">NEWSLETTER</span>
                <form>
                <input name="" type="text">
                <input name="" value="OK" type="button">
                </form> 
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
                            <li><a href="index.php?route=company&option=view" title="">Company</a></li>
                            <li><a href="#" title="">Careers</a></li>
                            <li><a href="index.php?route=privacypolicy&option=view" title="">Privacy Policy</a></li>
                            <li><a href="index.php?route=termsuse&option=view" title="">Terms of use</a></li>  
                        </ul>
                </div>
                <div class="colms_4">
                    <ul class="upper_footer_menu">
                     <strong>Help</strong>
  						<li><a href="index.php?route=customerservice&option=view" title="">Customer service</a></li>
                        <li><a href="index.php?route=howorder&option=view" title="">How to order</a></li>
                        <li><a href="#" title="">Billing & payments</a></li>
                        <li><a href="#" title="">Shipping & delivery</a></li>
                        <li><a href="#" title="">Returns & exchanges</a></li>
                        <li><a href="index.php?route=FAQ&option=view" title="">FAQs</a></li>
                    </ul>
                </div> 
                <div class="colms_4">
                	<ul class="upper_footer_menu border_right">
                     <strong>Online Store</strong>
                        <li><a href="3" title="">My account</a></li>
                        <li><a href="#" title="">Order tracking</a></li>
                        

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
