#!/bin/bash
errors=`grep -q "$@" 2>&1`
result=$?
case $result in
0)
echo "PATTERN FOUND"
;;
1)
echo "PATTERN NOT FOUND"
;;
*)
echo "ERROR: $errors" 1>&2
;;
esac
exit $result
