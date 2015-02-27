<?php

ob_start();
#to remove header function problem
session_start();
include_once 'include/sessioncheck.php';
if (!$_SESSION['login']) {
    header('Location: http://localhost/graduateproject2015/index.php');
}

