<?php

class Impressum_Manager_Impressum extends Impressum_Manager_AImpressum {

	private $units;

	public function __construct()
	{
		$this->units=array();
	}

	function add(Impressum_Manager_AImpressum $unit){
		array_push($this->units,$unit);
		$unit->set_parent($this);
	}

	function remove(Impressum_Manager_AImpressum $unit){
		if($unit === $this)
		{
			for($countA = 0; $countA < count($this->units); $countA++)
			{
				$this->safeRemove($this->units[$countA]);
			}
			$this->units= array();
			$this->removeParentRef();
		}
		else
		{
			for($countB = 0; $countB < count($this->units); $countB++)
			{
				if($this->units[$countB] == $unit)
				{
					$this->safeRemove($this->units[$countB]);
					array_splice($this->units, $countB, 1);
				}
			}
		}
	}

	private function safeRemove(IComponent $safeImp)
	{
		if($safeImp->getImpressum())
		{
			$safeImp->remove($safeImp);
		}
		else
		{
			$safeImp->removeParentRef();
		}
	}
	protected function getImpressum(){
		return $this;
	}


	function get($int){
		if(($int > 0) && ($int <= count($this->units)))
		{
			return $this->units[$int-1];
		}
		else
		{
			return null;
		}
	}

	function draw(){
		$result = "";



		foreach($this->units as $unit)
		{
			$result .= $unit->draw();
		}
		return $result;
	}

}