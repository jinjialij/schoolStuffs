<?php
    session_start();// Initialize the session
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" >
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Login in</title>
</head>
<body >
    <?php
        ini_set('display_errors',1);
        ini_set('display_startup_errors',1);
        error_reporting(E_ALL);
        date_default_timezone_set('America/Halifax');
        //$_SESSION['newUser']=false;

    ?>
    <form class="text-center">
        <!--Chatter ICON-->        
        <div class="container  col-sm-7" >
            <div class="container" >
                <div class="row justify-content-md-center text-center" style="margin-top: 15%;">
                    <img src="./images/chatterIcon.png"  style="overflow: auto;" alt="chatter Icon" width="90", height="90">
                    <div style="margin-top: 2%;">
                        <h1 style="color: #005BA8;text-align:center;font-weight: bold">...Chatter...</h1>
                        <p  style="color: #005BA8;font-size:1.5em;text-align:center;font-weight: bold">Chit Chat for all</p>
                    </div>
                </div>
            </div>
            <div class="container  col-sm-5" >
                <div class="row justify-content-md-left text-center">
                    <p  style="color: #005BA8; font-weight: bold;text-align:left;" >Join Chatter today</p>
                </div>
            </div>
            <div class="container  col-sm-5" >
                <div class="row justify-content-md-center text-center">
                    <form>
                        <button class="btn btn-primary btn-lg btn-block"  formaction="./account.php" formmethod="get" type="submit" name="SignUp" value="1">Sign Up</button>
                        <button class="btn btn-secondary btn-lg btn-block" formaction="./account.php" formmethod="get" type="submit" name="LogIn" value="2">Login in</button>
                    </form>
                </div>
            </div>
        </div>
    </form>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  	<script type="text/javascript" src="./js/myScript.js"></script>
</body>
</html>