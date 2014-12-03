<?php
class Product {
	public $id;
	public $name;
	public $imgSource;
	public $description;
	public $category;
	public $price;
	public function __construct($id, $name, $imgSource, $description, $category, $price) {
		$this->id = $id;
		$this->name = $name;
		$this->imgSource = $imgSource;
		$this->description = $description;
		$this->category = $category;
		$this->price = $price;
	}
	
}
?>