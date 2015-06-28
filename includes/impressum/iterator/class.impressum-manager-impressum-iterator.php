<?php

class Impressum_Manager_Impressum_Iterator implements Iterator {

	private $iter;

	public function __construct(&$m)
	{
		$this->iter = new ArrayIterator($m);
	}

	public function current() { $this->iter->current(); }
	public function key() { $this->iter->key(); }
	public function next() { $this->iter->next(); }
	public function rewind() { $this->iter->rewind(); }
	public function valid() {  $this->iter->valid(); }
}