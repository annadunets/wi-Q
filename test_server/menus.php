<?php

function return_menus(){
    $headers = get_header();

    $menus = [
            [
                "id" => 1,
                "name" => "Starters"
            ],
            [
                "id" => 2,
                "name"=> "Mains"
            ],
            [
                "id"=> 3,
                "name"=> "Takeaway"
            ],
            [
                "id"=> 4,
                "name"=> "Delivery"
            ],
            [
                "id"=> 5,
                "name"=> "Desserts"
            ]
        ];
    return json_encode($menus);
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
