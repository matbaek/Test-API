<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
include_once "config/initialize.php";

if(is_post_request()) {
    $book = [];
    $book["name"] = $_POST["name"] ?? "";
    $book["length"] = $_POST["length"] ?? 0;
    $book["price"] = $_POST["price"] ?? 0;

    $result = insert_book($book);

    if($result === true) {
        http_response(201, "Book created", $book);
    } else {
        http_response(404, "Unable to create book");
    }

    db_disconnect($db);
} else {
    http_response(400, "Invalid Request");
}
?>