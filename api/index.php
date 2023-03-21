<?php

include_once('great_food_service.php');
include_once('config.php');

function print_menu($response){

    $html = '';

    $html .= '<table>';
    foreach($response as $item){
        $html .= '<tr><td>' . $item->id . '</td><td>' . $item->name . '</td></tr>';
    }
    $html .= '</table>';
    echo $html;

}

$great_food_client = new GreatFoodClient(GF_HOST, GF_CLIENT_SECRET, GF_CLIENT_ID);
$service = new GreatFoodService($great_food_client);
$menu = $service->get_menu('Takeaway');

print_menu($menu);

$menu_id = 7;
$product = [
            "id" => 84,
            "name" => 'Chips',
            ];
$service->update_product($menu_id, $product);
