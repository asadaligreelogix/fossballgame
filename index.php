<?php

    include 'config.php';
    session_start();

    if(!by_pass_login_signup){
        if(isset($_SESSION['login']))
        {
            header('Location: home.php');
            exit();
        }
    }else{
        header('Location: register.php');
    }

    session_unset();

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Foss Ball</title>
    
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
        .card-header, .card-footer{
            background-color:#fbfbfb !important;
        }
        .card{
            border: 0px !important;
        }
        .list-group{
            height: 75vh;
            overflow-y: scroll;
        }
        .w88{
            width: 88px;
        }
        .vh77{
            height: 77vh;
        }
        .card-body{
            background-image: url(images/bg2.jpg);
            /* background-attachment: fixed; */
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            filter: blur(1px);
            -webkit-filter: blur(1px);
        }
        .formOnBody{
            position: fixed;        
            top: 20%;
            width:100%;
            z-index: 10;
        }
    </style>
  </head>
  <body>




    <div class="container-fluid p-0">
        <form method ='POST' >
            <div class="card"> 
                <div class="card-header px-3 py-0 m-0 text-center">
                    <img  class="img-fluid img-responsive w88" src="images/logo2.png" alt="logo">
                </div>
                
                <div class="formOnBody px-3 py-0 m-0 text-center">
                    <input class="form-control form-control-lg mb-3 text-center" type = 'text' name = 'email' placeholder = 'Enter Your Email'>
                    <input class="form-control form-control-lg mb-3 text-center" type = 'password' name = 'pass' placeholder = 'Enter Your Password'>
                    <input class="form-control form-control-lg mb-3 text-center" type="submit" name="submit" value="Log In">
                </div>
                <div class="card-body px-5 text-center vh77"></div>
                <div class="card-footer row p-3 m-0">
                    <h1 class="col-8 font-weight-bold pl-0 pt-2 f-h1">Not Have An Account?</h1>
                    <a href="register.php" class="col-4 pt-2 text-right pr-0"><input class="btn btn-success btn-sm font-weight-bold" type="button" name="submit" value="Register Now"></a>
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
     
</body>
</html>

<?php

    $email = $pass = '';

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $email = test_input($_POST["email"]);
        $pass = test_input($_POST["pass"]);

        $login = "SELECT * FROM register WHERE email = '$email' && pass = '$pass'";

        $res = mysqli_query($conn, $login);

        $row = mysqli_fetch_assoc($res);

        if($row > 0)
        {
            $_SESSION["email"] = $email;
            $_SESSION["pass"] = $pass;

            $_SESSION['userID'] = $row['userid'];
            $_SESSION['team'] = $row['user'];

            $_SESSION["login"] = 1; 

            header ('Location: home.php');
            exit();
            
        }
        else
        {
    ?>
        <script>
            swal({
                title: "Error!",
                text: "Invalid Login Credentials!",
                type: "error",
                confirmButtonText: "Back"
            });
        </script>
    <?php 

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