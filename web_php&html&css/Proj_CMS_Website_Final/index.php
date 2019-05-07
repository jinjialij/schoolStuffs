<?php
session_start();// Initialize the session

//check and display errors
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
include_once './includes/myFunctions2.php';//load functions
date_default_timezone_set('America/Halifax');//set time zone


// Check if the user is already logged in, yes redirect to index page
if(!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] !== true){
    header("location: ./chatter.php");
    exit;
}

//this post logout value is from logout button
if(isset($_POST['logout']))
{
    if (!empty($_POST['logout']))
    {
        // Unset all of the session variables
        $_SESSION = array();
        // Destroy the session
        session_destroy();
        // Redirect to login page
        header("location: ./chatter.php");
        exit;
    }
}
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
<body class="container-fluid"><!--set interval to 20 seconds-->
<?php

    global $userId;
    $accountId=$_SESSION["userID"];//the logged user's account id

    require_once "./loginInfo.php";

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

    $followingChats=loadMyFollowingChats($accountId);//all chats from whom the logged in user is following

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
			      <li class="nav-item"><a class="nav-link active" href="./index.php" style="color: white;font-size: 1em;">Home</a></li>
			      <li class="nav-item active"><a class="nav-link" href="./chats.php?userId=<?php echo $accountId ?>" style="color: white;font-size: 1em;">MyChats</a></li>
			    </ul>
			    <form class="form-inline" action="./search.php" method="get">
                    <img class="navbar-left" src="./images/chatterIcon.png"  width="50" height="50" alt="ChatterIcon">
                    <input class="form-control" type="search" placeholder="Search Chatter" name="search" size="40">
                    <img src="./images/owl.png" width="40" height="40" alt="owl">
				</form>
                <!--chat button-->
			    <button class="btn btn-primary" data-toggle="modal" data-target="#chatButton" data-whatever="chat" type="submit" style="width: 65px;">Chat</button>
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
                <div class="media col-sm-1" >
                </div>
                <!--a logout button-->
                <form class="media col-sm-2 justify-content-end" method="post">
                    <button class="btn btn-primary"  type="submit" name="logout" value="logout" style="width: 70px;font-size: small;margin-top: 10px;">Log out</button>
                </form>
            </div>
        </div>
    </header>
    <!--End of Chatter Head-->

	<!--body part-->
    <div class="container-fluid" style="margin-bottom: 20px;">
        <div class="row mb-2">
            <div class="col-sm-3" style="margin-top: 10px;background-color: #E8F8FF;padding-top: 10px;padding-left: 20px;padding-bottom: 10px;">
                <!--Start of left container-->
                <div class="media" style="background-color: #91C9E8;padding-top: 20px;padding-bottom: 10px;min-width: 128px;">
                    <div class="container-fluid">
                        <!--user profile information starts here: head picture and account name-->
                        <div class="media" >
                            <div class="media-body">
                                <img class="rounded-circle img-fluid" src="./images/owl.png" alt="my picture"  style="border:1px solid black;background-color:#3399CC;">
                            </div>
                            <div class="media-body" style="margin-top: 5%;">
                                <h3 class="blockquote text-center" style="text-align:center;margin: 0px;display: inline-block;"><?php printAccountName($accountId) ?></h3><!--print user's name-->
                            </div>
                        </div>
                        <!--user profile information ends here-->
                    </div>
                </div>

                <!--3 links starts here-->
                <?php
                    //functions get number of chats,following,followers
                    $numChats=chatNum($accountId);
                    $flernum=followerNum($accountId);//follower num
                    $flnum=followingNum($accountId);//following num
                echo <<<count
                <div class="media">
                    <div class="media-body">
                        <div class="container" style="padding-left: 0px;padding-right: 0px;">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="./chats.php?userId=$accountId">Chats</a>
                                    <span class="badge badge-light">$numChats</span><!--number of chats-->
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="./follow.php?title=Following&userId=$accountId" id="following" >Following</a>
                                    <span class="badge badge-light">$flnum</span><!--number of followings-->
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="./follow.php?title=Followers&userId=$accountId" id="follower">Followers</a>
                                    <!--follower's page-->
                                    <span class="badge badge-light">$flernum</span><!--number of followers-->
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
count;
                ?>
                <!--3 links ends here-->
            </div>
            <!--End of left container-->
            <!--main container-->
            <div class="col-sm" style="background-color: #E8F8FF;margin-top:10px;padding-bottom: 10px;">
                <div class="container" style="margin-top:10px;margin-bottom: 0px;width: 95%; ">
                    <!--chat pad-->
                    <div class="media" >
                        <form class="form-inline" style="width: 100%;" method="post" id="chatPad">
                                <img class="align-self-start mr-3" src="./images/owl.png" alt="Owl" style="margin-right: 10px;height: 40px;display:inline-block">
                                <div class="media-body">
                                    <input class="form-control" type="text" placeholder="Chit Chat..." style="height:40px;width: 100%;" name="newChat" value="" required size="200">
                                </div>
                        </form>
                    </div>
                    <!--End of chat pad-->

                    <!--Start of list of chats-->
                    <div class="list-group" style="background-color: #E8F8FF;" >
                        <h2>New Chats</h2>
                        <!--here shows all following users' chats;changed in assignment 5(see framework.txt)-->
                        <div id="p">

                        </div>
                        <!--End of chats-->
                    </div>
                    <!--End of list of chats-->
                </div>
            </div>
            <!--End of main container-->
        </div>
    </div>
	<!--End of body part-->

	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./js/myScript.js"></script>
    <script>
        function loadChat() {
            var id=<?php echo $accountId?>;//get the value of accountId
            var html="<div class=\"media\" style=\"background-color: white;padding-left: 10px;padding-bottom: 28px;padding-right: 45px;padding-top: 38px;\"><img class=\"align-self-start mr-3\" src=\"./images/userHead.png\" alt=\"userHead\"><div class=\"media-body\" style=\"padding-left: 15px;\"><h3 class=\"card-title\" style=\"display: inline-flex;margin-bottom: 0px; \">";
            var html2="<small class=\"text-muted\" ><p class=\"card-text\" style=\"display: inline-flex;\" >";
            var aj = new XMLHttpRequest();
            aj.onreadystatechange = function() {
                if (aj.readyState == 4 && aj.status == 200) {
                    var pChats = JSON.parse(aj.responseText);
                    console.log(pChats);//show array in browser's console
                    var following="";
                    var date="";
                    var chat="";
                    var wholeChat="";
                    for(var i=0;i<pChats.length;i++){
                        following="<a href=\"./chats.php?userId="+pChats[i][0]+"\""+"><span>"+pChats[i][1]+"</span></a>";//userid and name
                        date=pChats[i][2];//date
                        chat= pChats[i][3];//post
                        var div = document.createElement('div');//create a div each loop
                        wholeChat +=html+following+"</h3>"+html2+date+"</p></small><p class=\"card-text\">"+chat+"</p></div></div>" +
                            "<div style=\"background-color: white;margin-bottom: 30px;padding-bottom: 28px;\">" +
                            "<img class=\"rounded mx-auto d-block\" alt=\"...\" src=\"./images/chatterIcon.png\" alt=\"Card image cap\"></div>";
                    }
                    document.getElementById("p").innerHTML=wholeChat;
                }
            }
            aj.open("GET", "./getPosts.php?id="+id, true);
            aj.send();
        }

        //this function reload the page every 20 seconds
        function fresh() {
            loadChat();//first call loadChat function
            //setInterval(loadChat,20000)；
            setTimeout("location.reload(true);",20000);
        }

        window.onload = fresh;

    </script>
</body>
<footer>
	
</footer>
</html>