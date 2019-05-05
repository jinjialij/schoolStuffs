#!/bin/bash
result=`echo $1 | egrep "^[0-9]+$"` 
if   (( $# ==0 )); then
    echo "USAGE: compress_large_files.sh size [dir ...]"
    exit
elif (( $# >=1 )); then
    if [[ $result != "" ]];then
	size=$1
        if(( $#==1 )); then
	    file=`ls`
	    for filename in $file
	    do
		if [ -f $filename ]  && [[ $filename != $0 ]];then
		   if [ -r $filename ];then
		       s=` wc -c ./$filename | cut -d " " -f 1`
		       if  (( $s>= $size )) ;then
			   gzip $filename
		       fi
		   else
                       echo "ERROR: Cannot read file $filename"
		   fi	
		fi
	    done	    
	else
	    for i in "${@:2}"; do
                if [ ! -d $i ];then
                    echo "ERROR: $i is not a directory"
                    exit 2
		fi
            done
	    for i in "${@:2}"; do
		if [ -r $i ];then
		    file2=`ls ./$i`
		    for fname in $file2;do
			name1="./$i/$fname"
			if [ -f $name1 ];then
			    if [ -r $name1 ];then
				s=` wc -c ./$i/$fname | cut -d " " -f 1`
				if (( $s>= $size )) ;then
				    gzip $name1
				fi
			    else
				echo "ERROR: Cannot read file $fname"
				exit 2
			    fi
			fi	
		    done
		else 
		    echo "ERROR: Cannot read file $i"
		fi
	    done	
	 fi	    
    else
	echo "ERROR : $1 is not a number"
	exit 
    fi
fi
