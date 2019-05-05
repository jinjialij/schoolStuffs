#!/bin/bash
gunzip $1 2>/dev/null
if (( $? !=0 ));then
echo "error"
fi
