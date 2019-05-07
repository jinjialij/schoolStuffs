function alertMe(){
	alert("Message submitted");
	var x=document.getElementById("contact_form");
	x.reset();
}

window.onmousedown=function(){
	if(window.event){
		if (event.button==2){
			alert("The right mouse is disabled！");
			return false;
		}
	}
}

