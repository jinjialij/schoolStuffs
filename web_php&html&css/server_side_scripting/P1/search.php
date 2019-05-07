<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body class="container-fluid" onload="displayDateFunction()">
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
		    	<input class="form-control" type="search" placeholder="Halifax" >
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

							<!--Start of list of chats-->
							<div class="list-group" style="background-color: #E8F8FF;">
								<h2>Search Result</h2><!--should related to what has inputted in the form-->
							  	<!--chat 1-->					  	
								<div class="card" style="width: 100%;margin-bottom: 10px;">								
									<div class="card-body">
									  	<div class="row" style="width: 90%;">
									  		<div class="col-sm-2">
									  			<img src="./images/userHead.png" alt="userHead">
									  		</div>
										  	<!--New chats text part -->					  	
										  	<div class="col-sm-10">
										  		<div class="row">
										  			<!--Name and post time -->
										  			<div class="col-sm-10">
										  				<h3 class="card-title" style="display: inline-flex;">
										  					<a href="./chats.php">Mary</a>
										  				</h3>
												    	<small class="text-muted">
												    		<p class="card-text" id="user1" style="display: inline-flex;"></p>
												    	</small>
										  			</div>				
										  			<!--chat content-->		  		
											    	<div class="col-sm-10">
									    				<p class="card-text">I am Mary. Nice to meet you! Lorem ipsum dolor sit amet</p>
										  			</div>
										    	</div>
										    </div>
										    <!--End of New chats text part -->
									  	</div>
								  		<img class="rounded mx-auto d-block" alt="..." src="./images/chatterIcon.png" alt="Card image cap">
									</div>								
								</div>
								
							 	<!--End of chat 1-->

							    <!--chat 2-->
								<div class="card" style="margin-bottom: 10px;">
								  <div class="card-body">
								    <div class="row">
								      <div class="col-sm-2">
								        <img src="./images/userHead.png" alt="userHead2">
								      </div>              
								      <div class="col-sm-10">
								        <div class="row">
								          <!--Name and post time -->
								          <div class="col-sm-10">
								            <h3 class="card-title" style="display: inline-flex;">
								              <a href="./chats.php">Tom</a>
								            </h3>
								            <!--chat content-->
								            <small class="text-muted">
									    		<p class="card-text" id="user2" style="display: inline-flex;"></p>
									    	</small>
								          </div>                  
								          <div class="col-sm-10">
								            <p class="card-text">I am Tom. Nice to meet you! Lorem ipsum dolor sit amet</p>
								          </div>
								        </div>
								      </div>
								    </div>
								  </div>
								</div>
							  <!--End of chat 2-->

							  <!--chat 3-->
							  <div class="card" style="margin-bottom: 10px;">
											<div class="card-body">
											  	<div class="row">
											  		<div class="col-sm-2">
											  			<img src="./images/userHead.png" alt="userHead2">
											  		</div>	

												  	<div class="col-sm-10">
												  		<div class="row">							  			
												  			<div class="col-sm-10"><!--Name and post time -->
												  				<h3 class="card-title" style="display: inline-flex;">
												  					<a href="./chats.php">Steve</a>
												  				</h3>
													    		<small class="text-muted">
														    		<p class="card-text" id="user3" style="display: inline-flex;"></p>
														    	</small>
												  			</div>						  									  		
													    	<div class="col-sm-10">
											    				<p class="card-text">I am Steve. Nice to meet you! Lorem ipsum dolor sit amet</p><!--chat content-->
												  			</div>
												    	</div>
												    </div>
											  	</div>
											</div>
										</div>
							  <!--End of chat 3-->
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
  	<script type="text/javascript" src="./js/myScript.js"></script>
</body>
<footer>
	
</footer>
</html>