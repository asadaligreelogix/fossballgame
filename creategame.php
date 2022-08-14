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
    
    <title>Create Game</title>
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
        <form method = 'post'>
            <div class="card"> 
                <div class="card-header row p-3 m-0">
                    <h1 class="col-8 font-weight-bold pl-0 pt-2 f-h1">Set Your Prefrences</h1>
                    <a href="home.php" class="col-4 pt-2 text-right pr-0"><input class="btn btn-success btn-sm font-weight-bold" type="button" name="submit" value="Lobby"></a>
                </div>
                <div class="card-body px-5 text-center">
                    <div class="list-group"> 
                        <input class="form-control form-control-lg mb-3 text-center" type = 'text' name = 'name' required placeholder = 'Enter Game Name'>
                        <input class="form-control form-control-lg mb-3 text-center" type = 'number' min="5" name = 'goals' value='5' required placeholder = 'Enter Number Of Goals'>
                        <input class="form-control form-control-lg mb-3 text-center" type = 'text' name = 'gameCode' required placeholder = 'Game Code'>
                    </div>   
                </div> 
                <div class="card-footer p-3 m-0"> 
                    <input type="submit" name="submit" value="Create" class="btn btn-danger font-weight-bold w-100">
                </div>
            </div>
        </form>
    </div>  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        document.getElementById("playArea").style.width = "100%"; 
    </script> 
</body> 
</html>

<?php

    $name = $goals = $res = '';

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $name = test_input($_POST["name"]);
        $goals = test_input($_POST["goals"]);
        $gameCode = test_input($_POST["gameCode"]);

        $_SESSION['gamestatus'] = $res;

        $team = $_SESSION['team'];
        $game = "INSERT INTO creategame (gamename, numgoals, team, gameCode) VALUES ('$name', '$goals', '$team', '$gameCode')";

        if(mysqli_query($conn, $game))
        {
           
?> 
            <script>
                swal({
                    title: "Success!",
                    text: "Game <?php echo $name;?> Created With  <?php echo $goals;?> Goals!",
                    type: "success",
                    confirmButtonText: "OK"
                });
            </script>
<?php 
        }
        else
        {
?>
            <script>
                swal({
                    title: "Error!",
                    text: "Error Creating Game!",
                    type: "error",
                    confirmButtonText: "Back"
                });
            </script>
<?php
            echo "";
        }

    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
      
      mysqli_close($conn);

?>