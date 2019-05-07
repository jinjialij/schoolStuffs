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
    include_once './includes/myFunctions.php';//functions
    date_default_timezone_set('America/Halifax');//set time zone

    //create new chat and write to myChats.txt with date, time, and timestamp
    if (isset($_GET['newChat']))//if create a new chat
    {
        $chatContent = $_GET['newChat'];
        if ($chatContent!=null)//write to file only if content is not empty
            myNewChats($chatContent);//call the function to write chat to the file
    }
    $followingChats=loadFollowingChats();//all following chats

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
			      <li class="nav-item active"><a class="nav-link" href="./chats.php?name=myChat" style="color: white;font-size: 1em;">MyChats</a></li>
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
			<div class="col-sm-4">
				<img src="./images/chatterIcon.png" class="rounded mx-auto d-block" alt="chatter Icon">
			</div>
			<div class="col-sm-5" >
				<h1 class="text-center" style="color:white;font-size:3.5em;text-align:center; margin-top: 8%;">...Chatter...</h1>
				<p class="text-center" style="color:white;font-size:1.5em;text-align:center;margin-left: 6%;">Chit Chat for all</p>
			</div>
		  </div>
		</div>			
	</header>
	<!--End of Chatter Head-->

	<!--body part-->
	<div class="media">
		<div class="media-body">
			<div class="container-fluid" style="margin-bottom: 20px;">
				<div class="row mb-2">	
					<div class="col-sm-3" style="margin-top: 10px;background-color: #E8F8FF;padding-top: 10px;padding-left: 20px;padding-bottom: 10px;">
						<!--Start of left container-->
						<!--user profile information starts here-->
						<div class="media" style="background-color: #91C9E8;padding-top: 20px;padding-bottom: 10px;">
							<div class="container-fluid">
								<div style="width: 40%;display: inline-block;">
									<img class="rounded-circle mx-auto d-block" src="./images/owl.png" alt="my picture" class="rounded-circle" style="border:1px solid black;background-color:#3399CC;">
								</div>		
								<div style="width: 55%;display: inline-block;">
								<h3 class="blockquote text-center" style="text-align:center;margin: 0px;display: inline-block;">Jiali Jin</h3>
								</div>							
							</div>			
						</div>
						<!--user profile information ends here--> 
						<!--3 links starts here-->
						<div class="media">
							<div class="media-body">
								<div class="container" style="padding-left: 0px;padding-right: 0px;">
									<ul class="list-group">
									  <li class="list-group-item d-flex justify-content-between align-items-center">
									  	<a href="./chats.php?name=myChat">Chats</a>
									    <span class="badge badge-light">436</span>
									  </li>
									  <li class="list-group-item d-flex justify-content-between align-items-center">
									  	<a href="./follow.php?title=Following " id="following" >Following</a>
									    <span class="badge badge-light">6</span>
									  </li>
									  <li class="list-group-item d-flex justify-content-between align-items-center">
									  	<a href="./follow.php?title=Followers " id="follower">Followers</a>
									  	<!--follower's page-->
									  	<span class="badge badge-light">9</span>
									  </li>				
									</ul>
								</div>
							</div>
						</div>
						<!--3 links ends here-->
					</div>
					<!--End of left container-->
					<!--main container-->
					<div class="col-sm" style="background-color: #E8F8FF;margin-top:10px;padding-bottom: 10px;">
						<div class="container" style="margin-top:10px;margin-bottom: 0px;margin-left:0px;width: 95%; ">
							<!--chat pad-->
                            <div class="media" >
                                <form class="form-inline" style="width: 100%;" method="get">
                                        <img class="align-self-start mr-3" src="./images/owl.png" alt="Owl" style="margin-right: 10px;height: 40px;display:inline-block">
                                        <div class="media-body">
                                            <input class="form-control" type="text" placeholder="Chit Chat..." style="height:40px;width: 100%;" name="newChat" value="" required size="200">
                                        </div>
                                </form>
                            </div>
                            <!--End of chat pad-->

							<!--Start of list of chats-->
							<div class="list-group" style="background-color: #E8F8FF;">
								<h2>New Chats</h2>
							  	<!--chat-->
                                <?php
                                    //this part will repeat chat until all chats of followings has been shown
                                    foreach ($followingChats as $v1)
                                    {
                                        $name;//String
                                        $time;//String
                                        $timestamp;//String
                                        $text;//String
                                        for($col=0;$col<count($v1);$col++)
                                        {
                                            $name=$v1[0];
                                            $time=$v1[1];
                                            $timestamp=$v1[2];
                                            $text=$v1[3];
                                        }
                                        echo <<<chats
                                        <div class="card" style="width: 100%;margin-bottom: 10px;">
                                            <div class="card-body">
                                                <div class="row" style="width: 90%;">
                                                    <div class="col-sm-2">
                                                        <img src="./images/userHead.png" alt="userHead">
                                                    </div>
                                                    <!--New chats text part -->
                                                    <div class="col-sm-10">
                                                        <div class="row" style="margin-left: 10px;">
                                                            <!--Name and post time -->
                                                            <div class="col-sm-10">
                                                                <h3 class="card-title" style="display: inline-flex;"><!--user name-->
                                                                    <a href="./chats.php?name=$name">$name</a>
                                                                </h3>
                                                            <small class="text-muted">
                                                                <p class="card-text" style="display: inline-flex;"><!--time-->$time</p>
                                                            </small>
                                                            </div>
                                                            <!--chat content-->
        
                                                            <div class="col-sm-10">
                                                            <!--text-->
                                                                <p class="card-text" id="chat1">$text</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--End of New chats text part -->
                                                </div>
                                                <img class="rounded mx-auto d-block" alt="..." src="./images/chatterIcon.png" alt="Card image cap">
                                            </div>
                                        </div>
chats;
                                }
                                ?>
							 	<!--End of chat-->
                            </div>
							<!--End of list of chats-->
						</div>
					</div>
					<!--End of main container-->
				</div>
			</div>
		</div>		
	</div>
	<!--End of body part-->

	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!--<script type="text/javascript" src="./js/myScript.js"></script>-->
</body>
<footer>
	
</footer>
</html>