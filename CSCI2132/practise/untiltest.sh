#!/bin/bash
until $2-$1=2;do
    echo "$2 -$1 = 2"
    (( $2=$2+1 ))
done
