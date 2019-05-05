#!/bin/bash
for (( i = 1; $i <= $1; i = $i + 1 )) do
f=tmpfile-$i.txt
echo “Appending to file $f”
echo Updated on `date` >> $f
done
