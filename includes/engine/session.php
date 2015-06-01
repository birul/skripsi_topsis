<?php

class session_user extends query
{
	var $data = FALSE;
	protected $extendedUser = array();
	function __construct()
	{
		$this->protect();
	}
	
	static function using()
	{
		return new self;
	}
	
	function check()
	{
		$email = $this->p('email');
		$password = $this->p('password');
		$o = $this->o("SELECT * FROM s_user WHERE user_email = '{$email}' AND user_password = MD5('{$password}') LIMIT 1");
			
		if(isset($o->user_id) && $o->user_id > 0)
		{
			$this->save($o);
			return TRUE;
		}
		return FALSE;
	}
	
	function protect()
	{
		if(PAGE_ACTIVE != 'login')
		{
			if($this->getSession() === FALSE)
			{
				$this->kill();
				header('location:?page=login');
				exit();
			}
		}
		else
		{
			$this->kill();
		}
	}
	
	function save($data)
	{
		if($data)setcookie('data',base64_encode(json_encode($data)),time()+7200);
	}
	
	function getSession()
	{
		if(isset($_COOKIE['data']) && $_COOKIE['data'] != '')
		{
			$this->data = json_decode(base64_decode($_COOKIE['data']));	
		}
		
		if($this->data)return TRUE;
		return FALSE;
	}
	
	function kill()
	{
		$_COOKIE['data'] = NULL;
		setcookie('data','',time()-7200);
		return $this;
	}
}
