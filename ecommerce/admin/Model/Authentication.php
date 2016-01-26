<?php
    require_once 'dbclass.php';
    /*
     * For Admin Login 
     */
    class Model_Authentication extends Model_DBClass {
    	public function loginUser($data){    		
    		$query="SELECT * 
    				FROM `user_master`
                    WHERE user_name = '{$data[user_name]}' AND user_password = '{$data[user_password]}' AND status != '0'";
            $result = mysql_query($query);
            return $result;
        }
    }
        