#!/bin/bash
i=1;
while (( $i <= $1 )); do
    echo "i < $1 "
    (( i = $i+1 ))
done
