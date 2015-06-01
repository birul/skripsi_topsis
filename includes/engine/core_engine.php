<?php

class topsis extends query
{
	function retreiveCriteria($select = 'id')
	{
		
		if($select == 'count')
		{
			$o = $this->o("SELECT COUNT(criteria_id) AS all_criteria  FROM s_criteria WHERE problem_id = ".APP_ID);
			return (int)$o->all_criteria;
		}
		
		$selector = 'criteria_'.$select;
		
		$Q = $this->r("SELECT {$selector}  FROM s_criteria WHERE problem_id = ".APP_ID);
		
		$data = array();
		
		foreach($Q as $o)
		{
			$data[] = $o->{$selector};
		}
		
		return $data;
	}
	
	
	function retreiveAlternative()
	{
		$Q = $this->r('SELECT * FROM s_alternative WHERE problem_id = '.APP_ID);
		
		$data = array();
		foreach($Q as $n => $o)
		{
			$data[$o->alternative_code] = array();
			foreach($this->retreiveCriteria() as $c)
			{
				$data[$o->alternative_code][] = $this->o(
						"SELECT decision_point 
						FROM s_decision 
						WHERE criteria_id = '{$c}' 
						AND alternative_id = '{$o->alternative_id}' 
						AND problem_id = 1 LIMIT 1"
						)->decision_point;
			}
		}
		
		return $data;
	}
	
	function totalAlternative()
	{
		return (int) $this->o("SELECT COUNT(alternative_id) AS total FROM s_alternative WHERE problem_id = ".APP_ID)->total;
	}
	
	function getDecision($alternative_id,$criteria_id)
	{
		return $this->o("SELECT decision_point AS dc FROM s_decision WHERE alternative_id = '{$alternative_id}' AND criteria_id = '{$criteria_id}' AND problem_id = ".APP_ID." LIMIT 1")->dc;
	}
	
	function getLog()
	{
		$data = array();
		$subR = array();
		$C = $this->retreiveCriteria();
		$A = $this->r('SELECT * FROM s_alternative WHERE problem_id = '.APP_ID);
		foreach($C as $criteria_id)
		{
			$subR[$criteria_id] = 0;
			foreach($A as $a)
			{
					
				$decisionLog = $this->getDecision($a->alternative_id, $criteria_id);
				
				$subR[$criteria_id] += ($decisionLog * $decisionLog);
				
			}
			
			$data[$criteria_id] = sqrt($subR[$criteria_id]);
		}
		return $data;
	}
	
	function getR()
	{
		$data = array();
		$L = $this->getLog();
		$C = $this->retreiveCriteria();
		$A = $this->r('SELECT * FROM s_alternative WHERE problem_id = '.APP_ID);
		foreach($A as $a)
		{
			$data[$a->alternative_name] = array();
			foreach($C as $criteria_id)
			{
				$data[$a->alternative_name][] = $this->getDecision($a->alternative_id, $criteria_id) / $L[$criteria_id];
			}
		}
		
		return $data;
	}
	
	function getY()
	{
		$data = array();
		$L = $this->getLog();
		$C = $this->r('SELECT * FROM s_criteria WHERE problem_id = '.APP_ID);
		$A = $this->r('SELECT * FROM s_alternative WHERE problem_id = '.APP_ID);
		foreach($A as $a)
		{
			$data[$a->alternative_name] = array();
			foreach($C as $c)
			{
				$data[$a->alternative_name][] = $this->getDecision($a->alternative_id, $c->criteria_id) / $L[$c->criteria_id] * $c->criteria_weight;
			}
		}
	
		return $data;
	}
	
	
	function getYInverse()
	{
		$data = array();
		$L = $this->getLog();
		$C = $this->r('SELECT * FROM s_criteria WHERE problem_id = '.APP_ID);
		$A = $this->r('SELECT * FROM s_alternative WHERE problem_id = '.APP_ID);
		foreach($C as $n => $c)
		{
			$data[$c->criteria_type.'-'.$c->criteria_id] = array();
			foreach($A as $a)
			{
				$data[$c->criteria_type.'-'.$c->criteria_id][] = $this->getDecision($a->alternative_id, $c->criteria_id) / $L[$c->criteria_id] * $c->criteria_weight;
			}
		}
	
		return $data;
	}
}


$topsis = new topsis();

