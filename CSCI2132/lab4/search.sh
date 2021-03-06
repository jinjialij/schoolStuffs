#!/bin/sh
if (( $# != 2 )); then
    echo "USAGE: $0 regex file"
    exit 3
fi
errors=`grep -q "$@" 2>&1`
case $? in
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
