<!DOCTYPE html>
<html>
<head>
    <title>TestArray</title>
    <meta charset="utf-8">
    </head>
<body>
<?php
    include_once './includes/myFunctions.php';//functions
    //include_once 'test.php';//
$a = array();
$a[0][0] = "a";
$a[0][1] = "b";
$a[1][0] = "y";
$a[1][1] = "z";

foreach ($a as $v1) {
    foreach ($v1 as $v2) {
        echo "$v2<br>";
    }
}
echo "<br><br><br>";

echo "<h1>my chats foreach array </h1>";
$userChats=loadFollowingChats();
$myChats =loadMyChats();

foreach ($userChats as $v1) {
    foreach ($v1 as $v2) {
        echo "$v2<br>";
    }
    echo "<br>";
}

echo "<br><br><br>";

echo "<h1>my chats foreach array </h1>";
$userChats=loadFollowingChats();
$myChats =loadMyChats();

foreach ($userChats as $v1) {
    $name;//String
    $time;//String
    $timestamp;//String
    $text;//String
    for($col=0;$col<count($v1);$col++) {
        $name=$v1[0];
        $time=$v1[1];
        $timestamp=$v1[2];
        $text=$v1[3];

    }
    echo $name."<br>".$time."<br>".$timestamp."<br>".$text."<br><br>";
}

echo "<br><br><br>";
echo "<h1>namelist for following foreach array </h1>";
$followingList = getAllFollowingName();
$followerList= getAllFollowerName();
echo "<br><br><br>";
    $userChats=loadFollowingChats();
    $myChats =loadMyChats();
    echo "<h1>users' chats array </h1>";
    for ($row = 0; $row < count($userChats); $row++) {
        echo "<p><b>Row number $row</b></p>";
        echo "<ul>";
        for ($col = 0; $col < 4; $col++) {
            echo "<li>".$userChats[$row][$col]."</li>";
        }
        echo "</ul>";
    }
    echo "<br><br><br>";



/*
    echo "<h1>users' chats sorted array </h1>";
    array_multisort(array_column($userChats, 3),SORT_DESC,$userChats);
    for ($row = 0; $row < count($userChats); $row++) {
        echo "<p><b>Row number $row</b></p>";
        echo "<ul>";
        for ($col = 0; $col < 4; $col++) {
            echo "<li>".$userChats[$row][$col]."</li>";
        }
        echo "</ul>";
    }
    echo "<br><br><br>";
*/

    echo "<h1>my chats</h1>";
    for ($row = 0; $row < count($myChats); $row++) {
        echo "<p><b>Row number $row</b></p>";
        echo "<ul>";
        for ($col = 0; $col < 4; $col++) {
            echo "<li>".$myChats[$row][$col]."</li>";
        }
        echo "</ul>";
    }
    $myChat = "./myChats/myChats.txt";
    $myChatsLines=file($myChat);
    $mCLength =count($myChatsLines);
    echo "\r\n\r\n$mCLength";
    echo "<br><br><br>";

/*
    echo "<h1>my chats sorted array </h1>";
    array_multisort(array_column($myChats, 2),SORT_DESC,$myChats);
    for ($row = 0; $row < count($myChats); $row++) {
        echo "<p><b>Row number $row</b></p>";
        echo "<ul>";
        for ($col = 0; $col < 4; $col++) {
            echo "<li>".$myChats[$row][$col]."</li>";
        }
        echo "</ul>";
    }*/
    /*
    $user1File = "./userChats/uchats1.txt";//user1
    $user1Lines = file($user1File);
    $user2File = "./userChats/uchats2.txt";
    $user2Lines = file($user2File);
    echo "<br>.$user2Lines[7].<br>";
    echo "<br>end";*/

echo "<br><br><br>";
echo "<h1>Print Steve_Law</h1>";
$address="./userChats/Steve_Law_chats.txt";
$f3Chat= loadSteveChats($address);

for ($row=0;$row<count($f3Chat);$row++)
{
    $dateTime[$row]=$f3Chat[$row][1];
    $text[$row]=$f3Chat[$row][2];
}
for ($row = 0; $row < 3; $row++) {
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
    for ($col = 0; $col < 4; $col++) {
        echo "<li>".$f3Chat[$row][$col]."</li>";
    }
    echo "</ul>";
}

echo "<h1>End of Steve_Law</h1>";
echo "<br><br><br>";
echo "<h1>Print Jane_Harris_chats</h1>";
$address="./userChats/Jane_Harris_chats.txt";
$f3Chat= loadJaneChats($address);

for ($row=0;$row<count($f3Chat);$row++)
{
    $dateTime[$row]=$f3Chat[$row][1];
    $text[$row]=$f3Chat[$row][2];
}
for ($row = 0; $row < 3; $row++) {
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
    for ($col = 0; $col < 4; $col++) {
        echo "<li>".$f3Chat[$row][$col]."</li>";
    }
    echo "</ul>";
}

echo "<h1>End of Jane_Harris_chats</h1>";
echo "<br><br><br>";
echo "<h1>Print Iris_chats</h1>";
$address="./userChats/Iris_Morris_chats.txt";
$f3Chat= loadIrisChats($address);

for ($row=0;$row<count($f3Chat);$row++)
{
    $dateTime[$row]=$f3Chat[$row][1];
    $text[$row]=$f3Chat[$row][2];
}
for ($row = 0; $row < 3; $row++) {
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
    for ($col = 0; $col < 4; $col++) {
        echo "<li>".$f3Chat[$row][$col]."</li>";
    }
    echo "</ul>";
}

echo "<h1>End of Iris_chats</h1>";
echo "<br><br><br>";
echo "<h1>Start of Luke_chats</h1>";
$user1Chat=loadLukeChats();
$d=array();
$t=array();
for ($row = 0; $row < 3; $row++) {
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
    for ($col = 0; $col < 4; $col++) {
        echo "<li>" . $user1Chat[$row][$col] . "</li>";
    }
    echo "</ul>";
}
echo "<h1>End of Luke</h1>";
echo "<h1>Start of Ty</h1>";
$user1Chat=loadTyChats();
$d=array();
$t=array();
for ($row = 0; $row < 3; $row++) {
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
    for ($col = 0; $col < 4; $col++) {
        echo "<li>" . $user1Chat[$row][$col] . "</li>";
    }
    echo "</ul>";
}
echo "<h1>End of Ty</h1>";

echo "<h1>Start of Marty</h1>";
$user1Chat=loadMartyChats();
$d=array();
$t=array();
for ($row = 0; $row < 3; $row++) {
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
    for ($col = 0; $col < 4; $col++) {
        echo "<li>" . $user1Chat[$row][$col] . "</li>";
    }
    echo "</ul>";
}
echo "<h1>End of M</h1>";
echo "<br><br><br>";
for ($row=0;$row<count($d);$row++)
{
    echo "time: ".$d [$row]."<br>Text: ".$t[$row]."<br>";
}

echo "<br><br><br>";
$myChats=loadMyChats();
for ($row = 0; $row < count($myChats); $row++) {
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
    for ($col = 0; $col < 4; $col++) {
        echo "<li>".$myChats[$row][$col]."</li>";
    }
    echo "</ul>";
}

echo "<br><br><br>";
echo "<h1>Print latest 3 in my chats</h1>";
$myChats=loadMyChats();
for ($row = 0; $row < 3;$row++) {
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
    for ($col = 0; $col < 4; $col++) {
        echo "<li>".$myChats[$row][$col]."</li>";
    }
    echo "</ul>";
}
echo "<br><br><br>";

$userChats=loadFollowingChats();
for ($row = 0; $row < count($userChats); $row++) {
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
    for ($col = 0; $col < 4; $col++) {
        echo "<li>".$userChats[$row][$col]."</li>";
    }
    echo "</ul>";
}
echo "<br><br><br>";
?>
</body>
</html>