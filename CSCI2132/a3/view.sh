#!/bin/bash
for i in ${@:1};do
    if [ -r $i ];then
      	   mkdir ./tmp
	   cp ./$i ./tmp
	   gunzip ./tmp/$i 2>/dev/null
	   if (( $? != 0 ));then
	       cat $i
	   else
	       result=`echo $i| cut -d "." -f -2`
               echo `cat ./tmp/$result`
	   fi
	   rm -r tmp  
    else
	echo "ERROR: Cannot read file $i"
    fi
done
