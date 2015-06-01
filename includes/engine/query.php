<?php

class query
{
	var $post = array(),$get = array();
	//get multi result
	function r($query)
	{
		$Q = mysql_query($query)or die($query.mysql_error());
		$fields = array();
		while($o = mysql_fetch_object($Q))
		{
			$fields[] = $o;
		}
		return $fields;
	}
	//get one result
	function o($query)
	{
		$Q = mysql_query($query)or die($query.mysql_error());
		$o = mysql_fetch_assoc($Q);
		if(isset($o))return (object) $o;
		return FALSE;
	}
	
	//delete
	function d($table,$where)
	{
		$w = '';
		foreach($where as $a => $b)
		{
			$w = "WHERE `{$a}` = '".mysql_real_escape_string($b)."'";
		}
		 
		return mysql_query("DELETE FROM `{$table}` {$w} ")or die(mysql_error());
	} 
	
	
	//save
	function s($table,$data = array(),$escape = array())
	{
		$field = array();
		$value = array();
		foreach($data as $a => $b)
		{
			if(in_array($a,$escape))continue;
			$field[] = $a;
			$value[] = mysql_real_escape_string($b);
		}
		
		$query = mysql_query("INSERT INTO `{$table}` (`".implode("`,`",$field)."`) VALUES ('".implode("','",$value)."')")or die(mysql_error());
		return $query;
	}
	//update
	function u($table,$data = array(),$where='')
	{
		if($where != '')$where = 'WHERE '.$where;
		$value = array();
		foreach($data as $a => $b)
		{
			$value[] = $a . ' = \'' .mysql_real_escape_string($b) .'\'';
		}
		
		$query = mysql_query("UPDATE `{$table}` SET ".implode(",",$value)." {$where}")or die(mysql_error());
		return $query;
	}
	
	//post
	function p($data = FALSE)
	{
		if(!$data)
		{
			$this->post = (object) $_POST;
			return $this;
		}
		else if($data && $data !='')
		{
			if(isset($_POST[$data]) && $_POST[$data] != '')
			{
				return mysql_real_escape_string($_POST[$data]);
			}
		}
		return NULL;
	}
	
	//post
	function g($data = FALSE)
	{
		if(!$data)
		{
			$this->get = (object) $_GET;
			return $this;
		}
		else if($data && $data !='')
		{
			if(isset($_GET[$data]) && $_GET[$data] != '')
			{
				return mysql_real_escape_string($_GET[$data]);
			}
		}
		return NULL;
	}
}

$db = new query();
