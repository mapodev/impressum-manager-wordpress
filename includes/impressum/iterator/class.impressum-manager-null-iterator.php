<?php
class Impressum_Manager_Null_Iterator implements Iterator {

	public function __construct()
	{
	}

	public function current() { return null; }
	public function key() { return null; }
	public function next() {  }
	public function rewind() {  }
	public function valid() { return false; }
}
?>