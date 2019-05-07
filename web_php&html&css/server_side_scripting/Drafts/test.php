<?php
/**
 * Created by PhpStorm.
 * User: J-JL
 * Date: 2018/10/13
 * Time: 15:40
 */


function loadUserChats()
{

    $myChat1 = "./myChats/myChats1.txt";
    $myChat2 = "./myChats/myChats2.txt";
    $myChat3 = "./myChats/myChats3.txt";
    $chat1 = file($myChat1);
    $chat2 = file($myChat2);
    $chat3 = file($myChat3);
    $user1File = "./userChats/uchats1.txt";//user1
    $user1Lines = file($user1File);
    $user2File = "./userChats/uchats2.txt";
    $user2Lines = file($user2File);
    $user3File = "./userChats/uchats3.txt";
    $user3Lines = file($user3File);
    $myChat = "./myChats/myChats.txt";
    $myChatsLines=file($myChat);
    $mCLength =count($myChatsLines);

    $chats=array(
        array($user1Lines[0],$user1Lines[2],$user1Lines[1],$user1Lines[5]),//user1 chat1 array name time text timestamp
        array($user1Lines[0],$user1Lines[8],$user1Lines[7],$user1Lines[9]),
        array($user1Lines[0],$user1Lines[12],$user1Lines[11],$user1Lines[13]),

        //user2 chats arrays
        array($user2Lines[0],$user2Lines[2],$user2Lines[1],$user2Lines[3]),//user1 chat1 array
        array($user2Lines[0],$user2Lines[6],$user2Lines[5],$user2Lines[3]),
        array($user2Lines[0],$user2Lines[10],$user2Lines[9],$user2Lines[3]),

        //user3 chats arrays
        array($user3Lines[0],$user3Lines[2],$user3Lines[1],$user3Lines[5]),//user1 chat1 array(name,time,text)
        array($user3Lines[0],$user3Lines[8],$user3Lines[7],$user3Lines[9]),
        array($user3Lines[0],$user3Lines[12],$user3Lines[11],$user3Lines[13]),

        //myChats arrays
        array($chat1[0],$chat1[2],$chat1[1],$chat1[3]),
        array($chat2[0],$chat2[2],$chat2[1],$chat2[3]),
        array($chat3[0],$chat3[2],$chat3[1],$chat3[3])
    );

    $rowChats=count($chats);

    if($mCLength!=0)
    {
        $lines=1;

        while($lines<$mCLength)
        {
            for ($row=$rowChats;$row<(($mCLength-1)/4+$rowChats);$row++)
            {
                $chats[$row][0]=$myChatsLines[0];//name
                $chats[$row][2]=$myChatsLines[$lines];//text
                $chats[$row][1]=$myChatsLines[$lines+1];//time
                $chats[$row][3]=$myChatsLines[$lines+2];//time
                $lines+=4;
            }
        }


    }
    return $chats;
}

function loadUserChats1()
{
    $user1File = "./userChats/uchats1.txt";//user1
    $user1Lines = file($user1File);
    $user2File = "./userChats/uchats2.txt";
    $user2Lines = file($user2File);
    $user3File = "./userChats/uchats3.txt";
    $user3Lines = file($user3File);

    $chats=array(
        array('name'=>$user1Lines[0],'time'=>$user1Lines[2],'text'=>$user1Lines[1],'timestamp'=>$user1Lines[5]),//user1 chat1 array name time text timestamp
        array('name'=>$user1Lines[0],'time'=>$user1Lines[8],'text'=>$user1Lines[7],'timestamp'=>$user1Lines[9]),
        array('name'=>$user1Lines[0],'time'=>$user1Lines[12],'text'=>$user1Lines[11],'timestamp'=>$user1Lines[13]),

        //user2 chats arrays
        array('name'=>$user2Lines[0],'time'=>$user2Lines[2],'text'=>$user2Lines[1],'timestamp'=>$user2Lines[3]),//user1 chat1 array
        array('name'=>$user2Lines[0],'time'=>$user2Lines[6],'text'=>$user2Lines[5],'timestamp'=>$user2Lines[3]),
        array('name'=>$user2Lines[0],'time'=>$user2Lines[10],'text'=>$user2Lines[9],'timestamp'=>$user2Lines[3]),

        //user3 chats arrays
        array('name'=>$user3Lines[0],'time'=>$user3Lines[2],'text'=>$user3Lines[1],'timestamp'=>$user3Lines[5]),//user1 chat1 array(name,time,text)
        array('name'=>$user3Lines[0],'time'=>$user3Lines[8],'text'=>$user3Lines[7],'timestamp'=>$user3Lines[9]),
        array('name'=>$user3Lines[0],'time'=>$user3Lines[12],'text'=>$user3Lines[11],'timestamp'=>$user3Lines[13])
    );
    return $chats;
}



class chats
{
    private $name,$time,$text;

    function printName($name)
    {
        echo "$name";
    }

    function printTime($time)
    {
        echo "$time";
    }

    function printText($text)
    {
        echo "$text";
    }
}

/*
    foreach ($user1Chats as $item) {
        echo $item['name'] . "<br>" . $item['time'] . "<br>" . $item['text'] . "<br>" . $item['timestamp'] . "<br><br>";
    }


    foreach ($user1Chats as $key => $row) {
        $name[$key]  = $row['name'];
        $timeStamp[$key] = $row['timestamp'];
        $time[$key]  = $row['time'];
        $text[$key] = $row['text'];
    }*/
//array_multisort($timeStamp, SORT_DESC, $time,SORT_DESC, $name,SORT_ASC,$user1Chats);

/*
    foreach(arr_keys($user1Chats) as $key){
        $value = $user1Chats[$key];
        unset($user1Chats[$key]); // remove old key
        $array['name'] = $value;
        echo "name=" . $value;
        echo "<br>";
        unset($user1Chats[$key]);
        $array['time'] = $value;
        unset($user1Chats[$key]);
        $array['text'] = $value;
        unset($user1Chats[$key]);
        $array['timestamp'] = $value;
    }
    echo "<br><br><br>";
echo "<h1>users' chats</h1>";*/



function loadChatsT($getName)
{
    $myChat1 = "./myChats/myChats1.txt";
    $myChat2 = "./myChats/myChats2.txt";
    $myChat3 = "./myChats/myChats3.txt";
    $chat1 = file($myChat1);
    $chat2 = file($myChat2);
    $chat3 = file($myChat3);
    $user1File = "./userChats/uchats1.txt";//user1
    $user1Lines = file($user1File);
    $user2File = "./userChats/uchats2.txt";
    $user2Lines = file($user2File);
    $user3File = "./userChats/uchats3.txt";
    $user3Lines = file($user3File);
    if ($getName=="user1")
    {
        $text[0]= $user1Lines[1];
        $text[1]= $user1Lines[7];
        $text[2]= $user1Lines[11];
    }
    else if ($getName=="myChat")
    {
        $text[0]= $chat1[1];
        $text[1]= $chat2[1];
        $text[2]= $chat3[1];
    }
    else if ($getName=="user2")
    {
        $text[0]= $user2Lines[1];
        $text[1]= $user2Lines[5];
        $text[2]= $user2Lines[9];
    }
    else if ($getName=="user3")
    {
        $text[0]= $user3Lines[1];
        $text[1]= $user3Lines[7];
        $text[2]= $user3Lines[11];
    }
    else
    {
        $text[0]= $chat1[1];
        $text[1]= $chat2[1];
        $text[2]= $chat3[1];
    }
    return $text;
}


function loadChatsDt($getName)
{
    $myChat1 = "./myChats/myChats1.txt";
    $myChat2 = "./myChats/myChats2.txt";
    $myChat3 = "./myChats/myChats3.txt";
    $chat1 = file($myChat1);
    $chat2 = file($myChat2);
    $chat3 = file($myChat3);
    $user1File = "./userChats/uchats1.txt";//user1
    $user1Lines = file($user1File);
    $user2File = "./userChats/uchats2.txt";
    $user2Lines = file($user2File);
    $user3File = "./userChats/uchats3.txt";
    $user3Lines = file($user3File);
    if ($getName=="user1")
    {
        $dateTime[0]=$user1Lines[2];
        $dateTime[1]=$user1Lines[8];
        $dateTime[2]=$user1Lines[12];
    }
    else if ($getName=="myChat")
    {
        $dateTime[0]=$chat1[2];
        $dateTime[1]=$chat2[2];
        $dateTime[2]=$chat3[2];
    }
    else if ($getName=="user2")
    {
        $dateTime[0]=$user2Lines[2];
        $dateTime[1]=$user2Lines[6];
        $dateTime[2]=$user2Lines[10];
    }
    else if ($getName=="user3")
    {
        $dateTime[0]=$user3Lines[2];
        $dateTime[1]=$user3Lines[8];
        $dateTime[2]=$user3Lines[12];
    }
    else
    {
        $dateTime[0]=$chat1[2];
        $dateTime[1]=$chat2[2];
        $dateTime[2]=$chat3[2];
    }
    return $dateTime;
}

$user1Chats=loadUserChats1();
//test
function loadUserChats2()
{
    $user1File = "./userChats/uchats1.txt";//user1
    $user1Lines = file($user1File);
    $user2File = "./userChats/uchats2.txt";
    $user2Lines = file($user2File);
    $user3File = "./userChats/uchats3.txt";
    $user3Lines = file($user3File);

    $chats=array(
        '0'=> array('name'=>$user1Lines[0],'time'=>$user1Lines[2],'text'=>$user1Lines[1],'timestamp'=>$user1Lines[5]),//user1 chat1 array name time text timestamp
        '1'=> array('name'=>$user1Lines[0],'time'=>$user1Lines[8],'text'=>$user1Lines[7],'timestamp'=>$user1Lines[9]),
        '2'=> array('name'=>$user1Lines[0],'time'=>$user1Lines[12],'text'=>$user1Lines[11],'timestamp'=>$user1Lines[13]),

        //user2 chats arrays
        '3'=> array('name'=>$user2Lines[0],'time'=>$user2Lines[2],'text'=>$user2Lines[1],'timestamp'=>$user2Lines[3]),//user1 chat1 array
        '4'=> array('name'=>$user2Lines[0],'time'=>$user2Lines[6],'text'=>$user2Lines[5],'timestamp'=>$user2Lines[7]),
        '5'=> array('name'=>$user2Lines[0],'time'=>$user2Lines[10],'text'=>$user2Lines[9],'timestamp'=>$user2Lines[11]),

        //user3 chats arrays
        '6'=> array('name'=>$user3Lines[0],'time'=>$user3Lines[2],'text'=>$user3Lines[1],'timestamp'=>$user3Lines[5]),//user1 chat1 array(name,time,text)
        '7'=> array('name'=>$user3Lines[0],'time'=>$user3Lines[8],'text'=>$user3Lines[7],'timestamp'=>$user3Lines[9]),
        '8'=> array('name'=>$user3Lines[0],'time'=>$user3Lines[12],'text'=>$user3Lines[11],'timestamp'=>$user3Lines[13])
    );
    return $chats;
}


$user1File = "./users/user1.txt";//user1
$user1Desc = file($user1File);
$user2File = "./users/user2.txt";//user2
$user2Desc = file($user2File);
$user3File = "./users/user3.txt";//user3
$user3Desc = file($user3File);
$myFile ="./myDesc.txt";//my desc
$myDesc = file($myFile);



//capture new chat and append it to myChats
function myNewChats($newChatText)
{
    date_default_timezone_set('America/Halifax');
    $date = date_create();
    $dateString = date_timestamp_get($date);
    $dateTime = date("d/F/Y, g:ia", time());
    $text = $newChatText."\r\n".$dateTime."\r\n". $dateString."\r\n\r\n";
    $fh=fopen("./myChats/myChats.txt","a") or die("Cannot open file. Sorry!");
    fwrite($fh,$text) or die("Cannot open file. ");
    fclose($fh);
}