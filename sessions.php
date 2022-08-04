<?php

session_start();

include 'config.php';
if(!$_SESSION['login'])
{
    header('Location: index.php');
    exit();
}

// print_r($_SESSION);

?>