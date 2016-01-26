<?php
    if($route != null)
	{
    	switch ($route)
		{ 
			/*--------------------------home-------------------------------*/
    		case 'home':
    			if($option == 'current'){
    				require_once 'Views/Home.php';
    			}

    		break;
    		/*--------------------------home-------------------------------*/
			
			
			/*--------------------------category-------------------------------*/
    		case 'category':
    			if($option == 'setup'){
    				require_once 'Views/category_setup.php';
    			}
				else if($option == 'list'){
					require_once 'Views/category_list.php';
				}
    			else if($option == 'delete'){
					$id = $_GET["id"];
					
					$query = "DELETE FROM category_master WHERE category_id=$id";
    				$dbObj->doQuery($query);
					
					$query_subcat = "DELETE FROM sub_category_master WHERE category_id=$id";
    				$dbObj->doQuery($query_subcat);

					$query_prd = "DELETE FROM product_master WHERE category_id=$id";
    				$dbObj->doQuery($query_prd);
					
    				echo ("<script>window.location='index.php?route=category&option=setup';</script>");
				}
    		break;
    		/*--------------------------category-------------------------------*/
			/*--------------------------sub_category-------------------------------*/
    		case 'sub_category':
    			if($option == 'setup'){
    				require_once 'Views/sub_category_setup.php';
    			}
    			else if($option == 'list'){
					require_once 'Views/sub_category_list.php';
				}
				else if($option == 'delete'){
					$catid = $_GET["catid"];
					$subcatid = $_GET["subcatid"];
					
					$query = "DELETE FROM sub_category_master WHERE parent_category_id=$catid AND sub_category_id=$subcatid ";
    				$dbObj->doQuery($query);
					
					/*$id = $_GET["id"];
					$image = $_GET["img"];
					$path = "../images/product/$image";
    				unlink($path);*/
					
					$query_prd = "DELETE FROM product_master WHERE category_id=$catid AND sub_category_id=$subcatid ";
    				$dbObj->doQuery($query_prd);

    				echo ("<script>window.location='index.php?route=sub_category&option=setup';</script>");
				}
    		break;
    		/*--------------------------sub_category-------------------------------*/
			case 'order':
    			if($option == 'view'){
					require_once 'Views/order_details.php';
				}
				else if($option == 'order_all'){
					require_once 'Views/order_list.php';
					}
				else if($option == 'order_pending'){
					require_once 'Views/order_pending.php';
					}
				else if($option == 'order_delivered'){
					require_once 'Views/order_delivered.php';
					}
				else if($option == 'delete'){
					$id = $_GET["order_id"];
					
					$query_orm= "DELETE FROM order_master WHERE order_id=$id ";
    				$dbObj->doQuery($query_orm);
					
					$query_ord = "DELETE FROM order_details WHERE pr_order_id=$id";
    				$dbObj->doQuery($query_ord);
					
					
					echo ("<script>window.location='index.php?route=order&option=order_all';</script>");
				}
    			
    		break;

			/*--------------------------product-------------------------------*/
    		case 'product':
    			if($option == 'setup'){
    				require_once 'Views/product_setup.php';
    			}
				else if($option == 'list'){
					require_once 'Views/product_list.php';
				}
				else if($option == 'update'){
					require_once 'Views/product_update.php';
				}
    			elseif($option=='delete')
				{
					$id = $_GET["id"];
					$catid = $_GET["catid"];
					$subcatid = $_GET["subcatid"];
					
					
					$image = $_GET["img"];
					$path = "../pr_thumb_big/$image";
					unlink($path);
					
					$image_thumb = $_GET["imgthumb"];
					$thumb_path = "../pr_thumb_small/$image_thumb";
					unlink($thumb_path);
					
					
					$query = "DELETE FROM product_master WHERE product_id = $id AND product_category_id=$catid AND product_sub_category_id=$subcatid ";
					$dbObj->doQuery($query);
					echo ("<script>window.location='index.php?route=product&option=list';</script>");
				}

    		break;
    		/*--------------------------product-------------------------------*/
			
			/*--------------------------category-------------------------------*/
    		case 'slider':
    			if($option == 'setup'){
    				require_once 'Views/slider_setup.php';
    			}
				else if($option == 'list'){
					require_once 'Views/slider_list.php';
				}
				else if($option == 'update'){
					require_once 'Views/slider_update.php';
				}
    			
    		break;
    		/*--------------------------category-------------------------------*/
    		case 'content':
    			if($option == 'list'){
					require_once 'Views/content_list.php';
				}
				else if($option == 'update'){
					require_once 'Views/content_update.php';
				}
    			
    		break;
			/*--------------------------category-------------------------------*/
			case 'offer':
    			if($option == 'setup'){
					require_once 'Views/offer_setup.php';
				}
				else if($option == 'update'){
					require_once 'Views/offer_setup.php';
				}
				elseif($option=='delete')
				{
					$id = $_GET["id"];
					
					$image = $_GET["img"];
					$path = "../advertise/$image";
					unlink($path);
					$query = "DELETE FROM advertise_master WHERE ad_id = $id";
					$dbObj->doQuery($query);
					echo ("<script>window.location='index.php?route=offer&option=setup';</script>");
				}
    		break;
			/*--------------------------category-------------------------------*/
    		case 'user':
    			if($option == 'list'){
					require_once 'Views/user_list.php';
				}
				else if($option == 'add'){
					require_once 'Views/user_add.php';
				}
    			
    		break;
			/*--------------------------category-------------------------------*/
    		case 'myprofile':
    			if($option == 'view'){
					require_once 'Views/myprofile_view.php';
				}
				else if($option == 'update'){
					require_once 'Views/myprofile_update.php';
				}
				else if($option == 'setting'){
					require_once 'Views/change_password.php';
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