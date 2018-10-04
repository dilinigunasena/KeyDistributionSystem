<?php

class User
{
	public $regID;
	protected $dispName;
	protected $password;
    private $db;

    function __construct()
    {
        $this->db = new DbCon();
    }

	
	function getProfile()   //used in header.php
	{
		return $this->fName.' '.$this->lName;
	}
	
	function setRegID($id)
	{
		$this->regID = $id;
	}
	function getRegID()
	{
		return $this->regID;
	}

	public function setDispName($name)
	{
		$this->dispName = $name;
	}
	public function getDispName()
	{
		return $this->dispName;
	}

	function setPassword($pass)
	{
		$this->password = $pass;
	}
	function getPassword()
	{
		return $this->password;
	}

	function login($disp, $pass)
	{
		$query = sprintf("SELECT * FROM account WHERE display_name='%s' and password= md5('%s') and verified = 1",$disp, $disp, $pass);
		$result= $this->db->getFirstRow($query);
		if($result != 0)
		{
			$this->initializeUser($result);
            return 1;
		}
		else
		{
			return 0;
		}
	}

    function initializeUser($result)
    {
        $this->regID = $result['reg_id'];
        $this->dispName = $result['display_name'];
        $this->password = $result['password'];
        $uDetails = $this->db->getFirstRow("select * from user where reg_id =". $this->regID);
    }



    function registration(array $accDetails,array $userDetails)
    {
        $accDetails['verified'] = 0;
        $getId = $this->db->runInsertAndGetID('account', $accDetails);

        if ($getId) {
        $userDetails['reg_id'] = $getId;
        }

    }



}

?>