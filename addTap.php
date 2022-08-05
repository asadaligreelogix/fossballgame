<?php

include 'sessions.php';

    $gameID = '';
    $gameID = $_POST['gameID'];
    $userID = $_POST['userID'];

    $gamedet = "SELECT * FROM creategame WHERE id = $gameID";
 
    $res = mysqli_query($conn, $gamedet);

    $row = mysqli_num_rows($res);

    if($row > 0)
    {
       $det = mysqli_fetch_assoc($res);

       $gameGoals = $det['numgoals'];
       //$gameName = $det['gamename'];
    }

    $goals = "SELECT Count(goals) AS UserGoals FROM game WHERE gameid = $gameID AND userid = $userID";

    $sql = mysqli_query($conn, $goals);

    $goalRows = mysqli_num_rows($sql);

    if ($goalRows > 0)
    {
        $goalRows = mysqli_fetch_assoc($sql);
        $userGoals = $goalRows['UserGoals'];
    }
    $userGoals = $userGoals +1;
    if ($det['res'] != 1 && $userGoals < $gameGoals)
    {   
        //print_r("A");
        
        $insGoal = "INSERT INTO game(gameid, userid, goals) VALUES('$gameID', '$userID', '1')";
        if (mysqli_query($conn, $insGoal)) 
        {
            //echo "Goal Inserted";
            $data = [
                'gameStatus' => 1, 
                'usergoals' => $userGoals, 
            ];
            return print_r(json_encode($data));
        }
        
    }
    else
    {
         
        $gameStatus = "UPDATE creategame SET res='1' WHERE id='$gameID'";

        $res = mysqli_query($conn,$gameStatus);

        if(!$res)
        {
            echo "Error Updating Game Status";
        }
        
        $result = "SELECT * FROM result WHERE gameid = $gameID";
    
        $res = mysqli_query($conn, $result);

        $row = mysqli_num_rows($res);
        
        // print_r($result);
        
        if($row == 0)
        {   
            $sql = "INSERT INTO result(gameid, userid, result) VALUES ('$gameID', '$userID', 'Finished')";

            $res = mysqli_query($conn,$sql);
 
            // print_r("Inside");
            // die();
        }
        // print_r("oUTSIDE");
        // die();

        

        $result = "SELECT * FROM result WHERE gameid = $gameID and userid = $userID";
    
        $res = mysqli_query($conn, $result);

        $row = mysqli_num_rows($res);

        $data['gameStatus'] = 0;
        // print_r($result);
        // print_r($row);
        // die();
        if($row > 0)
        {
            $data['status'] = "Winner";
            if ($_SESSION['team'] == 'Red')
            {
                $data['class'] = "red";
            }
            elseif ($_SESSION['team'] == 'Blue')
            {
                $data['class'] = "blue";
            }
        }else{
            $data['status'] = "Looser";
            if ($_SESSION['team'] == 'Red')
            {
                $data['class'] = "red";
            }
            elseif ($_SESSION['team'] == 'Blue')
            {
                $data['class'] = "blue";
            }
        }
        return print_r(json_encode($data));
     
        

    }
    
    ?>