<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
include_once './includes/myFunctions2.php';//load functions
date_default_timezone_set('America/Halifax');//set time zone
header("Access-Control_Allow-Origin: *"); //required header allows request from any origins with wildcard *
header("Content-Type: application/json; charset=UTF-8"); //set response content to JSON
$accountId=$_GET['id'];
//create connection to database
$chat= array();
//connect database
$login=login();
//connect database
$conn=new mysqli($login[0],$login[1],$login[2],$login[3]);

//check if the connection is successful
if ($conn->connect_error){
    die ("Connection failed!".$conn->connect_error);
}
// prepare and bind
//sql query that get post,name, and user ID by join a table which only contain following user's id with a table of posts(which contains names) and order it by date in descending order and then by name in ascending order
$stmt = $conn->prepare("select UserID,Name,Date,Post from (SELECT FollowingUser FROM following where User=? ) as t1 join (select * from posts join user using (UserID)) as t2 on t1.FollowingUser=t2.UserID order by Date desc,Name asc");
$stmt->bind_param("i", $accountId);
$stmt->execute();
/* Store the result (to get properties) */
$stmt->store_result();

/* Get the number of rows */
$num_of_rows = $stmt->num_rows;
if ($num_of_rows!=0)
{
    /* Bind the result to variables */
    $stmt->bind_result($UserID, $Name, $Date,$Post);
    $irow=0;
    $icol=0;
    while ($stmt->fetch()) {
        $chat[$irow][$icol]=$UserID;
        $chat[$irow][$icol+1]=$Name;
        $chat[$irow][$icol+2]=$Date;
        $chat[$irow][$icol+3]=$Post;
        $irow++;
    }
    echo json_encode($chat);

}
else
    echo "Nothing to display";

/* free results */
$stmt->free_result();
$stmt->close();
$conn->close();


