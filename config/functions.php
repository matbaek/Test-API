<?php 

function is_post_request() {
    return $_SERVER["REQUEST_METHOD"] == "POST";
}

function is_get_request() {
    return $_SERVER["REQUEST_METHOD"] == "GET";
}

function http_response($code, $message, $item=[]) {
    $response['message'] = $message;  
    if($item) {
        $response['item'] = $item;
    }

    http_response_code($code);
    $json_response = json_encode($response);
    echo $json_response;
}

?>