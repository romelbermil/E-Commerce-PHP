<?php
    if($route != null)
	{
    	switch ($route)
		{ 
    		case 'home':
    			if($option == 'current'){
    				require_once 'Views/Home.php';
    			}

    		break;

    		case 'company':
    			if($option == 'view'){
    				require_once 'Views/Company.php';
    			}
    			
    		break;

    		case 'outlets':
    			if($option == 'view'){
    				require_once 'Views/Outlets.php';
    			}
    			
    		break;
			
			case 'member':
    			if($option == 'signup'){
    				require_once 'Views/sign_up.php';
    			}
				elseif($option == 'signin'){
    				require_once 'Views/login.php';
    			}
				elseif($option == 'logout'){
    				require_once 'Views/logout.php';
    			}
				
    			
    		break;

    		case 'product':
    			if($option == 'view'){
    				require_once 'Views/Products.php';
    			}
				
				elseif ($option == 'category'){
    				require_once 'Views/Products_Cat _view.php';
    			}

				elseif ($option == 'product_details'){
    				require_once 'Views/Products_View.php';
    			}
				elseif ($option == 'search'){
    				require_once 'Views/Products_Search_Result.php';
    			}
    		break;

			case 'cart':
    			if($option == 'add'){
    				require_once 'Views/cart.php';
    			}
				else if($option == 'view'){
    				require_once 'Views/cart.php';
    			}
				else if($option == 'empty'){
    				require_once 'Views/cart.php';
    			}
				else if($option == 'delete'){
    				require_once 'Views/cart.php';
    			}
				else if($option == 'adjust'){
    				require_once 'Views/cart.php';
    			}
    		break;

    		case 'newArrivals':
    			if($option == 'view'){
    				require_once 'Views/NewProducts.php';
    			}
    			
    		break;
			case 'shipping':
    			if($option == 'view'){
    				require_once 'Views/Shipping.php';
    			}
    			
    		break;

    		case 'contact':
    			if($option == 'view'){
    				require_once 'Views/Contact.php';
    			}
    		break;
			
			case 'customerservice':
    			if($option == 'view'){
    				require_once 'Views/CustomerService.php';
    			}
    		break;
			
			case 'howorder':
    			if($option == 'view'){
    				require_once 'Views/HowOrder.php';
    			}
    		break;
			
			case 'privacypolicy':
    			if($option == 'view'){
    				require_once 'Views/PrivacyPolicy.php';
    			}
    		break;
			case 'termsuse':
    			if($option == 'view'){
    				require_once 'Views/TermsUse.php';
    			}
    		break;
			case 'FAQ':
    			if($option == 'view'){
    				require_once 'Views/FAQ.php';
    			}
    		break;
			

		
    		default:
    		break;
    	}
    }
    else{    	       
    	require_once 'Views/Home.php';
    }
	?>