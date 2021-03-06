usage() {
    echo "USAGE: $0 [-d] database"
    exit 1
}

global_sum() {
    echo "Summing all salaries"
}

detailed_sum() {
    echo "Summing by department"
}

case $# in
    1)
	global_sum "$1"
	;;
    2)
	if [ $1 == "-d" ]; then
	    detailed_sum "$2"
	else
	    usage
	fi
	;;
    *)
	usage
	;;
esac

