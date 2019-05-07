<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body class="container-fluid">
<?php
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);
    include_once './includes/myFunctions2.php';//load functions
    date_default_timezone_set('America/Halifax');
    $searchText="Enter words to search";//default if no search keyword has be inputted
    global $userId;
    $accountId=1;//by default, the account user's id is 1
    $userId=$accountId;//default value account user id
    global $searchResult;//an array which contains search results
    if (isset($_GET['search']))
    {
        $searchText=$_GET['search'];
    }

    if (isset($_POST['newChat']))//if create a new chat in the search page by using the pad
    {
        $chatContent = $_POST['newChat'];
        if ($chatContent!=null)//write to database only if content is not empty
            myNewChats($chatContent);//call the function to write chat to the database
        if (isset($_GET['search']))
        {
            $searchText=$_GET['search'];

        }
        else
            $searchText="Enter words to search";
    }

    if (isset($_POST['chatContent']))//if create a new chat by the chat button
    {
        $chatContent = $_POST['chatContent'];
        if ($chatContent!=null)//write to database only if content is not empty
            $newChatFeedback=myNewChats($chatContent);//call the function to write chat to the databbase
    }

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
    <div class="container-fluid" style="margin-bottom: 20px;">
        <div class="row mb-2">
            <div class="col-sm-3" style="margin-top: 10px;background-color: #E8F8FF;padding-top: 10px;padding-left: 20px;padding-bottom: 10px;">
                <!--Start of left container-->
                <div class="media" style="background-color: #91C9E8;padding-top: 20px;padding-bottom: 10px;min-width: 128px;">
                    <div class="container-fluid">
                        <!--user profile information starts here-->
                        <div class="media" >
                            <div class="media-body">
                                <img class="rounded-circle img-fluid" src="./images/owl.png" alt="my picture"  style="border:1px solid black;background-color:#3399CC;">
                            </div>
                            <div class="media-body" style="margin-top: 5%;">
                                <h3 class="blockquote text-center" style="text-align:center;margin: 0px;display: inline-block;"><?php printAccountName($userId)?></h3>
                            </div>
                        </div>
                        <!--user profile information ends here-->
                    </div>
                </div>
                <!--3 links starts here-->
                <?php
                    $number=padNum($userId);//a function counts number of chats,following,followers
                    echo <<<count
                    <div class="media">
                        <div class="media-body">
                            <div class="container" style="padding-left: 0px;padding-right: 0px;">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <a href="./chats.php?userId=$userId">Chats</a>
                                        <span class="badge badge-light">$number[0]</span><!--number of chats-->
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <a href="./follow.php?title=Following&userId=$userId" id="following" >Following</a>
                                        <span class="badge badge-light">$number[1]</span><!--number of followings-->
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <a href="./follow.php?title=Followers&userId=$userId" id="follower">Followers</a>
                                        <!--follower's page-->
                                        <span class="badge badge-light">$number[2]</span><!--number of followers-->
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
                <div class="container" style="margin-top:10px;margin-bottom: 0px; ">
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

                    <!--Start of list of chats-->
                    <div class="list-group" style="background-color: #E8F8FF;">
                        <h2 style="padding-left: 10px;">
                            <?php
                                if ($searchText!=null)
                                    echo "$searchText";
                                else
                                {
                                    $searchText="0 result<br>Please enter words to search";
                                    echo "$searchText";
                                }
                            ?>
                        </h2><!--should related to what has inputted in the form-->
                        <?php
                        //this part will repeat chat until all search results has been shown
                        if ($searchText!=null) {
                            $searchResult = search($searchText);
                            foreach ($searchResult as $v1)
                            {
                                echo <<<chats
                                    <div class="media" style="background-color: white;padding-left: 10px;padding-bottom: 28px;padding-right: 45px;padding-top: 38px;">
                                      <img class="align-self-start mr-3" src="./images/userHead.png" alt="userHead">
                                      <div class="media-body" style="padding-left: 15px;">
                                        <h3 class="card-title" style="display: inline-flex;margin-bottom: 0px; "><!--user name-->
                                            <a href="./chats.php?userId=$v1[0]">$v1[1]</a><!--'v1[0]'is a user id and 'v1[1]' is the user name-->
                                        </h3>
                                        <small class="text-muted"><!--date-->
                                            <p class="card-text" style="display: inline-flex;">$v1[2]</p>
                                        </small>
                                        <p class="card-text" id="chat1">$v1[3]</p><!--post content-->
                                      </div>
                                    </div>
                                    <div style="background-color: white;margin-bottom: 30px;padding-bottom: 28px;">
                                    <img class="rounded mx-auto d-block" alt="..." src="./images/chatterIcon.png" alt="Card image cap">
                                    </div> 
chats;
                            }
                        }
                        ?>
                        <!--End of chat-->
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