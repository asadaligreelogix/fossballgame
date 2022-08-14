<?php
    include 'sessions.php';

    if(!by_pass_login_signup){
        session_unset();

        session_destroy();

        header('Location: index.php');
    }

?>