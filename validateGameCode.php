<?php
    include 'sessions.php';

    $gameID = $_POST['gameID'];
    $gameCode = $_POST['gameCode'];
    $gamedet = "SELECT * FROM creategame WHERE id = $gameID and gameCode = '$gameCode'";
    
    $res = mysqli_query($conn, $gamedet);

    $row = mysqli_num_rows($res);

    if($row > 0)
    { 
        return print_r(1);
    }else{
        return print_r(0);
    }

?>