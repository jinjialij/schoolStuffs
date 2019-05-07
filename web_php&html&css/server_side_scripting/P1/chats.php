<!DOCTYPE html>
<html>
<head>
	<title>Chats</title>
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
		      <li class="nav-item active"><a class="nav-link active" href="./chats.php" style="color: white;font-size: 1em;">MyChats<span class="sr-only">(current)</span></a></li>
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
		<div class="container-fluid" style="background-color: #91C9E8;padding: 20px;">
		  <div class="row" >			    
			<div class="col-sm-3">
				<img class="rounded-circle mx-auto d-block" src="./images/owl.png" width="172px height=175px alt="my picture" class="rounded-circle" style="border:1px solid black;background-color:#3399CC;">
			</div>
			<div class="col-sm-3" style="display: inline-block;">
				<h1 class="text-center" style="color:white;font-size:3.5em;margin-top:18%;">Jiali Jin</h1>
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
					<div class="col-sm-3" style="margin-top: 10px;background-color: #E8F8FF;padding: 10px;">
						<!--Start of left container-->
						
						<div class="media">
							<div class="media-body">
								<div class="container" style="margin-top:20px;margin-bottom: 20px;">
									<!--desciption-->
									<div class="list-group-item list-group-item-action flex-column align-items-start">
								    	<p class="mb-1">A short descrption<br>I am a student of Dalhousie. My email is jl@dal.ca<br>Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
								    </div>
									<ul class="list-group">
									  <li class="list-group-item d-flex justify-content-between align-items-center">
									  	<a href="./chats.php">Chats</a>
									    <span class="badge badge-light">436</span>
									  </li>
									  <li class="list-group-item d-flex justify-content-between align-items-center">
									  	<a href="./follow.php">Following</a>
									    <span class="badge badge-light">6</span>
									  </li>
									  <li class="list-group-item d-flex justify-content-between align-items-center">
									  	<a href="./follow.php">Followers</a>
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
							<div class="row" style="padding: 5px;">
								<form class="form-inline" style="width: 100%;">	
										<img src="./images/owl.png" alt="Owl" style="margin-right: 10px;height: 40px">
										<input class="form-control" type="text" placeholder="Chit Chat..." style="height:40px;width: 90%;" >	
									</div>							
								</form>
							</div>
							<!--End of chat pad-->
							<div class="container-fluid">
							<!--Start of list of chats-->					
								<div class="list-group" style="background-color: #E8F8FF;width: 95%; ">
									<h2>My Chats</h2>
								  	<div class="list-group">
								  	  <!--chat 1-->
									  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
									    <div class="d-flex w-100 justify-content-between">						      
									      <small class="text-muted">
								    		<h3 class="card-text" id="chat1" style="display: inline-flex;"></h3>
								    	  </small>
									    </div>
									    <p class="mb-1">Morbi purus est, bibendum at pulvinar eget, tempus sed tortor. In tincidunt elementum ornare. Donec nulla massa, ultricies vel lorem quis, consectetur interdum felis.
										</p>						    
									  </a>

									  <!--chat 2-->
									  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
									    <div class="d-flex w-100 justify-content-between">						      
									      <small class="text-muted">
								    		<h3 class="card-text" id="chat2" style="display: inline-flex;"></h3>
								    	  </small>
									    </div>
									    <p class="mb-1">Sed suscipit lacus a orci vestibulum, id varius neque pellentesque. Proin luctus sodales odio, in commodo velit euismod a. Integer dolor velit, condimentum in ipsum sed, venenatis faucibus ligula. Mauris lobortis iaculis commodo. </p>
									    <img src="./images/chatterIcon.png" class="img-fluid" alt="Chat images">
									  </a>

									  <!--chat 3-->
									  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
									    <div class="d-flex w-100 justify-content-between">						      
									      <small class="text-muted">
								    		<h3 class="card-text" id="chat3" style="display: inline-flex;"></h3>
								    	  </small>
									    </div>
									    <p class="mb-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac metus nec est tempor tempor sit amet non justo. Duis molestie enim id rutrum eleifend.</p>						    
									  </a>
									</div>
								</div>
								<!--End of list of chats-->
							 </div>
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