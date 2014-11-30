<?php
class Product {
	private $id;
	private $name;
	private $imgSource;
	private $description;
	private $category;
	private $price;
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