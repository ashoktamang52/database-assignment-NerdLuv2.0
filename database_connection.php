<?php
    // Connect to Mysql database.
    $db = new PDO("mysql:dbname=nerd_luv;host=127.0.0.1", "root", "asdf1234");
    $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>