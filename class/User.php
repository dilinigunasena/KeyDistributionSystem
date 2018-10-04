<?php

class User
{
    public $id;
    protected $username;
    protected $role;

    public function getRole()
    {
        return $this->role;
    }
    // protected $password;
    private $db;

    function __construct()
    {
        $this->db = DbCon::minimumPriv();
    }


    function login($uname, $password)
    {
        $pass_hash = hash('sha256', $password);
        $query = "SELECT count(*) FROM accounts WHERE u_name=? and u_pass=?";
        $result = $this->db->getFirstRow($query, [$uname, $pass_hash]);
        if ($result === false) {
            throw new Exception("Login Failed.");
        }
        if ($result[0] != 1)
            return false;
        $this->username = $uname;
        return true;
    }

    function initializeUser()
    {
        $result = $this->db->getFirstRow("select u_id, u_role from accounts where u_name = ?", [$this->username]);
        $this->id = $result['u_id'];
        $this->username = $result['u_name'];
        $this->role = $result['u_role'];
//        $this->password = $result['u_pass'];
    }


    function registration($user, $password, $role_int)
    {
        switch ($role_int) {
            case UserRole::MachineUser:
            case UserRole::Administrator:
            case UserRole::SysAdmin:
                $role = True;
                break;
            default:
                $role = False;
                break;
        }
        if (!$role)
            throw new Exception("Invalid role");

        $pass_hash = hash('sha256', $password);
        $sql = 'INSERT INTO accounts (u_name, u_role, u_pass) VALUES (?, ?, ?)';
        $params = [$user, $role_int, $pass_hash];

        $success = $this->db->runParamQuery($sql, $params);
        if (!$success)
            throw new Exception("Registration Unsuccessful");

        $user_id = $this->db->lastInsertID();
        return $user_id;
    }


}

?>