<?php
//a function which store database account
function login()
{
    $db_hostname="localhost";
    $db_userName="root";
    $db_pw="root";
    $dbName="chat";
    $longin=array($db_hostname,$db_userName,$db_pw,$dbName);
    return $longin;
}