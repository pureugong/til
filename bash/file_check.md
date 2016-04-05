## file check

```shell
# add to .bash_profile
ecco(){
	echo -e "\033[$1m${@:2}\033[0m"
}

refresh(){
	source ~/.bash_profile
}

check_file(){

	create_file_txt .temp

	ecco 105 "file list : $(grep -c '' $1) (in svn history)" 
	ecco 104 "file count : $(grep -c '' .temp) (by ant script)" 

	# 신규변경 파일이 ant에 있으면 OK
	exist_in .temp $1 1 Ok 32 

	# 신규변경 파일이 ant에 없으면 Missed
	exist_in .temp $1 0 Missing 31

	# ant에서 가져온 파일이 신규변경 리스트에 없으면 Wrong
	exist_in $1 .temp 0 Wrong 96

	rm .temp

}

exist_in(){
	# while IFS='' read -r line || [[ -n "$line" ]]; do
    	# echo "check file : $line"
	# done < "$1"
	while IFS='' read -r line || [[ -n "$line" ]]; do
    	count=$(grep $line $1 | wc -l)
		if [ $count -eq $3 ]
		then
			echo -e "$line : \033[$5m$4\033[0m"
		fi
	done < "$2"
}

create_file_txt(){
	find ./result -type f | cut -c10- > $1
}
```