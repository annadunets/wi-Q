<?php

function return_tocken(){
    $tokens = [
            "access_token"=> "33w4yh344go3u4h34yh93n4h3un4g34g",
            "expires_in"=> 999999999,
            "token_type"=> "Bearer",
            "scope"=> "catalogue",
            "post" => $_POST
        ];
    return json_encode($tokens);
}

echo return_tocken();