#!/bin/bash
result=`echo $1 | egrep "^[0-9]+$"`
echo $result
if [[ $result != "" ]];then
        echo "$1 is a number"
        exit
else
    echo "$1 is not a number"
fi

