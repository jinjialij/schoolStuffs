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
include_once './includes/myFunctions2.php';//load functions
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
date_default_timezone_set('America/Halifax');

global $status;
if (isset($_GET['SignUp'])) {//1
    $status=$_GET['SignUp'];
}
else if (isset($_GET['LogIn'])){//2
    $status=$_GET['LogIn'];
}
else if (isset($_POST['submit'])){
    $status=$_POST['submit'];
}




$name=$password=$pwError=$nameError=$try="";
if ($_SERVER["REQUEST_METHOD"] == "POST" && $status==1){//if it's sign up page
    $usernameCheck=false;
    $pwCheck=false;
    //check if user name is empty
    if(empty($_POST["username"]))
    {
        $nameError="Sorry, username is required to sign up";
        $usernameCheck=false;
    }
    else//check if name is valid if it is not empty
    {
        $name=valid($_POST["username"]);
        if (!checkName($name))//check if the name has been used
        {
            $usernameCheck=true;
        }
        else
        {
            $nameError="Sorry, this username has been used.";
            $usernameCheck=false;
            $name="";
        }

    }

    //check if password is empty
    if (empty($_POST["password"]))
    {
        $pwError="Sorry, password is required to sign up";
        $pwCheck=false;
    }
    else{
        $password=valid($_POST["password"]);
        //check if password follows pattern
        //pattern: at least 6 character and one number
        if (!preg_match('/\w{5,}\d/',$password,$match)) {
            $pwError = "Sorry, only letters and number are allowed in password. Rule: It must at least has one number and has at least 6 characters.";
            $password="";
            $pwCheck=false;
        }
        else
        {
            $pwError=" ";
            $pwCheck=true;
        }
    }

    //if username and password meet the standard,add it to database and go back to login
    if ($usernameCheck==true && $pwCheck==true)
    {
        addNewUser($name);//add new user info into user table
        $id=getUserID($name);//get userid
        addLogin($id,$name,$password);//add in log in table
        $name=$password=$nameError=$pwError="";//empty all user info and error info
        $try="";//no error message
        $_SESSION['newUser']=true;//set session variable to note the user is a new user
        $_POST["username"]=null;//clean post variable
        $_POST["password"]=null;
        //$status=2;//go to log in page
        header("location: ./chatter.php");
        exit;
    }
    else
    {
        $usernameCheck=$pwCheck=false;
        $try="Please try again";//error message
        $status=1;
    }
}


//for log in
if ($_SERVER["REQUEST_METHOD"] == "POST" && $status==2 ) {//log in page
    $usernameCheck=false;
    $pwCheck=false;
    //check if user name is empty
    if (empty($_POST["username"])) {
        $nameError = "Sorry, username is required";
        $usernameCheck = false;
    } else {
        $name = valid($_POST["username"]);
        $usernameCheck=true;
    }

    //check if password is empty
    if (empty($_POST["password"])) {
        $pwError = "Sorry, password is required";
        $pwCheck = false;
    } else {
        $password = valid($_POST["password"]);
        $pwCheck = true;
    }

    //name and password are not empty, check with database
    if ($usernameCheck==true && $pwCheck==true)
    {
        $result=checkName($name);//check if the name exist
        if (!$result)//name not exist
        {
            $nameError="This user name does not exist";
        }
        else//name exists
        {
            $checkResult=loginCheck($name,$password);
            if ($checkResult[0]!=-1)//login info matches: both username and password match
            {
                /*set the username session variable and name session variable.*/
                $_SESSION["userID"]=$checkResult[0];//userID
                $_SESSION["username"]=$checkResult[1];//user name
                $_SESSION["name"]=name($_SESSION["userID"]);//get full name
                if (isset($_SESSION['newUser']))
                {
                    if ($_SESSION['newUser']!=true) //not first time user
                    {
                        $_SESSION["loggedIn"] = true;
                        //$_SESSION["name"]=name($checkResult[0]);//full name
                        header("location: ./index.php");
                        exit;
                    }
                    else
                    {
                        header("location: ./profile.php");
                        exit;
                    }
                }
                else//not first time user
                {
                    $_SESSION["loggedIn"] = true;
                    header("location: ./index.php");
                    exit;
                }
            }
            else//password error
            {
                $nameError="";
                $pwError=$checkResult[2];
            }
        }
    }
}

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
                <p  style="color: #005BA8; font-weight: bold;text-align:left;" >
                    <?php
                    if($status==1)
                        echo "Sign Up";
                    else
                        echo "Log In";
                    ?>
                </p>
            </div>
        </div>
        <div class="container  col-sm-5" >
            <div class="row justify-content-md-center text-center">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);//this action avoid $_SERVER["PHP_SELF"] exploits?>">
                    <input class="form-control" style="margin-bottom: 10px; " type="text" placeholder="username" name="username" formmethod="post" ></input>
                    <input class="form-control" style="margin-bottom: 10px;"  type="password" placeholder="password" name="password" formmethod="post" ></input>
                    <button class="btn btn-primary btn-lg btn-block"  type="submit" name="submit" formmethod="post" formaction="./account.php" value="<?php echo $status ?>">SUBMIT</button>
                    <span><p style="color: red;"><?php echo $nameError."\t".$pwError."\r\n".$try;?></p></span>
                </form>
            </div>
        </div>
    </div>
    <!--End of Chatter ICON-->

</form>


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript" src="./js/myScript.js"></script>
</body>
</html>