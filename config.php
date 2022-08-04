<?php
    if($_SERVER['SERVER_NAME']=='fossball.greelogics.com'){
        $servername = 'localhost';
        $username = 'greeqhlk_game';
        $password = "v[Q9LSM_StNk";
        $dbname = 'greeqhlk_game';
    }else{
        $servername = 'localhost';
        $username = 'root';
        $password = "";
        $dbname = 'game';
    }



$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn)
{
    die("Can't connect to Database" . mysqli_connect_error());
}

/*$db = "CREATE DATABASE game";

if(mysqli_query($conn,$db))
{
    echo "Database Created Successfully";
}*/


$tblregister = "CREATE TABLE register(
    userid INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL,
    pass VARCHAR(50) NOT NULL,
    user VARCHAR(30) NOT NULL)";

if(mysqli_query($conn, $tblregister))
{
    echo "Table Register Created Successfully";
}

$tblresult = "CREATE TABLE result(
    resid INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    gameid INT(5) NOT NULL,
    userid INT(5) NOT NULL,
    result VARCHAR(30) NOT NULL)";

if(mysqli_query($conn, $tblresult))
{
    echo "Table Result Created Successfully";
}

$tblgame = "CREATE TABLE game(
    id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    gameid INT(5) NOT NULL,
    userid INT(5) NOT NULL,
    goals INT(5) NOT NULL)";

if(mysqli_query($conn, $tblgame))
{
    echo "Table Game Created Successfully";
}

$tblcreategame = "CREATE TABLE creategame(
    id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    gamename VARCHAR(30) NOT NULL,
    numgoals INT(5) NOT NULL,
    team VARCHAR(30) NOT NULL,
    res INT(11) NOT NULL DEFAULT 0)"; 

if(mysqli_query($conn, $tblcreategame))
{
    echo "Table creategame Created Successfully";
}

?>