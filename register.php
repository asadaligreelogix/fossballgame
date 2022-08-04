<?php
    session_start();
    include 'config.php';
    if(isset($_SESSION['login']))
{
    header('Location: home.php');
    exit();
}
    
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
        .card{
            border: 0px !important;
        }
        .w88{
            width: 88px;
        }
        .vh80{
            height: 80vh;
        }
        .card-body{
            background-image: url(images/bg1.jpg);
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            filter: blur(2px);
            -webkit-filter: blur(2px);
        }
        .formOnBody{
            position: fixed;        
            top: 20%;
            width:100%;
            z-index: 10;
        }
        .cusRounded{
            color: #495057;
            font-size: 15px;
            background-color: white;
            width: 250px;
        }
        .custom-control-label::before, .custom-control-label::after{
            top: 0.45rem !important;
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
                    
                    <input class="form-control form-control-lg mb-3 text-center" required type = 'text' name = 'name' placeholder = 'Enter Your Name'>
                    <input class="form-control form-control-lg mb-3 text-center" required type = 'email' name = 'email' placeholder = 'Enter Your Email'>
                    <input class="form-control form-control-lg mb-3 text-center" required type = 'password' name = 'pass' placeholder = 'Create Your Password'>
                    <label class="cusRounded">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input required type="radio" checked id="customRadioInline1" name = 'team' value = 'Red' class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline1">Team Red</label>
                        </div>
                    </label>
                    <label class="cusRounded">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input required type="radio" id="customRadioInline2" name = 'team' value = 'Blue' class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline2">Team Blue</label>
                        </div>
                    </label>
                    
                    <input class="form-control mt-2 form-control-lg mb-3 text-center" type="submit" name="submit" value="Sign Up">
                </div>
                <div class="card-body px-5 text-center vh80"></div>
                <div class="card-footer row p-3 m-0">
                    <h1 class="col-8 font-weight-bold pl-0 pt-2 f-h1">Already Have An Account?</h1>
                    <a href="index.php" class="col-4 pt-2 text-right pr-0"><input class="btn btn-success btn-sm font-weight-bold" type="button" name="submit" value="Sign In"></a>
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

    $username = $email = $pass = $team ='';

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $username = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        $pass = test_input($_POST["pass"]);
        $team = test_input($_POST["team"]);


        $ins = "INSERT INTO register(username, email, pass, user) VALUES ('$username', '$email', '$pass', '$team')";

        if(mysqli_query($conn, $ins))
        {
        ?>
            <script>
                swal({
                    title: "Success!",
                    text: "User Registered Successfully!",
                    type: "success",
                    confirmButtonText: "Ok"
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
                    text: "Error Registring User! Please try again Later.",
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