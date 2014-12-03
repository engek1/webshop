<?php

require_once 'oop/Category.php';

// Product Information
$products = array (
		11 => array (// db
				"id" => 11,
				"category" => Category::ELECTRO,
				"price" => 129.90,
				"name" => "Okay 120E green-edition",
				"imgSource" => "images/electric/electric-1.jpg",
				"description" => "highly brummm" 
		),
		12 => array (// db
				"id" => 12,
				"category" => Category::ELECTRO,
				"price" => 129.90,
				"name" => "Okay 120E Standard",
				"imgSource" => "images/electric/electric-2.jpg",
				"description" => "highly summmmm" 
		),
		
		21 => array (
				"id" => 21,// db
				"category" => Category::GAS,
				"price" => 159.90,
				"name" => "Okay 150B",
				"imgSource" => "images/fuel/fuel-1.jpg",
				"description" => "highly roarrrrrrr" 
		),
		22 => array (
				"id" => 22,// db
				"category" => Category::GAS,
				"price" => 259.90,
				"name" => "Okay 250C",
				"imgSource" => "images/fuel/fuel-2.jpg",
				"description" => "highly gluck gluck gluck" 
		),
		23 => array (
				"id" => 23,//db
				"category" => Category::GAS,
				"price" => 159.90,
				"name" => "Okay 360A",
				"imgSource" => "images/fuel/fuel-3.jpg",
				"description" => "highly powerful" 
		),
		24 => array (
				"id" => 24,//db
				"category" => Category::GAS,
				"price" => 199.90,
				"name" => "Okay 990 super",
				"imgSource" => "images/fuel/fuel-4.jpg",
				"description" => "highly powerful super super super" 
		),
		25 => array (
				"id" => 25,//db
				"category" => Category::GAS,
				"price" => 159.90,
				"name" => "Stihl F34",
				"imgSource" => "images/fuel/fuel-5.jpg",
				"description" => "very useful" 
		),
		26 => array (
				"id" => 26,//db
				"category" => Category::GAS,
				"price" => 559.90,
				"name" => "Stihl Luxor",
				"imgSource" => "images/fuel/fuel-6.jpg",
				"description" => "very luxury" 
		),
		27 => array (
				"id" => 27,//db
				"category" => Category::GAS,
				"price" => 159.90,
				"name" => "Stihl Poor",
				"imgSource" => "images/fuel/fuel-7.jpg",
				"description" => "very unglamour" 
		),
		28 => array (
				"id" => 28,//db
				"category" => Category::GAS,
				"price" => 159.90,
				"name" => "Stihl nerdy",
				"imgSource" => "images/fuel/fuel-8.jpg",
				"description" => "very nerdy" 
		),
		
		31 => array (
				"id" => 31,
				"category" => Category::TRACTOR,
				"price" => 5689.00,
				"name" => "The tractor for every need",
				"imgSource" => "images/tractor/tractor-1.jpg",
				"description" => "This machine solves every problem" 
		),
		
		41 => array (
				"id" => 41,
				"category" => Category::ROBOT,
				"price" => 2579.00,
				"name" => "Robot mover T2",
				"imgSource" => "images/robot/robot-1.jpg",
				"description" => "The new star in the lawnmower scene! " 
		),
		42 => array (
				"id" => 42,
				"category" => Category::ROBOT,
				"price" => 3400.00,
				"name" => "Robot mover T5",
				"imgSource" => "images/robot/robot-2.jpg",
				"description" => "Looks like Michael Jackson, but with a beautiful nose."
		),
		
		51 => array (
				"id" => 51,
				"category" => Category::HAND,
				"price" => 189.00,
				"name" => "Hand mover hard 3000",
				"imgSource" => "images/hand/hand-1.jpg",
				"description" => "Completely environmentally friendly" 
		),
		52 => array (
				"id" => 52,
				"category" => Category::HAND,
				"price" => 189.00,
				"name" => "Hand mover easy 4500",
				"imgSource" => "images/hand/hand-2.jpg",
				"description" => "has a bit hard to push"
		),
		53 => array (
				"id" => 53,
				"category" => Category::HAND,
				"price" => 189.00,
				"name" => "Hand mover less easy 1000",
				"imgSource" => "images/hand/hand-3.jpg",
				"description" => "sucks a lot but no lawn"
		),
		54 => array (
				"id" => 54,
				"category" => Category::HAND,
				"price" => 189.00,
				"name" => "Hand mover easypeasy 9000",
				"imgSource" => "images/hand/hand-4.jpg",
				"description" => "Completely environmentally friendly like BONO"
		),
		55 => array (
				"id" => 55,
				"category" => Category::HAND,
				"price" => 189.00,
				"name" => "Hand mover supernatural 9991",
				"imgSource" => "images/hand/hand-5.jpg",
				"description" => "looks like a bonobo"
		),
		
		61 => array (
				"id" => 61,
				"category" => Category::EQUIPMENT,
				"price" => 9.90,
				"name" => "Okay Motorenöl 0.5L",
				"imgSource" => "images/fuel/fuel-1.jpg",
				"description" => "very smoothy, such creamy, lol" 
		) 
);
?>