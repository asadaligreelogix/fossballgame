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
                                <input type="hidden" value="<?php echo $rows['id'];?>" id="input_<?php echo $rows['id'];?>">
                                <a href="#"  data-toggle="modal" data-target="#exampleModalCenter" class="list-group-item list-group-item-action flex-column align-items-start  mb-2 modelID" data-id="<?php echo $rows['id'];?>">
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


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Enter Game Code</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-warning submitModal">Save changes</button>
      </div>
    </div>
  </div>
</div>

            <div class="card-footer p-3 m-0"> 
                <a href="logout.php" class="p-0"><input class="btn btn-danger font-weight-bold w-100" type="button" name="submit" value="Logout"></a>
            </div>
        </div>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            $(".modelID").click(function (e) { 
                var modelID = $(this).attr("data-id"); 
                var InputValue = $("#input_"+modelID).val(); 
                let html = `
                    <form id="validateGameCode" action="game.php?gameID=${InputValue}" method="POST">
                        <input type="hidden" name="gameID" id="gameID" value="${InputValue}">
                        <input type="text" name="gameCode" id="gameCode" placeholder="Game Code" class="form-control form-control-lg mb-3 text-center">
                        <span class="form-control form-control-lg text-center text-danger border-0 p-0 m-0 gameCodeError"></span>
                    </form> 
                `; 
                $('.modal-body').html(html);
            });
            $(".submitModal").click(function (e) { 
                var gameCode = $('#gameCode').val();
                var gameID = $('#gameID').val();
                if(gameCode != ""){
                    $.ajax({
                        type: "post",
                        url: "validateGameCode.php",
                        data:{
                            gameCode: gameCode,
                            gameID: gameID,
                        },
                        success: function (response) {
                            if(response == 1){
                                $('#validateGameCode').submit();
                                $('#exampleModalCenter').hide();
                            }else{
                                $('.gameCodeError').text("Invalid game code!").delay(2000).fadeOut();;
                            }
                        }
                    });
                }else{
                    $('.gameCodeError').text("Game code required!").delay(2000).fadeOut();;
                }
            });
        });
    </script>
</body>

</html>