<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); // This Prevents browsers from directly accessing this PHP file.

class LDAP_auth{
  
		public function auth($username, $password)
           {
		        $CI =& get_instance();
                $CI->config->load('ldap_auth_config');

				$host = $CI->config->item('host'); 
				$port = $CI->config->item('port'); 
				$basedn = $CI->config->item('basedn'); 
				$usersdn = $CI->config->item('usersdn'); 
                $ds=ldap_connect($host, $port);
				$filter = "(uid=".$username.")";
				$sr = @ldap_search($ds, $basedn,$filter);
				$info = null;
				if ($sr){
					$infotemp = @ldap_get_entries($ds, $sr);
					if(isset($infotemp[0])){
						if(isset($infotemp[0]['dn'])){
							$bind = @ldap_bind($ds,$infotemp[0]['dn'], $password);
							if ($bind){
								$info = $infotemp;
							}
						}
					}
				}
				
			return $info;

	    }
		  // search ldap for given user
		  // if found return entries (as array), else return null
	    public function info($username) {
                $CI =& get_instance();
                $CI->config->load('ldap_auth_config');

	       	$host = $CI->config->item('host'); 
			$port = $CI->config->item('port'); 
			$basedn = $CI->config->item('basedn'); 
			$usersdn = $CI->config->item('usersdn'); 
            $ds=ldap_connect($host, $port);
            $filter = "(uid=".$username.")";
			$sr = @ldap_search($ds, $basedn,$filter);
			$info = null;
			if ($sr){
			  $info = @ldap_get_entries($ds, $sr);
			}
			return $info;
		}//END info
   }//END ldap_auth.php