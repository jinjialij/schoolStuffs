<!DOCTYPE html>
<html>
<head>
	<title>Follow</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body class="container-fluid">
	<!--Start of nav-->
		<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #3399CC";>
			<a class="navbar-brand" href="./index.php">
			    <img src="./images/home.png" width="30" height="30" alt="HomeIcon">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    	<span class="navbar-toggler-icon"></span>
	  		</button>
		  	<div class="collapse navbar-collapse" id="navbarNav" >  
			    <ul class="navbar-nav mr-auto">
			      <li class="nav-item active"><a class="nav-link" href="./index.php" style="color: white;font-size: 1em;">Home</a></li>
			      <li class="nav-item active"><a class="nav-link" href="./chats.php" style="color: white;font-size: 1em;">MyChats</a></li>
			    </ul>
			    <form class="form-inline" action="./search.php" method="post">	
		    	<img class="navbar-left" src="./images/chatterIcon.png"  width="50" height="50" alt="ChatterIcon">	
		    	<input class="form-control" type="search" placeholder="Search Chatter" >
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
					<!--Start of left container-->
					<div class="col-sm-3" style="margin-top: 10px;background-color: #E8F8FF;padding-top: 10px;padding-left: 20px;padding-bottom: 10px;">						
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
									  	<a href="./chats.php">Chats</a>
									    <span class="badge badge-light">436</span>
									  </li>
									  <li class="list-group-item d-flex justify-content-between align-items-center">
									  	<a href="./follow.php" id="following" >Following</a>
									    <span class="badge badge-light">6</span>
									  </li>
									  <li class="list-group-item d-flex justify-content-between align-items-center">
									  	<a href="./follow.php" id="follower">Followers</a>
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
						<div class="container" style="margin-top:10px;margin-bottom: 0px; ">
							<!--chat pad-->
							<div class="row" style="padding: 5px;">
								<form class="form-inline" style="width: 100%;">	
										<img src="./images/owl.png" alt="Owl" style="margin-right: 10px;height: 40px">
										<input class="form-control" type="text" placeholder="Chit Chat..." style="height:40px;width: 90%;" >	
									</div>							
								</form>
							</div>
							<!--End of chat pad-->

							<!--Start of list of following-->
							<div class="container">
								<div class="list-group" style="background-color: #E8F8FF;">
									<!--Following or Followers-->
									<h2>Following</h2>
									<!--Start of Name 1-->
								  	<div class="media" style="margin-top: 5px;margin-bottom: 10px;">
									  <img class="mr-3" src="./images/userHead.png" alt="userHead">
									  <div class="media-body">
									    <h3 class="mt-0"><a href="./chats.php">Mary</a></h3>
									  </div>
									</div>
									<!--End of Name 1-->

									<!--Start of Name 2-->
									<div class="media" style="margin-top: 5px;margin-bottom: 10px;">
									  <img class="mr-3" src="./images/userHead.png" alt="userHead">
									  <div class="media-body">
									    <h3 class="mt-0"><a href="./chats.php">Tom</a></h3>
									  </div>
									</div>
									<!--End of Name 2-->

									<!--Start of Name 3-->
									<div class="media" style="margin-top: 5px;margin-bottom: 10px;">
									  <img class="mr-3" src="./images/userHead.png" alt="userHead">
									  <div class="media-body">
									    <h3 class="mt-0"><a href="./chats.php">Steve</a></h3>
									  </div>
									</div>
									<!--End of Name 3-->

									<!--Start of Name 4-->
									<div class="media" style="margin-top: 5px;margin-bottom: 10px;">
									  <img class="mr-3" src="./images/userHead.png" alt="userHead">
									  <div class="media-body">
									    <h3 class="mt-0"><a href="chats.php">Emma</a></h3>
									  </div>
									</div>
									<!--End of Name 4-->

									<!--Start of Name 5-->
									<div class="media" style="margin-top: 5px;margin-bottom: 10px;">
									  <img class="mr-3" src="./images/userHead.png" alt="userHead">
									  <div class="media-body">
									    <h3 class="mt-0"><a href="./chats.php">Alice</a></h3>
									  </div>
									</div>
									<!--End of Name 5-->

									<!--Start of Name 6-->
									<div class="media" style="margin-top: 5px;margin-bottom: 10px;">
									  <img class="mr-3" src="./images/userHead.png" alt="userHead">
									  <div class="media-body">
									    <h3 class="mt-0"><a href="./chats.php">Leo</a></h3>
									  </div>
									</div>
									<!--End of Name 6-->
								</div>
							</div>
							<!--End of list of following-->
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
  	<script type="text/javascript" src="./js/myScript.js"></script>
</body>
<footer>
	
</footer>
</html>