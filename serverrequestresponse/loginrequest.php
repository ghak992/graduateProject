<?php

if (isset($_POST["useremail"]) && isset($_POST["userpassword"])) {
    include_once '../DB/dboperation.php';
    $email = strval($_POST["useremail"]);
    $pass = strval($_POST["userpassword"]);
    dboperation::logIn($email, $pass);
}


