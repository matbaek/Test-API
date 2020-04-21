<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
include_once "config/initialize.php";

if(isset($_GET["id"])) {
    $id = $_GET["id"] ?? "0";
    $book = find_book_by_id($id);
    
    if($book != null) {

        $book_item=array(
            "id" => $book["id"],
            "name" => $book["name"],
            "length" => $book["length"],
            "price" => $book["price"]
        );

        http_response(200, "Book found.". $book);
    } else {
        http_response(404, "No book found by id.");
    }
} else {
    $books_set = find_all_books();

    if($books_set != null) {
        $books_array = array();

        while($book = mysqli_fetch_assoc($books_set)) { 
            $book_item=array(
                "id" => $book["id"],
                "name" => $book["name"],
                "length" => $book["length"],
                "price" => $book["price"]
            );
            array_push($books_array, $book_item);
        }

        http_response(200, "Books found.", $books_array);

        mysqli_free_result($books_set);
    } else {
        http_response(404, "No books exits.");
    }
}

?>