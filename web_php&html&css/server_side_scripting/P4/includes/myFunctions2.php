<?php

include_once './loginInfo.php';//load login function which store account of database

//a function that loads chats' contents determined by the userId value get by the $_GET
function loadChats($userId)
{
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
    //sql query that get name, Date, and Post by join post and user table and order them by date in descending order and then oreder by name in ascending order
    $stmt = $conn->prepare("select UserID, Name, Date,Post from posts join user using (UserID) where UserID= ? order by date desc,Name asc");
    $stmt->bind_param("i", $userId);
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
    }

    /* free results */
    $stmt->free_result();
    $stmt->close();
    $conn->close();
    return $chat;
}

//load chats of people the account user following
function loadMyFollowingChats($userId)
{
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
    $stmt->bind_param("i", $userId);
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
    }

    /* free results */
    $stmt->free_result();
    $stmt->close();
    $conn->close();
    return $chat;
}



//capture new chat and append it to myChats, return feedback:success return true;otherwise, return false
function myNewChats($newChatText,$userID)
{
    $feedback=false;
    if($newChatText!=null)//write file only if it is not null
    {
        date_default_timezone_set('America/Halifax');//set time zone
        $date = date_create();
        $dateTime = date("Y-m-d, H:i:s", time());
        echo "<br>".$dateTime."<br>";
        //connect database
        $login=login();
        //connect database
        $conn=new mysqli($login[0],$login[1],$login[2],$login[3]);

        //check if the connection is successful
        if ($conn->connect_error){
            die ("Connection failed!".$conn->connect_error);
        }
        //sql query that inseart into the posts table with account user's id;by default the account user's id is 1


        // prepare and bind
        $stmt = $conn->prepare("insert into posts values(null,?,?,?)");
        $stmt->bind_param("iss", $userID,$dateTime,$newChatText);
        if ($stmt->execute()) {
            // it worked
        } else {// it didn't
            echo "the new chat failed";
        }
        $stmt->close();
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
    // prepare and bind
    $stmt = $conn->prepare("select name from User where UserID=? ");
    $stmt->bind_param("i", $userId);
    $stmt->execute();


    /* Store the result (to get properties) */
    $stmt->store_result();

    /* Get the number of rows */
    $num_of_rows = $stmt->num_rows;
    if ($num_of_rows!=0)
    {
        /* Bind the result to variables */
        $stmt->bind_result($Name);
        while ($stmt->fetch()) {
            echo $Name;
        }

    }
    else
        echo "No result";

    /* free results */
    $stmt->free_result();
    $stmt->close();
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
    // prepare and bind
    $stmt = $conn->prepare("select profile from User where UserID=?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();


    /* Store the result (to get properties) */
    $stmt->store_result();

    /* Get the number of rows */
    $num_of_rows = $stmt->num_rows;
    if ($num_of_rows!=0)
    {
        /* Bind the result to variables */
        $stmt->bind_result($profile);
        while ($stmt->fetch()) {
            echo $profile;
        }

    }
    else
        echo "No result";

    /* free results */
    $stmt->free_result();
    $stmt->close();
    $conn->close();
}

//get following users' name and id according the account's user id
function getAllFollowingName($userId)
{
    $nameList= array();
    $irow=0;
    $icol=0;
    //connect database
    $login=login();
    //connect database
    $conn=new mysqli($login[0],$login[1],$login[2],$login[3]);

    //check if the connection is successful
    if ($conn->connect_error){
        die ("Connection failed!".$conn->connect_error);
    }

    //sql query that get name,id from the a table that join by two tables. One only contains selected following user information and the other is the user table
    // prepare and bind
    $stmt = $conn->prepare("select UserID,Name from (SELECT * FROM following where User = ? ) as t1 join user on t1.FollowingUser=user.UserID");
    $stmt->bind_param("i", $userId);
    $stmt->execute();


    /* Store the result (to get properties) */
    $stmt->store_result();

    /* Get the number of rows */
    $num_of_rows = $stmt->num_rows;
    if ($num_of_rows!=0)
    {
        /* Bind the result to variables */
        $stmt->bind_result($ID,$name);
        while ($stmt->fetch()) {
            $nameList[$irow][$icol]=$ID;
            $nameList[$irow][$icol+1]=$name;
            $irow++;
        }

    }

    /* free results */
    $stmt->free_result();
    $stmt->close();

    $conn->close();
    return $nameList;
}

//get followers' name and id according the account's user id
function getAllFollowerName($userId)
{
    $nameList= array();
    $irow=0;
    $icol=0;
    //connect database
    $login=login();
    //connect database
    $conn=new mysqli($login[0],$login[1],$login[2],$login[3]);

    //check if the connection is successful
    if ($conn->connect_error){
        die ("Connection failed!".$conn->connect_error);
    }
    //sql query that get followers' name from a selected following table which contains only followers' information and join user table
    // prepare and bind
    $stmt = $conn->prepare("select UserID,Name from (SELECT * FROM following WHERE FollowingUser=?) as t1 join user on t1.User=user.UserID");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    /* Store the result (to get properties) */
    $stmt->store_result();

    /* Get the number of rows */
    $num_of_rows = $stmt->num_rows;
    if ($num_of_rows!=0)
    {
        /* Bind the result to variables */
        $stmt->bind_result($ID,$name);
        while ($stmt->fetch()) {
            $nameList[$irow][$icol]=$ID;
            $nameList[$irow][$icol+1]=$name;
            $irow++;
        }
    }

    /* free results */
    $stmt->free_result();
    $stmt->close();
    $conn->close();
    return $nameList;
}


//a function that return number of chats
function chatNum($userId)
{
    $numOfChats=0;
    $login=login();
    //connect database
    $conn=new mysqli($login[0],$login[1],$login[2],$login[3]);
    //check if the connection is successful
    if ($conn->connect_error){
        die ("Connection failed!".$conn->connect_error);
    }
    //sql queries
    $stmt = $conn->prepare("SELECT count(UserID) as numOfChats FROM posts WHERE UserID=?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    /* Store the result (to get properties) */
    $stmt->store_result();

    /* Get the number of rows */
    $num_of_rows = $stmt->num_rows;
    if ($num_of_rows!=0)
    {
        /* Bind the result to variables */
        $stmt->bind_result($numChats);

        while ($stmt->fetch()) {
            $numOfChats = $numChats;
        }
    }
    else
        echo "No result";

    /* free results */
    $stmt->free_result();
    $stmt->close();
    $conn->close();
    return $numOfChats;
}

//a function that return number of following
function followingNum($userId)
{
    $numFollowing=0;
    $login=login();
    //connect database
    $conn=new mysqli($login[0],$login[1],$login[2],$login[3]);
    //check if the connection is successful
    if ($conn->connect_error){
        die ("Connection failed!".$conn->connect_error);
    }
    //sql query count the number of following users
    $stmt = $conn->prepare("SELECT count(User) as numOfFollowing FROM following where User=?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    /* Store the result (to get properties) */
    $stmt->store_result();

    /* Get the number of rows */
    $num_of_rows = $stmt->num_rows;
    if ($num_of_rows!=0)
    {
        /* Bind the result to variables */
        $stmt->bind_result($numF);

        while ($stmt->fetch()) {
            $numFollowing = $numF;
        }
    }
    else
        echo "No result";

    /* free results */
    $stmt->free_result();
    $stmt->close();
    $conn->close();
    return $numFollowing;
}

//a function that return number of following
function followerNum($userId)
{
    $numFollower=0;
    $login=login();
    //connect database
    $conn=new mysqli($login[0],$login[1],$login[2],$login[3]);
    //check if the connection is successful
    if ($conn->connect_error){
        die ("Connection failed!".$conn->connect_error);
    }
    //sql query count the number of followers
    $stmt = $conn->prepare("SELECT count(User) as numOfFollower FROM following WHERE FollowingUser=?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    /* Store the result (to get properties) */
    $stmt->store_result();

    /* Get the number of rows */
    $num_of_rows = $stmt->num_rows;
    if ($num_of_rows!=0)
    {
        /* Bind the result to variables */
        $stmt->bind_result($numF);

        while ($stmt->fetch()) {
            $numFollower = $numF;
        }
    }
    else
        echo "No result";

    /* free results */
    $stmt->free_result();
    $stmt->close();
    $conn->close();
    return $numFollower;
}



//a function that search a keyword and return an array which contains results. All keywords in results are bolded 
function search($searchText,$userId)//take in a keyword variable
{
    $searchResult=array();// an array which contain search results
    if ($searchText!=null)//if keyword is not empty
    {

        //connect database
        $login=login();
        //connect database
        $conn=new mysqli($login[0],$login[1],$login[2],$login[3]);

        //check if the connection is successful
        if ($conn->connect_error){
            die ("Connection failed!".$conn->connect_error);
        }


        //connect database
        $login=login();
        //connect database
        $conn=new mysqli($login[0],$login[1],$login[2],$login[3]);

        //check if the connection is successful
        if ($conn->connect_error){
            die ("Connection failed!".$conn->connect_error);
        }
        // prepare and bind
        //sql query that get post (including the account holder, his/her followers, his/her followings)
        $var = "%" . $searchText . "%";
        $stmt = $conn->prepare("select * from (select UserID,Name,Date,Post from (select UserID,Name, Date,Post from posts join user using (UserID)) as t1 left join (select FollowingUser from following where User= ? ) as t2 on t1.UserId=t2.FollowingUser left join (select User from following where FollowingUser= ? ) as t3 on t1.UserId=t3.User where UserId= ? or FollowingUser is not null or User is not null order by Date desc,Name asc ) as t4 where Name like ? or Date like ? or Post like ? order by Date desc,Name asc");
        $stmt->bind_param("iiisss", $userId,$userId,$userId,$var,$var,$var);
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
                $searchResult[$irow][$icol]=$UserID;
                $searchResult[$irow][$icol+1]=$Name;
                $searchResult[$irow][$icol+2]=$Date;
                $searchResult[$irow][$icol+3]=$Post;
                $irow++;
            }
        }
        else
            echo "No result";

        /* free results */
        $stmt->free_result();
        $stmt->close();
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

//check if the username exists in database
function checkName($name)
{
    $count=-1;
    //connect database
    $login=login();
    //connect database
    $conn=new mysqli($login[0],$login[1],$login[2],$login[3]);

    //check if the connection is successful
    if ($conn->connect_error){
        die ("Connection failed!".$conn->connect_error);
    }
    //sql query that return result of the same user name
    $stmt = $conn->prepare("select count(username) from login where username=?");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    /* Store the result (to get properties) */
    $stmt->store_result();

    /* Get the number of rows */
    $num_of_rows = $stmt->num_rows;
    if ($num_of_rows!=0)
    {
        /* Bind the result to variables */
        $stmt->bind_result($num);

        while ($stmt->fetch()) {
            $count = $num;
        }
    }

    /* free results */
    $stmt->free_result();
    $stmt->close();
    $conn->close();
    if ($count != 0)
        return true;//the username already exists in database
    else
        return false;
}

//add new(temp) user info into database
function addNewUser($name)
{
    //connect database
    $login=login();
    //connect database
    $conn=new mysqli($login[0],$login[1],$login[2],$login[3]);

    //check if the connection is successful
    if ($conn->connect_error){
        die ("Connection failed!".$conn->connect_error);
    }
    // prepare and bind
    $stmt = $conn->prepare("insert into User values(null,?,?)");//add new user in user table with username, update later
    $stmt->bind_param("ss", $name,$name);
    if ($stmt->execute()) {
        // it worked
    } else {// it didn't
        echo "Add new user failed";
    }
    $stmt->close();
    $conn->close();
}

//get userid from User
function getUserID($name)
{
    $userid=0;
    //connect database
    $login=login();
    //connect database
    $conn=new mysqli($login[0],$login[1],$login[2],$login[3]);

    //check if the connection is successful
    if ($conn->connect_error){
        die ("Connection failed!".$conn->connect_error);
    }
    //sql query that return result according to user name
    // prepare and bind
    $stmt = $conn->prepare("select UserID from User where Name=?");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    /* Store the result (to get properties) */
    $stmt->store_result();
    /* Get the number of rows */
    $num_of_rows = $stmt->num_rows;
    if ($num_of_rows!=0)
    {
        /* Bind the result to variables */
        $stmt->bind_result($id);
        while ($stmt->fetch()) {
            $userid = $id;
        }
    }
    else
        echo "No result";
    $stmt->close();
    $conn->close();
    return $userid;
}

//insert new user info into login table
function addLogin($userID,$name,$password)
{
    //connect database
    $login=login();
    //connect database
    $conn=new mysqli($login[0],$login[1],$login[2],$login[3]);

    //check if the connection is successful
    if ($conn->connect_error){
        die ("Connection failed!".$conn->connect_error);
    }
    // prepare and bind
    $stmt = $conn->prepare("insert into login values(null,?,?,?)");//add new user in user table with username, update later
    $stmt->bind_param("iss", $userID,$name,$password);
    if ($stmt->execute()) {
        // it worked
    } else {// it didn't
        echo "Error";
    }
    $stmt->close();
    $conn->close();
}


//handle input form data
function valid($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}




//check if inputted name and password match and return results:userid,name,error info
function loginCheck($name,$pw){
    $check=array();
    $check[0]=-1;//default id
    $check[1]=null;//default name
    $check[2]=null;//default error
    //connect database
    $login=login();
    //connect database
    $conn=new mysqli($login[0],$login[1],$login[2],$login[3]);

    //check if the connection is successful
    if ($conn->connect_error){
        die ("Connection failed!".$conn->connect_error);
    }

    //sql query that return results according to user name and password
    $stmt = $conn->prepare("select userID,username from login where username= ? and password=? ");
    $stmt->bind_param("ss", $name,$pw);
    $stmt->execute();
    /* Store the result (to get properties) */
    $stmt->store_result();
    /* Get the number of rows */
    $num_of_rows = $stmt->num_rows;
    if ($num_of_rows!=0)//has a result
    {
        /* Bind the result to variables */
        $stmt->bind_result($id,$uname);
        while ($stmt->fetch()) {
            $check[0] = $id;
            $check[1] =$uname;
        }
    }
    else
    {
        $check[2]="The password is incorrect";
    }
    $stmt->close();
    $conn->close();
    return $check;
}


//return the value of user's full name from database
function name($userID)
{
    $fullname="";
    $login=login();
    //connect database
    $conn=new mysqli($login[0],$login[1],$login[2],$login[3]);
    //check if the connection is successful
    if ($conn->connect_error){
        die ("Connection failed!".$conn->connect_error);
    }
    //sql query that get name according to the userid
    $stmt = $conn->prepare("select Name from user where UserID=?");
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    /* Store the result (to get properties) */
    $stmt->store_result();

    /* Get the number of rows */
    $num_of_rows = $stmt->num_rows;
    if ($num_of_rows!=0)
    {
        /* Bind the result to variables */
        $stmt->bind_result($name);

        while ($stmt->fetch()) {
            $fullname = $name;
        }
    }
    else
        echo "No result for name";

    /* free results */
    $stmt->free_result();
    $stmt->close();
    $conn->close();
    return $fullname;


}

//update profile of the user table
function addProfile($fn,$ln,$profile,$id)
{
    $fullname=$fn." ".$ln;
    //connect database
    $login=login();
    //connect database
    $conn=new mysqli($login[0],$login[1],$login[2],$login[3]);

    //check if the connection is successful
    if ($conn->connect_error){
        die ("Connection failed!".$conn->connect_error);
    }
    // prepare and bind
    // update profile and user's full name
    $stmt = $conn->prepare("update user set Name=?, Profile=? where UserID=?");
    $stmt->bind_param("ssi", $fullname,$profile,$id);
    if ($stmt->execute()) {
        // it worked
    } else {// it didn't
        echo "Error";
    }
    $stmt->close();
    $conn->close();

}

//get all users' name and profile except the user himself
function otherUsers($userID)
{
    $index=0;
    $userInfo=array();
    //connect database
    $login=login();
    //connect database
    $conn=new mysqli($login[0],$login[1],$login[2],$login[3]);

    //check if the connection is successful
    if ($conn->connect_error){
        die ("Connection failed!".$conn->connect_error);
    }

    // prepare and bind
    //sql query that return result of other user's info except the user's
    $stmt = $conn->prepare("select * from user where UserID!=?  order by name asc");//get all other users' info in alphabetical ascending order
    $stmt->bind_param("i", $userID);
    $stmt->execute();


    /* Store the result (to get properties) */
    $stmt->store_result();

    /* Get the number of rows */
    $num_of_rows = $stmt->num_rows;
    if ($num_of_rows!=0)
    {
        /* Bind the result to variables */
        $stmt->bind_result($ID,$name,$profile);
        while ($stmt->fetch()) {
            $userInfo[$index][0]=$ID;
            $userInfo[$index][1]=$name;
            $userInfo[$index][2]=$profile;
            $index++;
        }

    }
    else
        echo "No result for users";

    /* free results */
    $stmt->free_result();
    $stmt->close();

    $conn->close();
    return $userInfo;
}

//change following and follow users
function newFollow($userID, $followID)
{
    //connect database
    $login=login();
    //connect database
    $conn=new mysqli($login[0],$login[1],$login[2],$login[3]);

    //check if the connection is successful
    if ($conn->connect_error){
        die ("Connection failed!".$conn->connect_error);
    }
    // prepare and bind
    //sql query that insert following values
    $stmt = $conn->prepare("insert into following values(null,?,?)");
    $stmt->bind_param("ii", $userID,$followID);
    if ($stmt->execute()) {
        // it worked
    } else {// it didn't
        echo "Error";
    }
    $stmt->close();
    $conn->close();
}


function containFollowing($array,$userId)
{
    $result=false;
    foreach ($array as $v1)
    {
        if($userId==$v1[0])
        {
            $result=true;
            return $result;
        }
    }

    return $result;
}