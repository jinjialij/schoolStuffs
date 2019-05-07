<!DOCTYPE html>
<html>
<?php
    include_once './includes/myFunctions.php';//functions
    //check and display errors
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);
    date_default_timezone_set('America/Halifax');//set time zone
    $getName="myChat";//By default，it is myChat page
    if (isset($_GET['name']))//if get the name which the user wants to see
    {
        $getName = $_GET['name'];
        global $chats;
        $chats=loadChatsByName($getName);//call method to load chats according the name
        $followingName = getAllFollowingName();
        $followerName = getAllFollowerName();
        $accountName = loadChatsName($getName);
        $desc = loadDesc($getName);
    }
    else
    {
        $chats=loadMyChats();
        $accountName=$chats[0][0];

        //load my description as default
        $fh = fopen("./myProfile.txt",'r') or die("Failed to open file");
        $desc = fread($fh,filesize("./myProfile.txt"));
        fclose($fh);
    }

    if (isset($_POST['newChat']))//if create a new chat
    {
        $chatContent = $_POST['newChat'];
        if ($chatContent!=null)//write to file only if content is not empty
            myNewChats($chatContent);//call the function to write chat to the file
    }

    ?>
<head>
	<title>MyChat</title>
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
                    if ($getName=="myChat" || $getName==null)//if it is myChat or default, the MyChat in the nav bar should be shown as selected
                    {
                        echo <<<nav
		      <li class="nav-item active"><a class="nav-link active" href="./chats.php?name=myChat" style="color: white;font-size: 1em;">MyChats<span class="sr-only">(current)</span></a></li>
nav;

                    }
                    else//in other cases, not selected
                    {
                        echo <<<nav
		      <li class="nav-item active"><a class="nav-link" href="./chats.php?name=myChat" style="color: white;font-size: 1em;">MyChats<span class="sr-only">(current)</span></a></li>
nav;
                    }

                ?>
		    </ul>
            <form class="form-inline" action="./search.php" method="get">
                <img class="navbar-left" src="./images/chatterIcon.png"  width="50" height="50" alt="ChatterIcon">
                <input class="form-control" type="search" placeholder="Search Chatter" name="search" size="40">
                <img src="./images/owl.png" width="40" height="40" alt="owl">
            </form>
		    <button class="btn btn-default" type="submit">Chat</button>			    
	    </div>		
	    
	</nav>
	<!--End of nav-->


    <!--Chatter Head-->
    <header>
        <div class="container-fluid" style="background-color: #91C9E8;">
            <div class="row" >
                <div class="media col-sm-4" style="padding: 20px;">
                    <?php
                    if (isset($_GET['name']))//change the user's account head img, default is an owl which represents my head
                    {
                        if ($getName!="myChat")
                        {
                            $head="./images/userHead.png";
                        }
                        else
                            $head="./images/owl.png";
                    }
                    else
                        $head="./images/owl.png";
                    ?>
                    <img src=<?php echo $head; ?> class="rounded-circle mx-auto d-block" width="172px height=175px alt="my picture" class="rounded-circle" style="border:1px solid black;background-color:#3399CC;">
                </div>
                <div class="media col-sm-5">

                        <h1 class="blockquote " style="color:white;font-size:3.5em;text-align:center; margin-top: 18%;">
                            <?php
                                echo $accountName;//load the account's name
                            ?>
                        </h1>

                </div>
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
                                                echo "$desc";//load description
                                            ?>
                                        </p>
								    </div>
									<ul class="list-group">
									  <li class="list-group-item d-flex justify-content-between align-items-center">
									  	<a href="./chats.php?name=myChat">Chats</a>
									    <span class="badge badge-light">436</span>
									  </li>
									  <li class="list-group-item d-flex justify-content-between align-items-center">
									  	<a href="./follow.php?title=Following">Following</a>
									    <span class="badge badge-light">6</span>
									  </li>
									  <li class="list-group-item d-flex justify-content-between align-items-center">
									  	<a href="./follow.php?title=Followers">Followers</a>
									  	<span class="badge badge-light">9</span>
									  </li>				
									</ul>
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
									<h2>
                                        <?php
                                            if (isset($_GET['name']))//load heading of chats
                                            {
                                                if ($getName!="myChat")
                                                {
                                                    $chatHead=$accountName."'s Chats";
                                                }
                                                else
                                                    $chatHead="My Chats";
                                            }
                                            else
                                                $chatHead="My Chats";
                                            echo  "$chatHead";
                                        ?>
                                    </h2>
								  	<div class="list-group">
								  	   <!--chat 1-->
                                        <?php
                                            //this part will show all chats according to the user
                                            foreach ($chats as $v) {
                                                $name;//String
                                                $time;//String
                                                $timestamp;//String
                                                $text;//String
                                                for ($col = 0; $col < count($v); $col++) {
                                                    $name = $v[0];
                                                    $time = $v[1];
                                                    $timestamp = $v[2];
                                                    $text = $v[3];
                                                }
                                                echo <<<chat
                                                <div class="list-group" style="background-color: #E8F8FF;">
                                                  <div class="media" style="background-color: white;padding-left: 0px;padding-bottom: 28px;padding-right: 45px;padding-top: 18px;">
                                                    <div class="media-body" style="padding-left: 15px;">
                                                    <h3 class="card-title" style="display: inline-flex;margin-bottom: 0px;font-size: 1.5em; ">
                                                        $time
                                                    </h3>                                              
                                                    <p class="card-text" id="chat1">$text</p>
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