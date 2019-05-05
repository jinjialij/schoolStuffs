#!/bin/bash
for i in ${@:1};do
    if [ -r $i ];then
       check=`echo $i | egrep "*.gz$"`
       if [[ $check == "" ]] ;then
           echo `cat $i`
       else
           mkdir ./tmp
           cp ./$i ./tmp
           gunzip ./tmp/$i
           result=`echo $i| cut -d "." -f -2`
           echo `cat ./tmp/$result`
           rm -r tmp
       fi
    else
        echo "ERROR: Cannot read file $i"
    fi
done
