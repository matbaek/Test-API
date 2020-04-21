<?php

define("DB_SERVER", "");
define("DB_USER", "");
define("DB_PASS", "");
define("DB_NAME", "");

function db_connect() {
    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    if(mysqli_connect_errno()) {
        $msg = "Database connection failed: ". mysqli_connect_error() ." (". mysqli_connect_errno(). ")";
        exit($msg);
    } 
    return $conn;
}

function db_disconnect($connection) {
    if(isset($connection)) {
        mysqli_close($connection);
    }
}

function db_escape($connection, $string) {
    return mysqli_real_escape_string($connection, $string);
}

function confirm_result_set($result_set) {
    if(!$result_set) {
        exit("Database query failed.");
    }
}

?>