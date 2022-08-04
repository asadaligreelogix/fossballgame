<?php
    include 'sessions.php';


$class = $_GET['class'];
$status = $_GET['status'];
 
?>
 
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title><?php echo $status;?></title>
    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
    <style> 
      .overlay {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        /* background-color: <?php echo $class;?>;  */
        background-image: url(images/fossBall.jpeg);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        overflow-x: hidden;
        transition: 0.5s;
        color: white;
        filter: blur(5px);
        -webkit-filter: blur(5px);
      }

      .centered {
        position: fixed; 
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 100px;
        color: white;
        z-index: 99;
      }
      a {
          padding: 8px;
          text-decoration: none;
          font-size: 40px;
          color: white;
          display: block;
          transition: 0.3s;
          position: fixed;
          z-index: 999;
          right: 10px;
      }
      

      .overlay .closebtn {
        position: absolute;
        top: 20px;
        right: 45px;
        font-size: 60px;
      }

    </style>
  </head>
  <body>
    <a href="home.php" class="closebtn">&times;</a>
    <!-- <div id="playArea" data-gameID="1" class="overlay"> -->
      <div id="playArea" class="overlay">
      </div>
      <span class="centered"><?php echo $status; ?></span>
    
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        document.getElementById("playArea").style.width = "100%"; 
    </script> 
    <script>
      var status = "<?php echo $status; ?>";
      if(status == "Winner"){
        swal({
            title: "Success!",
            text: "Hurrah! you won this game.",
            type: "success",
            confirmButtonText: "OK"
        });
      }else if(status == "Looser"){
        swal({
            title: "Error!",
            text: "Oops! you lost this game.",
            type: "error",
            confirmButtonText: "Back"
        });
      }
      else{
        swal({
            title: "Error!",
            text: "Error while calculating results!",
            type: "error",
            confirmButtonText: "Back"
        });
      }
    </script>
</body>
</html>