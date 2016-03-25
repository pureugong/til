## arguments

### get the first argument

```shell
foo(){
	echo "Parameter #1 is $1"
}
```

### get the last argument

```shell
foo(){
	echo "Parameter #last is ${!#}"
}
```

### get the arguments except the first one

```shell
foo(){
	echo "Parameters except the first one are ${@:2}"
}
```

### get the arguments except the last one

```shell
foo(){
	echo "Parameters except the last one are ${@:0:$#}"
}
```
