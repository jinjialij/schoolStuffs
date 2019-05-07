<?php
/**
 * Created by PhpStorm.
 * User: jl
 * Date: 2019/3/20
 * Time: 22:48
 */
/**
 * Created by PhpStorm.
 * User: jl
 * Date: 2019/3/20
 * Time: 21:24
 */
//check and display errors
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
//include_once './includes/myFunctions2.php';//load functions
date_default_timezone_set('America/Halifax');//set time zone

include_once './myFunctions.php';//load functions
$login = login();
//connect database
$conn = new mysqli($login[0], $login[1], $login[2], $login[3]);

//check if the connection is successful
if ($conn->connect_error) {
    die ("Connection failed!" . $conn->connect_error);
}
$myquery="select * from `course`";
$result = mysqli_query ($conn,$myquery);

/* Get the number of rows */


//return array which store the posts and related information
/*
if ($result = $conn->query($myquery)) {
    while($row=$result->fetch_assoc()){
        foreach ($row as $value) {
            echo "<p>$value </p>";
        }
    }
}*/

/* Get the number of rows */
$content= array();
$irow=0;
$icol=0;
//return array which store the posts and related information
if ($result = $conn->query($myquery)) {
    while($row=$result->fetch_assoc()){
            $content[$irow][$icol]=$row['courseCode'];
            $content[$irow][$icol+1]=$row['courseTitle'];
            $content[$irow][$icol+2]=$row['prerequisites'];
            $content[$irow][$icol+3]=$row['creditHrs'];
            $content[$irow][$icol+3]=$row['program'];
            $irow++;
    }
}
else {
    echo "Nothing here to display! Sorry!";
}

foreach ( $content as $var ) {
    echo "\n", $var[0], "\t\t", $var[1],"<br>";
}

$conn->close();