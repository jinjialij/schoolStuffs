<?php
/**
 * Created by PhpStorm.
 * User: J-JL
 * Date: 2018/10/11
 * Time: 10:58
 */
//load chats functions:
//load all my chats
function loadMyChats()
{
    $myChat = "./myChat.txt";
    $myChatsLines=file($myChat);
    $mCLength =count($myChatsLines);
    $myChats =array();
    if($mCLength!=0)//while the file is not empty
    {
        $lines=1;
        while($lines<$mCLength)//while not get to the end of the myChatLines array
        {
            for ($row=0;$row<(($mCLength-1)/4);$row++)//load name,time,timestamp, and text into a multidimensional array
            {
                $myChats[$row][0]=$myChatsLines[0];//name
                $myChats[$row][1]=$myChatsLines[$lines];//time
                $myChats[$row][2]=$myChatsLines[$lines+1];//timestamp
                $myChats[$row][3]=$myChatsLines[$lines+2];//text
                $lines+=4;
            }
        }
    }
    array_multisort(array_column($myChats, 2),SORT_DESC, $myChats);//sort array by time stamp by the desc order
    return $myChats;
}


//load all following users' chats
function loadFollowingChats()
{
    $user1File = "./userChats/Marty_Fly_chats.txt";
    $user1Lines = file($user1File);
    $user2File = "./userChats/Ty_Lysa_chats.txt";
    $user2Lines = file($user2File);
    $user3File = "./userChats/Luke_Empire_chats.txt";
    $user3Lines = file($user3File);

    $chats = array(
        array($user1Lines[0], $user1Lines[1], $user1Lines[4], $user1Lines[5]),//Marty's Chats into array: name time timestamp text
        array($user1Lines[0], $user1Lines[7], $user1Lines[8], $user1Lines[9]),
        array($user1Lines[0], $user1Lines[11], $user1Lines[12], $user1Lines[13]),

        //user2 chats arrays
        array($user2Lines[0], $user2Lines[1], $user2Lines[4], $user2Lines[5]),//Ty Lyse's Chats into array: name time timestamp text
        array($user2Lines[0], $user2Lines[7], $user2Lines[8], $user2Lines[9]),
        array($user2Lines[0], $user2Lines[11], $user2Lines[12], $user2Lines[13]),

        //user3 chats arrays
        array($user3Lines[0], $user3Lines[1], $user3Lines[2], $user3Lines[3]),//load Luke Empire's Chats into array: name time timestamp text
        array($user3Lines[0], $user3Lines[5], $user3Lines[6], $user3Lines[7]),
        array($user3Lines[0], $user3Lines[9], $user3Lines[10], $user3Lines[11]),
    );
    array_multisort(array_column($chats, 2),SORT_DESC, $chats);
    return $chats;
}


//load Marty's Chats
function loadMartyChats()
{
    $user1File = "./userChats/Marty_Fly_chats.txt";//user1
    $user1Lines = file($user1File);
    $chats = array(
        array($user1Lines[0], $user1Lines[1], $user1Lines[4], $user1Lines[5]),//Marty's Chats into array: name time timestamp text
        array($user1Lines[0], $user1Lines[7], $user1Lines[8], $user1Lines[9]),
        array($user1Lines[0], $user1Lines[11], $user1Lines[12], $user1Lines[13]),
    );
    sortByTimeStamp($chats);array_multisort(array_column($chats, 2),SORT_DESC, $chats);
    return $chats;
}


//load Ty Lyse's Chats
function loadTyChats()
{
    $user2File = "./userChats/Ty_Lysa_chats.txt";
    $user2Lines = file($user2File);
    $chats = array(
        array($user2Lines[0], $user2Lines[1], $user2Lines[4], $user2Lines[5]),//Ty Lyse's Chats into array: name time timestamp text
        array($user2Lines[0], $user2Lines[7], $user2Lines[8], $user2Lines[9]),
        array($user2Lines[0], $user2Lines[11], $user2Lines[12], $user2Lines[13]),
    );
    array_multisort(array_column($chats, 2),SORT_DESC, $chats);
    return $chats;
}


//load Luke Empire's Chats
function loadLukeChats()
{
    $user3File = "./userChats/Luke_Empire_chats.txt";
    $user3Lines = file($user3File);
    $chats = array(
        array($user3Lines[0], $user3Lines[1], $user3Lines[2], $user3Lines[3]),//load Luke Empire's Chats into array: name time timestamp text
        array($user3Lines[0], $user3Lines[5], $user3Lines[6], $user3Lines[7]),
        array($user3Lines[0], $user3Lines[9], $user3Lines[10], $user3Lines[11]),
        array($user3Lines[0], $user3Lines[13], $user3Lines[14], $user3Lines[15]),
    );
    array_multisort(array_column($chats, 2),SORT_DESC, $chats);
    return $chats;
}


//load Steve's chats
function loadSteveChats($address)
{
    $fileLines = file($address);
    $chats = array(
        array($fileLines[0], $fileLines[1], $fileLines[4], $fileLines[5]),//(name,time,stamp,text)
        array($fileLines[0], $fileLines[7], $fileLines[8], $fileLines[9]),
        array($fileLines[0], $fileLines[11], $fileLines[12], $fileLines[13]),
    );
    array_multisort(array_column($chats, 2),SORT_DESC, $chats);
    return $chats;
}


//load Iris
function loadIrisChats($address)
{
    $fileLines = file($address);
    $chats = array(
        array($fileLines[0], $fileLines[1], $fileLines[4], $fileLines[5]),//(name,time,stamp,text)
        array($fileLines[0], $fileLines[7], $fileLines[8], $fileLines[9]),
        array($fileLines[0], $fileLines[11], $fileLines[12], $fileLines[13]),
    );
    array_multisort(array_column($chats, 2),SORT_DESC, $chats);
    return $chats;
}


//load Jane
function loadJaneChats($address)
{
    $fileLines = file($address);
    $chats = array(
        array($fileLines[0], $fileLines[1], $fileLines[2], $fileLines[3]),//(name,time,stamp,text)
        array($fileLines[0], $fileLines[5], $fileLines[6], $fileLines[7]),
        array($fileLines[0], $fileLines[9], $fileLines[10], $fileLines[11]),
    );
    array_multisort(array_column($chats, 2),SORT_DESC, $chats);
    return $chats;
}


//capture new chat and append it to myChats
function myNewChats($newChatText)
{
    if($newChatText!=null)//write file only if it is not null
    {
        date_default_timezone_set('America/Halifax');
        $date = date_create();
        $dateString = date_timestamp_get($date);
        $dateTime = date("d/F/Y, g:ia", time());
        $text = $dateTime."\r\n". $dateString."\r\n".$newChatText."\r\n\r\n";
        $fh=fopen("./myChat.txt","a") or die("Cannot open file. Sorry!");
        fwrite($fh,$text) or die("Cannot open file. ");
        fclose($fh);
    }

}


//sort chats by timeStamp
function sortByTimeStamp($chats)
{
    array_multisort(array_column($chats, 2),SORT_DESC, $chats);
}

//load chats' contents determined by the value the $_GET get
function loadChatsByName($getName)
{
    if ($getName=="Marty Fly")
    {
        $chats=loadMartyChats();
    }
    else if ($getName=="Ty Lysa")
    {
        $chats=loadTyChats();
    }
    else if ($getName=="Luke Empire")
    {
        $chats=loadLukeChats();
    }
    else if ($getName=="Iris Morris")
    {
        $address="./userChats/Iris_Morris_chats.txt";
        $chats=loadIrisChats($address);
    }
    else if ($getName=="Jane Harris")
    {
        $address="./userChats/Jane_Harris_chats.txt";
        $chats=loadJaneChats($address);
    }
    else if ($getName=="Steve Law")
    {
        $address="./userChats/Steve_Law_chats.txt";
        $chats=loadSteveChats($address);
    }
    else
    {
        $chats = loadMyChats();//if getName is myChat or blank
    }
    return $chats;

}


//load description for profile of the chat page according to the value get by $_GET
function loadDesc($getName)
{
    //if (substr($getName,0,5)=="Marty")
    if ($getName=="Marty Fly")
    {
        $fh = fopen("./usersProfiles/Marty_Fly_profile.txt",'r') or die("Failed to open file");
        $f1Desc = fread($fh,filesize("./usersProfiles/Marty_Fly_profile.txt"));
        fclose($fh);
        return $f1Desc;
    }
    else if ($getName=="Ty Lysa")
    {
        $fh = fopen("./usersProfiles/Ty_Lysa_profile.txt",'r') or die("Failed to open file");
        $user2Desc = fread($fh,filesize("./usersProfiles/Ty_Lysa_profile.txt"));
        fclose($fh);
        return $user2Desc;
    }
    else if ($getName=="Luke Empire")
    {
        $fh = fopen("./usersProfiles/Luke_Empire_profile.txt",'r') or die("Failed to open file");
        $user3Desc = fread($fh,filesize("./usersProfiles/Luke_Empire_profile.txt"));
        fclose($fh);
        return $user3Desc;
    }
    else if ($getName=="Iris Morris")
    {
        $fh = fopen("./usersProfiles/Iris_Morris_pofile.txt",'r') or die("Failed to open file");
        $f3Desc = fread($fh,filesize("./usersProfiles/Iris_Morris_pofile.txt"));
        fclose($fh);
        return $f3Desc;
    }
    else if ($getName=="Jane Harris")
    {
        $fh = fopen("./usersProfiles/Jane_Harris_profile.txt",'r') or die("Failed to open file");
        $f1Desc = fread($fh,filesize("./usersProfiles/Jane_Harris_profile.txt"));
        fclose($fh);
        return $f1Desc;
    }
    else if ($getName=="Steve Law")
    {
        $fh = fopen("./usersProfiles/Steve_Law_profile.txt",'r') or die("Failed to open file");
        $f2Desc = fread($fh,filesize("./usersProfiles/Steve_Law_profile.txt"));
        fclose($fh);
        return $f2Desc;
    }
    else//load my description as default
    {
        $fh = fopen("./myProfile.txt",'r') or die("Failed to open file");
        $myDesc = fread($fh,filesize("./myProfile.txt"));
        fclose($fh);
        return $myDesc;
    }

}

//get all users' names that are following
function getAllFollowingName()
{
    $nameList=array();
    $nameList[0]="Marty Fly";
    $nameList[1]="Ty Lysa";
    $nameList[2]="Luke Empire";
    return $nameList;
}

//get all followers' name
function getAllFollowerName()
{
    $nameList=array();
    $nameList[0]="Jane Harris";
    $nameList[1]="Steve Law";
    $nameList[2]="Iris Morris";
    return $nameList;
}

//load user's name
function loadChatsName($getName)
{
    $myChats=loadMyChats();
    $following=getAllFollowingName();
    $follower=getAllFollowerName();
    if ($getName=="Marty Fly")
    {
        return $following[0];
    }
    else if ($getName=="Ty Lysa")
    {
        return $following[1];
    }
    else if ($getName=="Luke Empire")
    {
        return  $following[2];
    }
    else if ($getName=="Iris Morris")
    {
        return $follower[2];
    }
    else if ($getName=="Jane Harris")
    {
        return $follower[0];
    }
    else if ($getName=="Steve Law")
    {
        return $follower[1];
    }
    else
    {
        return $myChats[0][0];
    }
}
