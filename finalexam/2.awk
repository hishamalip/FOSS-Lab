#awk 'BEGIN{ORS="\n";} $2>50 && $3>50 && $4>50 {print $1, "pass"}' testcase.txt
#printf "\n"
#awk 'BEGIN{ORS="\n";} $2<50 || $3<50 || $4<50 {print $1, "fail"}' testcase.txt

 awk '{ if ( $2>=50 && $3>=50 && $4>=50 )
		score="pass";
	else score="fail"; }
      { print $1,score }' testcase3.txt

