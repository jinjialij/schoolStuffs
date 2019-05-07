<?php

include_once './loginInfo.php';//load login function which store account of database

//a function that loads chats' contents determined by the userId value get by the $_GET
function loadChats($userId)
{
    //connect database
    $login=login();
    //connect database
    $conn=new mysqli($login[0],$login[1],$login[2],$login[3]);

    //check if the connection is successful
    if ($conn->connect_error){
        die ("Connection failed!".$conn->connect_error);
    }
    //sql query that get name, Date, and Post by join post and user table and order them by date in descending order and then oreder by name in ascending order
    $myquery="select UserID, Name, Date,Post from chat.posts join chat.user using (UserID) where UserID=".$userId." order by date desc,Name asc";
    $result = mysqli_query ($conn,$myquery);
    $chat= array();
    $irow=0;
    $icol=0;
    //return array which store the posts and related information
    if ($result = $conn->query($myquery)) {
        while($row=$result->fetch_assoc())
        {
            $chat[$irow][$icol]=$row['UserID'];
            $chat[$irow][$icol+1]=$row['Name'];
            $chat[$irow][$icol+2]=$row['Date'];
            $chat[$irow][$icol+3]=$row['Post'];
            $irow++;
        }
    }
    else {
        echo "Nothing here to display! Sorry!";
    }
    $conn->close();
    return $chat;
}

//load chats of people the account user following, by default the account user's id is 1
function loadMyFollowingChats()
{
    $userId=1;//the account id is 1 by default
    //connect database
    $login=login();
    //connect database
    $conn=new mysqli($login[0],$login[1],$login[2],$login[3]);

    //check if the connection is successful
    if ($conn->connect_error){
        die ("Connection failed!".$conn->connect_error);
    }
    //sql query that get post,name, and user ID by join a table which only contain following user's id with a table of posts(which contains names) and order it by date in descending order and then by name in ascending order
    $myquery="select UserID,Name,Date,Post from (SELECT FollowingUser FROM chat.following where User=".$userId." ) as t1 join (select * from chat.posts join user using (UserID)) as t2 on t1.FollowingUser=t2.UserID order by Date desc,Name asc";
    $result = mysqli_query ($conn,$myquery);
    $chat= array();
    $irow=0;
    $icol=0;
    //return array which store the following name list
    if ($result = $conn->query($myquery)) {
        while($row=$result->fetch_assoc())
        {
            $chat[$irow][$icol]=$row['UserID'];
            $chat[$irow][$icol+1]=$row['Name'];
            $chat[$irow][$icol+2]=$row['Date'];
            $chat[$irow][$icol+3]=$row['Post'];
            $irow++;
            $icol=0;
        }
    }
    else {
        echo "Nothing here to display! Sorry!";
    }
    $conn->close();
    return $chat;
}



//capture new chat and append it to myChats, return feedback:success return true;otherwise, return false
function myNewChats($newChatText)
{
    $feedback=false;
    if($newChatText!=null)//write file only if it is not null
    {
        date_default_timezone_set('America/Halifax');//set time zone
        $date = date_create();
        $dateTime = date("Y-m-d, H:i:s", time());
        //connect database
        $login=login();
        //connect database
        $conn=new mysqli($login[0],$login[1],$login[2],$login[3]);

        //check if the connection is successful
        if ($conn->connect_error){
            die ("Connection failed!".$conn->connect_error);
        }
        //sql query that inseart into the posts table with account user's id;by default the account user's id is 1
        $myquery="insert into posts values(null,1,'".$dateTime."','".$newChatText."')";
        //check if the query works
        if ($conn->query($myquery)==true) {
            $feedback=true;
        }
        $conn->close();
    }
    return $feedback;
}


//this function print user name according to its user id
function printAccountName($userId){
    $login=login();
    //connect database
    $conn=new mysqli($login[0],$login[1],$login[2],$login[3]);
    //check if the connection is successful
    if ($conn->connect_error){
        die ("Connection failed!".$conn->connect_error);
    }
    //sql query that retrive name from user table according to the user id
    $myquery="select name from chat.User where UserID=".$userId;//get user name according to its user id
    $result = mysqli_query ($conn,$myquery);
    //display content
    if ($result = $conn->query($myquery)) {
        while($row=$result->fetch_assoc())
        {
            $name=$row['name'];
        }
        echo $name;
    }
    else {
        echo "Nothing here to display! Sorry!";
    }

    $conn->close();
}

//this function print user's profile description according to user id
function printDesc($userId)//pass the value od user id
{
    $login=login();
    //connect database
    $conn=new mysqli($login[0],$login[1],$login[2],$login[3]);
    //check if the connection is successful
    if ($conn->connect_error){
        die ("Connection failed!".$conn->connect_error);
    }
    //sql query select profile of a user from the table user according to user id 
    $myquery="select profile from chat.User where UserID='".$userId."'";
    $result = mysqli_query ($conn,$myquery);
    //display content
    if ($result = $conn->query($myquery)) {
        while($row=$result->fetch_assoc())
        {
            echo $row['profile'];
        }
    }
    else {
        echo "Nothing here to display! Sorry!";
    }
    $conn->close();
}

//get following users' name according the account's user id
function getAllFollowingName($userId)
{
    //connect database
    $login=login();
    //connect database
    $conn=new mysqli($login[0],$login[1],$login[2],$login[3]);

    //check if the connection is successful
    if ($conn->connect_error){
        die ("Connection failed!".$conn->connect_error);
    }
    //sql query that get name,id from the a table that join by two tables. One only contains selected following user information and the other is the user table
    $myquery="select UserID,Name from (SELECT * FROM chat.following where User=".$userId.") as t1 join chat.user on t1.FollowingUser=user.UserID";
    //the followingnamelist is a view which join following and user tables
    $result = mysqli_query ($conn,$myquery);
    $nameList= array();
    $irow=0;
    $icol=0;
    //return array which store the following name list
    if ($result = $conn->query($myquery)) {
        while($row=$result->fetch_assoc())
        {
            $nameList[$irow][$icol]=$row["UserID"];
            $nameList[$irow][$icol+1]=$row["Name"];
            $irow++;
        }
    }
    else {
        echo "Nothing here to display! Sorry!";
    }
    $conn->close();
    return $nameList;
}

//get followers' name according the account's user id
function getAllFollowerName($userId)
{
    //connect database
    $login=login();
    //connect database
    $conn=new mysqli($login[0],$login[1],$login[2],$login[3]);

    //check if the connection is successful
    if ($conn->connect_error){
        die ("Connection failed!".$conn->connect_error);
    }
    //sql query that get followers' name from a selected following table which contains only followers' information and join user table
    $myquery="select UserID,Name from (SELECT * FROM chat.following WHERE FollowingUser=".$userId.") as t1 join user on t1.User=user.UserID";
    $result = mysqli_query ($conn,$myquery);
    $nameList= array();
    $irow=0;
    $icol=0;
    //return array which store the following name list
    if ($result = $conn->query($myquery)) {
        while($row=$result->fetch_assoc())
        {
            $nameList[$irow][$icol]=$row["UserID"];
            $nameList[$irow][$icol+1]=$row["Name"];
            $irow++;
        }
    }
    else {
        echo "Nothing here to display! Sorry!";
    }
    $conn->close();
    return $nameList;
}

// a function that return number of posted chats, following, followers according to the user id
function padNum($userId)
{
    $count=array();//int which holds the number of chats,following,followers
    $login=login();
    //connect database
    $conn=new mysqli($login[0],$login[1],$login[2],$login[3]);
    //check if the connection is successful
    if ($conn->connect_error){
        die ("Connection failed!".$conn->connect_error);
    }
    //sql queries
    $chatNum="SELECT count(UserID) as numOfChats FROM chat.posts WHERE UserID=".$userId;//count number of my posted chat
    $followingNum="SELECT count(User) as numOfFollowing FROM chat.following where User=".$userId;//count number of user I am following
    $followerNum="SELECT count(User) as numOfFollower FROM chat.following WHERE FollowingUser=".$userId;//count number of followers
    $result = mysqli_query ($conn,$chatNum);
    //display content
    if ($result = $conn->query($chatNum)) {
        while($row=$result->fetch_assoc())
        {
            $count[0]=$row['numOfChats'];
        }
    }
    else {
        $count[0]="Error";
    }
    $result2 = mysqli_query ($conn,$followingNum);
    //display content of following number
    if ($result = $conn->query($followingNum)) {
        while($row=$result->fetch_assoc())
        {
            $count[1]=$row['numOfFollowing'];
        }
    }
    else {
        $count[1]="Error";
    }
    $result3 = mysqli_query ($conn,$followerNum);
    //display content of follower number
    if ($result = $conn->query($followerNum)) {
        while($row=$result->fetch_assoc())
        {
            $count[2]=$row['numOfFollower'];
        }
    }
    else {
        $count[2]="Error";
    }

    $conn->close();
    return $count;
}

//a function that search a keyword and return an array which contains results. All keywords in results are bolded 
function search($searchText)//take in a keyword variable
{
    $searchResult=array();// an array which contain search results
    if ($searchText!=null)//if keyword is not empty
    {
        $userId=1;//by default the account's user id is 1
        //connect database
        $login=login();
        //connect database
        $conn=new mysqli($login[0],$login[1],$login[2],$login[3]);

        //check if the connection is successful
        if ($conn->connect_error){
            die ("Connection failed!".$conn->connect_error);
        }
        //sql query that get post (including the account holder, his/her followers, his/her followings)
        $myquery="select * from (select UserID,Name,Date,Post from (select UserID,Name, Date,Post from chat.posts join chat.user using (UserID)) as t1 left join (select FollowingUser from following where User=".$userId.") as t2 on t1.UserId=t2.FollowingUser left join (select User from following where FollowingUser=".$userId.") as t3 on t1.UserId=t3.User where UserId=".$userId." or FollowingUser is not null or User is not null order by Date desc,Name asc ) as t4 where Name like \"%".$searchText."%\" or Date like \"%".$searchText."%\" or Post like \"%".$searchText."%\" order by Date desc,Name asc";
        $result = mysqli_query ($conn,$myquery);
        $irow=0;
        $icol=0;
        //return array which store the following name list
        if ($result = $conn->query($myquery)) {
            while($row=$result->fetch_assoc())
            {
                $searchResult[$irow][$icol]=$row['UserID'];
                $searchResult[$irow][$icol+1]=$row['Name'];
                $searchResult[$irow][$icol+2]=$row['Date'];
                $searchResult[$irow][$icol+3]=$row['Post'];
                $irow++;
            }
        }
        else {
            echo "Nothing here to display! Sorry!";
        }
        $conn->close();
    }
    //to deal with search result: bold the keyword
    $replaceCon='<span><strong>' . $searchText . '</strong></span>';//replace content of the bold search keyword
    $bold=array();// an array which store bolded results
    $row=0;
    //to bold search keyword and store it in array
    foreach ($searchResult as $item) {
        $bold[$row][0]=$item[0];
        $bold[$row][1]=str_ireplace($searchText,$replaceCon,$item[1]);
        $bold[$row][2]=str_ireplace($searchText,$replaceCon,$item[2]);
        $bold[$row][3]=str_ireplace($searchText,$replaceCon,$item[3]);
        $row++;
    }
    return $bold;
}

