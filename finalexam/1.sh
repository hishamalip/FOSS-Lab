read -p "enter number " num

while [ "$num" != "0" ] ; do
	binary=$(expr $num % 2)
	echo $binary
	num=$(expr $num / 2)
done
