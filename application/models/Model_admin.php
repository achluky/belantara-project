<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_admin extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function auth($username, $password, $salt)
    {
        $password   = sha1($salt.$password);
        $sql        = "SELECT sf_guard_user.id, username, last_login, sf_guard_group.name AS group_name  FROM sf_guard_user LEFT JOIN sf_guard_group ON sf_guard_user.is_super_admin= sf_guard_group.id  WHERE username = '{$username}' and password = '{$password}'";
        $result     = $this->db->query($sql);
        return $result;
    }

    public function auth_ldap($username, $salt)
    {
        $sql        = "SELECT sf_guard_user.id, username, last_login, sf_guard_group.name AS group_name  FROM sf_guard_user LEFT JOIN sf_guard_group ON sf_guard_user.is_super_admin= sf_guard_group.id WHERE username = '{$username}' and salt = '{$salt}'";
        $result     = $this->db->query($sql);
        return $result;
    }

    public function get_salt($username)
    {
        $sql        = "SELECT salt FROM sf_guard_user WHERE username = '{$username}'";
        $result     = $this->db->query($sql);
        if ($result->num_rows() > 0)
        {
           $row = $result->row();

           return $row->salt;
        }
		return null;
    }

    public function set_last_login($username)
    {
        $sql        = "UPDATE sf_guard_user set last_login = '".date("Y-m-d H:i:s")."' WHERE username = '{$username}'";
        $this->db->query($sql);
    }

    public function save_user_from_ldap($result_ldap, $user, $password)
    {
        // salt adalah uniqid from ldap
		$salt 		= $result_ldap['uid'][0];
        $password   = sha1($salt.$password);
		$idgroup 	= null;
		
		$sql        = "SELECT id FROM sf_guard_group WHERE name = 'WCU'";
        $result     = $this->db->query($sql);
        if ($result->num_rows() > 0)
        {
           $row = $result->row();
           $idgroup = $row->id;
        }
		
		if($idgroup!=null){
		
			$sql = "insert into sf_guard_user 
					values ('',
							'".$user."',
							'sha1',
							'".$salt."',
							'".$password."',
							'1',
							'".$idgroup."',
							'".date("Y-m-d H:i:s")."',
							'".date("Y-m-d H:i:s")."',
							'".date("Y-m-d H:i:s")."' 
							)";
			$this->db->query($sql);
		}
    }

}
