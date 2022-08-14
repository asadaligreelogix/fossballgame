<?php

session_start();

include 'config.php';
if(!by_pass_login_signup){
    if(!$_SESSION['login'])
    {
        header('Location: index.php');
        exit();
    }
}

// print_r($_SESSION);

?>