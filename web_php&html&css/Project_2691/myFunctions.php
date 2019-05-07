<?php
/**
 * Created by PhpStorm.
 * User: jl
 * Date: 2019/3/20
 * Time: 21:35
 */
include_once './loginInfo.php';

function loadCourse()
{
//connect database
    $login = login();
//connect database
    $conn = new mysqli($login[0], $login[1], $login[2], $login[3]);

//check if the connection is successful
    if ($conn->connect_error) {
        die ("Connection failed!" . $conn->connect_error);
    }
    $myquery="select * from `course`";
    //$myquery="select courseCode, courseTitle,prerequisites,creditHrs,programs from `course`";
    $result = mysqli_query ($conn,$myquery);

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
            $content[$irow][$icol+4]=$row['program'];
            $irow++;
        }
    }
    else {
        echo "Nothing here to display! Sorry!";
    }
    $conn->close();
    return $content;
}

function loadCourseShort()
{
//connect database
    $login = login();
//connect database
    $conn = new mysqli($login[0], $login[1], $login[2], $login[3]);

//check if the connection is successful
    if ($conn->connect_error) {
        die ("Connection failed!" . $conn->connect_error);
    }
    $myquery="SELECT courseCode,courseTitle FROM cmaps.course where program like \"%HPRO%\";";
    //$myquery="select courseCode, courseTitle,prerequisites,creditHrs,programs from `course`";
    $result = mysqli_query ($conn,$myquery);

    /* Get the number of rows */
    $content= array();
    $irow=0;
    $icol=0;
    //return array which store the posts and related information
    if ($result = $conn->query($myquery)) {
        while($row=$result->fetch_assoc()){
            $content[$irow][$icol]=$row['courseCode'];
            $content[$irow][$icol+1]=$row['courseTitle'];
            $irow++;
        }
    }
    else {
        echo "Nothing here to display! Sorry!";
    }
    $conn->close();
    return $content;
}

