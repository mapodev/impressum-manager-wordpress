<?php

class Impressum_Manager_Impressum_Iterator implements Iterator {


	private $iter;
	private $impressum;

	public function __construct(&$m)
	{
		$this->iter = new ArrayIterator($m);
	}

	public function current() { return $this->iter->current(); }
	public function key() { return $this->iter->key(); }
	public function next() { return $this->iter->next(); }
	public function rewind() { return $this->iter->rewind(); }
	public function valid() {  return $this->iter->valid(); }


}