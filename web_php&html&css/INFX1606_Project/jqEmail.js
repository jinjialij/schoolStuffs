$(document).ready(function(){
	$("#contact_form").submit(function() {
		var msg=$('#msg').val();
		var name=$('#fullname').val();
		var email=$('#email').val();
		var varData ='fullname='+name+'&email='+email+'&message='+msg;
		console.log(varData);
		$.ajax({
		        type: "POST",
		        url: "./mailtome.php",
		        data: varData,
		        complete: function() {
		            alert("Message has been sent successfully!");
		        }
		 });
	});
});
