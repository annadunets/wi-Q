<?php

class GreatFoodClient{

    public function __construct($host, $client_secret, $client_id){
        $this->host = $host;
        $this->client_secret = $client_secret;
        $this->client_id = $client_id;
    }

    public function get_token(){
        # link for testing:
        # $url = $this->host . '/auth_token.php';
        $url = $this->host . '/auth_token';

        $arr = [
            "client_secret" => $this->client_secret,
            "client_id" => $this->client_id,
            "grant_type" => 'client_credentials',
        ];
        $data = http_build_query($arr);
  
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  //return the transfer as a string of the return value
        curl_setopt($ch, CURLOPT_POST, true);  // This line must place before CURLOPT_POSTFIELDS
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // Data that will be send

        $response = curl_exec($ch);       
        $token = json_decode($response);

        return $token;
    }

    public function get_menus($token){
        # url for testing:
        # $url = $this->host . '/menus.php';
        $url = $this->host . '/menus';
  
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer ' . $token,
        ));

        $response = curl_exec($ch);       
        $menus = json_decode($response);
        
        return $menus;
    }

    public function get_products($token, $menu_id){
        # url for testing
        # $url = $this->host . '/products.php?menu_id=' . $menu_id;
        $url = $this->host . '/menu/'. $menu_id . '/products';

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer ' . $token,
        ));

        $response = curl_exec($ch);       
        $products = json_decode($response);
        
        return $products;
    }

    public function update_product($token, $menu_id, $product){

        $url = $this->host . '/menu/'. $menu_id . '/products/' . $product->id;
        $data = json_encode($product);
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer ' . $token,
        ));

        $response = curl_exec($ch);       
        return $response;
    }

}
