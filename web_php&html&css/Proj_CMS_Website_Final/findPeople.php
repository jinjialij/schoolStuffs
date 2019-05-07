<?php
session_start();// Initialize the session
?>
<!DOCTYPE html>
<html>
<head>
    <title>HomePage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body class="container-fluid">
<?php
//check and display errors
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
include_once './includes/myFunctions2.php';//load functions
date_default_timezone_set('America/Halifax');//set time zone

global $userId;
$userId=$accountId=$_SESSION["userID"];//get logged in user's id

//create new chat and write to database with date and time
if (isset($_POST['newChat']))//if create a new chat using the pad
{
    $chatContent = $_POST['newChat'];
    if ($chatContent!=null)//call function to send dara to database only if content is not empty
    {
        $newChatFeedback=myNewChats($chatContent,$accountId);//call the function to write chat to the file
    }

}

if (isset($_POST['chatContent']))//if create a new chat using the button
{
    $chatContent = $_POST['chatContent'];
    if ($chatContent!=null)//write to file only if content is not empty
        $newChatFeedback=myNewChats($chatContent,$accountId);//call the function to write chat to the file
}

//the next button from profile page
if (isset($_POST['next'])) {
    if(empty($_SESSION["name"]))
        echo "<br>enpty session name";
    if (empty($_SESSION['userID']))
        echo "<br>enpty session userID";
    $fn=valid($_POST["fn"]);//clean data
    $ln=valid($_POST["ln"]);
    $p=valid($_POST["profile"]);
    addProfile($fn,$ln,$p,$accountId);
    ;//set session name to user's full name

}


//findPeople adding following users
if (isset($_POST['next2']))
{
    $_SESSION["loggedIn"] = true;
    $_SESSION['newUser']=false;
    if(!empty($_POST['check_list'])) {//adding all checked user to following table
        foreach($_POST['check_list'] as $selected) {
            $id=$selected;
            newFollow($_SESSION["userID"],$id);
        }
    }
    header("location: ./index.php");
    exit;
}

$findPeople=otherUsers($_SESSION["userID"]);//stores all other users' id, name, and profile
?>
<!--Start of nav-->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #3399CC">
    <a class="navbar-brand" href="./index.php">
        <img src="./images/home.png" width="30" height="30" alt="HomeIcon">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav" >
        <ul class="nav nav-pills mr-auto">
            <li class="nav-item"><a class="nav-link" href="./index.php" style="color: white;font-size: 1em;">Home</a></li>
            <li class="nav-item active"><a class="nav-link" href="./chats.php?userId=<?php echo $accountId ?>" style="color: white;font-size: 1em;">MyChats</a></li>
        </ul>
        <form class="form-inline" action="./search.php" method="get">
            <img class="navbar-left" src="./images/chatterIcon.png"  width="50" height="50" alt="ChatterIcon">
            <input class="form-control" type="search" placeholder="Search Chatter" name="search" size="40">
            <img src="./images/owl.png" width="40" height="40" alt="owl">
        </form>
        <!--chat button-->
        <button class="btn btn-primary" data-toggle="modal" data-target="#chatButton" data-whatever="chat" type="submit">Chat</button>
        <!-- The Modal of the Bootstrap which will pop up when the chat button is clicked-->
        <div class="modal fade" id="chatButton" tabindex="-1" role="dialog" aria-labelledby="chatModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header"><!-- Modal Header -->
                        <h5 class="modal-title" id="chatModalLabel">New Chat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" >
                        <div class="modal-body"><!-- Modal body -->
                            <div class="form-group">
                                <textarea class="form-control" id="chatText" name="chatContent" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer"><!-- Modal footer -->
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary"  name="submit" value="submit">Create New Chat</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--End of The Modal-->
    </div>

</nav>
<!--End of nav-->
<!--Chatter Head-->
<header>
    <div class="container-fluid" style="background-color: #91C9E8;">
        <div class="row" >
            <div class="media col-sm-4" >
                <img src="./images/chatterIcon.png" class="rounded mx-auto d-block" style="overflow: auto;" alt="chatter Icon">
            </div>
            <div class="media col-sm-5" >
                <div class="media-body" style="margin-top: 5%;">
                    <h1 class="blockquote " style="color:white;font-size:3.5em;text-align:center; margin-top: 8%;">...Chatter...</h1>
                    <p  style="color:white;font-size:1.5em;text-align:center;">Chit Chat for all</p>
                </div>
            </div>
        </div>
    </div>
</header>
<!--End of Chatter Head-->

<!--body part-->
<form method="post" action="./findPeople.php">
    <div class="container-fluid" style="margin-top: 20px;margin-bottom:20px;background-color:#91C9E8">
        <div class="container col-sm-8" style="padding: 10px;10px;">
            <div class="row justify-content-md-left" >
                <p style="color: #005BA8;font-size: 2em;font-weight: bold;margin-bottom: 3%;">Name find people to follow</p>
            </div>
            <?php
                //this part will repeat chat until all chats of followings has been shown
                foreach ($findPeople as $v1) {
                    echo <<<find
                            <div class="row" style="padding-bottom: 15px;">
                                <div class="align-self-center form-check" >
                                    <input class="form-check-input" type="checkbox" name="check_list[]" value="$v1[0]" ><!--user id-->
                                </div>
                                <img src="./images/userHead.png" alt="user haed">
                                <div class="media-body">
                                    <h3 class="card-title" style="display: inline-flex;margin-bottom: 0px; "><!--user name-->
                                        <a href="./chats.php?userId=$v1[0]">$v1[1]</a>
                                    </h3>
                                    <p class="card-text" >$v1[2]</p><!--profile-->
                                </div>
                            </div>
find;
                }
            ?>
        </div>
    </div>
    <div class="row" style="">
        <div class="col-sm-10">
        </div>
        <div class="col-sm-2" style="margin-bottom: 20px;">
            <button class="btn btn-primary btn-lg "  type="submit" name="next2" value="submit"  >Next</button>
        </div>
    </div>
</form>

<!--End of body part-->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript" src="./js/myScript.js"></script>
</body>
<footer>

</footer>
</html>