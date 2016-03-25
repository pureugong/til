## Coloring echo

### 1. New function

- Follow [the link](https://github.com/pureugong/til/blob/master/bash/arguments.md) if you have no idea how arguments are handled
``` shell
# ~/.bash_profile
ecco(){
  echo -e "\033[$1m${@:2}\033[0m"
}
```

### 2. How to use it!

- the first arg is color code
- the others args are text
- [Tip Colors](http://misc.flogisoft.com/bash/tip_colors_and_formatting)

```shell
# coloring red is 31
$ ecco 31 some text here
```


