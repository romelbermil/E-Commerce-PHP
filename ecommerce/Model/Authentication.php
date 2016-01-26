<?php
    require_once 'dbclass.php';
    /*
     * For Login 
     */
    class Model_Authentication extends Model_DBClass {
    	public function loginCustomer($data){    		
    		$query="SELECT mem_id,mem_name,mem_login_id,mem_password,mem_status 
    				FROM `member`
                    WHERE mem_login_id = '{$data[user_name]}'
                        AND mem_password = '{$data[user_password]}'
                        AND mem_status != '0'";
            $result = mysql_query($query);
            return $result;
        }
    }
        