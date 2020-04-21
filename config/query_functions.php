<?php 

function find_all_books() {
    global $db;

    $sql = "SELECT * FROM book ";
    $sql .= "ORDER BY name ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    if(mysqli_num_rows($result) == 0) {
        return null;
    }
    return $result;
}

function find_book_by_id($id) {
    global $db;
    
    $sql = "SELECT * FROM book ";
    $sql .= "WHERE id='". db_escape($db, $id) ."' ";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    if(mysqli_num_rows($result) != 0) {
        $book = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $book;
    }
    mysqli_free_result($result);
    return null;
}

function insert_book($book) {
    global $db;
    
    $sql = "INSERT INTO book (";
    $sql .= "name, length, price";
    $sql .= ") VALUES (";
    $sql .= "'". db_escape($db, $book["name"]) ."', ";
    $sql .= "'". db_escape($db, $book["length"]) ."', ";
    $sql .= "'". db_escape($db, $book["price"]) ."'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);

    if($result) {
        return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
}

?>