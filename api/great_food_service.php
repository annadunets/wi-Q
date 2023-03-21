<?php
include_once ('library.php');
include_once('config.php');

class GreatFoodService{

    public function __construct($client){
        $this->client = $client;
    }

    public function get_menu($menu_name){
        $token = $this->client->get_token();
        $menus = $this->client->get_menus($token->access_token);

        $menu_id = '';
        foreach($menus as $menu){
            if($menu->name == $menu_name){
                $menu_id = $menu->id;
            }
        }
        $products = $this->client->get_products($token->access_token, $menu_id);
        return $products;
    }

    public function update_product($menu_id, $product){
        $token = $this->client->get_token();
        $this->client->update_product($token->access_token, $menu_id, $product);
    }
}
