<?php
$fullname = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['msg'];
mail($email,$fullname,$message);
?>