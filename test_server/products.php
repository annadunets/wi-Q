<?php

function return_menus(){
    $headers = get_header();

    $products = [
    [
        "id"=> 1,
        "name"=> "Large Pizza"
    ],
    [
        "id"=> 2,
        "name"=> "Medium Pizza"
    ],
    [
        "id"=> 3,
        "name"=> "Burger"
    ],
    [
        "id"=> 4,
        "name"=> "Chips"
    ],
    [
        "id"=> 5,
        "name"=> "Soup"
    ],
    [
        "id"=> 6,
        "name"=> "Salad"
    ]
];
    return json_encode($products);
}

function get_header(){

       $headers = array (); 
       foreach ($_SERVER as $name => $value) 
       { 
           if (substr($name, 0, 5) == 'HTTP_') 
           { 
               $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value; 
           } 
       } 
       return $headers; 
 
}

echo return_menus();
