#!/bin/bash
file=`ls`
for filename in $file
   do
      if [ -f $filename ]  && [[ $filename != $0 ]];then
	  s=` wc -c $filename | cut -d " " -f 1`
              if (( $s>= $1 ));then
		  if [ -r $filename ];then
		      gunzip $filename
		  else
		      echo "Cannot read file $filename"
		  fi
	      fi
	  
      fi
done
