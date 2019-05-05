#!/bin/sh
echo $#
for arg in "$@"; do
echo "\"$arg\""
done
