<?php

abstract class Impressum_Manager_AImpressum {

	protected $parent;

	abstract function add(Impressum_Manager_AImpressum $unit);
	abstract function remove(Impressum_Manager_AImpressum $unit);
	abstract function get($int);
	abstract function draw();
	protected abstract function getImpressum();

	protected function set_parent(Impressum_Manager_AImpressum $unit)
	{
		$this->parent=$unit;
	}

	public function get_parent()
	{
		return $this->parent;
	}

	protected function removeParentRef()
	{
		$this->parent=null;
	}

}