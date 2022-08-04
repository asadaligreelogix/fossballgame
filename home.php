<?php

include 'sessions.php';


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <title>Lobby</title>
    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
    <style>
        .f-12{
            font-size: 12px;
        }
        .f-h1{
            font-size: 1.5rem !important;
        }
        .list-group-item{
            border-left:0px !important;
            border-right:0px !important;
        }
        .card-footer{
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .card{
            border: 0px !important;
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <div class="card"> 
            <div class="card-header row p-3 m-0">
                <h1 class="col-8 font-weight-bold pl-0 pt-2 f-h1">Welcome To Tap Game</h1>
                <a href="creategame.php" class="col-4 pt-2 text-right pr-0"><input class="btn btn-success btn-sm font-weight-bold" type="button" name="submit" value="Create Game"></a>
            </div>
            <div class="card-body px-0 py-2">
                <div class="list-group">
                    <?php

                        $games = "SELECT * FROM creategame";

                        $res = mysqli_query($conn, $games);

                        $rows = mysqli_num_rows($res);

                        //print_r($_SESSION);

                        //$userID = $_SESSION['userID'];

                        if($rows > 0)
                        {

                            while($rows = mysqli_fetch_assoc($res))
                            {
                                $gameID = $rows['id'];
                                
                                if($rows['res'] == '1')
                                {
                    ?>
                                    <span class="list-group-item list-group-item-action flex-column align-items-start mb-2">
                                        <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1"><?php echo $rows['gamename']; ?><small class="mb-1 ml-2">Total Goals: <?php echo $rows['numgoals']; ?></small></h5>
                                            <small class="badge badge-warning px-3 py-2 pt-2 f-12">Finished</small>
                                        </div>
                                </span> 
                    <?php
                                }
                                else
                                {
                    ?>
                                <a href="game.php?gameID=<?php echo $gameID; ?>" class="list-group-item list-group-item-action flex-column align-items-start  mb-2">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1"><?php echo $rows['gamename']; ?><small class="mb-1 ml-2">Total Goals: <?php echo $rows['numgoals']; ?></small></h5>
                                        <small class="badge badge-info px-3 py-2 pt-2 f-12">Play Now</small>
                                    </div>
                                </a> 
                    <?php

                                }
                            }
                        }
                        else
                        {
                    ?>
                        <span class="pt-2 px-4 mb-2">
                            <h5 class="mb-1">No Game Is Currently Available</h5>
                        </span> 
                    <?php 
                        }
                        mysqli_close($conn);

                    ?>
                </div>  

            </div>

            <div class="card-footer p-3 m-0"> 
                <a href="logout.php" class="p-0"><input class="btn btn-danger font-weight-bold w-100" type="button" name="submit" value="Logout"></a>
            </div>
        </div>
    </div>
</body>

</html>