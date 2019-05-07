<?php
session_start();// Initialize the session

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
<?php
    include_once './includes/myFunctions2.php';//load functions
    //check and display errors
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);
    date_default_timezone_set('America/Halifax');//set time zone

    $accountId=$_SESSION["userID"];//by default, the account user's id is 1
    $userId=$accountId;//By default，it is the account users' myChat page

    if (isset($_GET['userId'])) { //get userId by get
        $userId=$_GET['userId'];
    }

    if (isset($_POST['newChat']))//if create a new chat by using the pad
    {
        $chatContent = $_POST['newChat'];
        if ($chatContent!=null)//write to database only if content is not empty
            myNewChats($chatContent,$accountId);//call the function to write a chat to the database
    }

    if (isset($_POST['chatContent']))//if create a new chat by chat button
    {
        $chatContent = $_POST['chatContent'];
        if ($chatContent!=null)//write to database only if content is not empty
            $newChatFeedback=myNewChats($chatContent,$accountId);//call the function to write chat to the database
    }

    //if follow button is clicked, the logged in user will call function to follow the user current is showing
    if (isset($_POST['follow']))
    {
        if (!empty($_POST['follow']))
        {
            newFollow($accountId,$userId);
        }
    }

$followingList=getAllFollowingName($accountId);

    ?>
<head>
	<title>
        <?php
            if ($userId==$_SESSION["userID"])//change title name,if it is account user,it is MyChat, otherwise, it is Chat
                echo "MyChat";
            else
                echo "Chat";
        ?>
    </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body class="container-fluid" onload="displayDateOnChatFunction()">

	<!--Start of nav-->
	<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #3399CC";>
		<a class="navbar-brand" href="./index.php">
		    <img src="./images/home.png" width="30" height="30" alt="HomeIcon">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  		</button>
	  	<div class="collapse navbar-collapse" id="navbarNav" >  
		    <ul class="nav nav-pills mr-auto">
		      <li class="nav-item"><a class="nav-link" href="./index.php" style="color: white;font-size: 1em;">Home</a></li>
                <?php
                    if ($userId==$_SESSION["userID"])//if the user id is the logged in user, the MyChat in the nav bar should be shown as selected
                    {
                        echo <<<nav
		      <li class="nav-item active"><a class="nav-link active" href="./chats.php?userId=$accountId" style="color: white;font-size: 1em;">MyChats<span class="sr-only">(current)</span></a></li>
nav;

                    }
                    else//in other cases, the MyChat is not selected
                    {
                        echo <<<nav
		      <li class="nav-item active"><a class="nav-link" href="./chats.php?userId=$accountId" style="color: white;font-size: 1em;">MyChats<span class="sr-only">(current)</span></a></li>
nav;
                    }

                ?>
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
                <div class="media col-sm-4" style="padding: 20px;">
                    <?php
                    if ($userId!=$accountId)//change the user's account head img, default is an owl which represents my head
                    {
                        $head="./images/userHead.png";//other user's head
                    }
                    else
                        $head="./images/owl.png";//logged in user's head
                    ?>
                    <img src=<?php echo $head; ?> class="rounded-circle mx-auto d-block" width="172px height=175px alt="my picture" class="rounded-circle" style="border:1px solid black;background-color:#3399CC;">
                </div>
                <div class="media col-sm-5">
                        <h1 class="blockquote " style="color:white;font-size:3.5em;text-align:center; margin-top: 18%;">
                            <?php
                                printAccountName($userId); //load the user's name
                            ?>
                        </h1>
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
					<div class="col-sm-3" style="margin-top: 10px;background-color: #E8F8FF;padding: 10px;">
						<!--Start of left container-->
						
						<div class="media">
							<div class="media-body">
								<div class="container" style="margin-top:20px;margin-bottom: 20px;">
									<!--description-->
									<div class="list-group-item list-group-item-action flex-column align-items-start">
								    	<p class="mb-1">
                                            <?php
                                                printDesc($userId);//load description according to the user id
                                            ?>
                                        </p>
								    </div>
                                    <!--3 links starts here-->
                                    <?php
                                        //functions get number of chats,following,followers
                                        $numChats=chatNum($userId);
                                        $flernum=followerNum($userId);//follower num
                                        $flnum=followingNum($userId);//following num
                                        echo <<<count
                                            <div class="media">
                                                <div class="media-body">
                                                    <div class="container" style="padding-left: 0px;padding-right: 0px;">
                                                        <ul class="list-group">
                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                <a href="./chats.php?userId=$userId">Chats</a>
                                                                <span class="badge badge-light">$numChats</span><!--number of chats-->
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                <a href="./follow.php?title=Following&userId=$userId" id="following" >Following</a>
                                                                <span class="badge badge-light">$flnum</span><!--number of followings-->
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                <a href="./follow.php?title=Followers&userId=$userId" id="follower">Followers</a>
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
                                    <!--a follow button-->
                                    <form class="media" method="post">
                                        <div class="media-body ">
                                            <?php
                                                if ($userId==$accountId || containFollowing($followingList,$userId)==true)//if it's logged user himself or already follwoing, disable the follow button
                                                    echo <<<follow2
                                            <button class="btn btn-primary"  type="submit" name="follow" value="follow" style="width: 70px;font-size: small;margin-top: 10px;" disabled>Follow</button>
follow2;
                                                else
                                                    echo <<<follow
                                            <button class="btn btn-primary"  type="submit" name="follow" value="follow" style="width: 70px;font-size: small;margin-top: 10px;">Follow</button>
follow;
                                            ?>
                                        </div>
                                    </form>
								</div>
							</div>
						</div>
						<!--End of left container-->
					</div>

					<!--main container-->
					<div class="col-sm" style="background-color: #E8F8FF;margin-top:10px;padding-bottom: 10px;">		
						<div class="container-fluid" style="margin-top:10px;margin-bottom: 0px; ">
                            <!--chat pad-->
                            <div class="media" >
                                <form class="form-inline" style="width: 100%;" method="post">
                                    <img class="align-self-start mr-3" src="./images/owl.png" alt="Owl" style="margin-right: 10px;height: 40px;display:inline-block">
                                    <div class="media-body">
                                        <input class="form-control" type="text" placeholder="Chit Chat..." style="height:40px;width: 100%;" name="newChat" value="" required size="200">
                                    </div>
                                </form>
                            </div>
                            <!--End of chat pad-->
							<div class="container-fluid" style="padding-right: 0px;padding-left: 5px;">
							<!--Start of list of chats-->					
								<div class="list-group" style="background-color: #E8F8FF; ">
									<h2><?php
                                            if ($userId==$accountId)//change heading according to the userId
                                                echo "My Chats";
                                            else
                                                echo printAccountName($userId)."'s Chats";
                                        ?>
                                    </h2>
								  	<div class="list-group">
								  	   <!--chats-->
                                        <?php
                                            $chats=loadChats($userId);//load chats according to userId
                                            //this part will show all chats according to the user
                                            foreach ($chats as $v) {
                                                echo <<<chat
                                                <div class="list-group" style="background-color: #E8F8FF;">
                                                  <div class="media" style="background-color: white;padding-left: 0px;padding-bottom: 28px;padding-right: 45px;padding-top: 18px;">
                                                    <div class="media-body" style="padding-left: 15px;">
                                                    <h3 class="card-title" style="display: inline-flex;margin-bottom: 0px;font-size: 1.5em; ">$v[2]</h3><!--date-->                                              
                                                    <p class="card-text" id="chat1">$v[3]</p><!--post content-->
                                                  </div>
                                                </div>
                                                <div style="background-color: white;margin-bottom: 30px;padding-bottom: 28px;">
                                                    <img class="rounded mx-auto d-block" alt="..." src="./images/chatterIcon.png" alt="Card image cap">
                                                </div> 
chat;
                                            }
                                        ?>
									</div>
								</div>
								<!--End of list of chats-->
							 </div>
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
</body>
<footer>
	
</footer>
</html>