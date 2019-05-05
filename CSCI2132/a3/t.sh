#!/bin/bash
 var=`which -a less`
 for p in $var; 
do ls -l $p ;
done
