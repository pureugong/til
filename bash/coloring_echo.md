## coloring echo

``` shell
# ~/.bash_profile
ecco(){
  echo -e "\033[$2m$1\033[0m"
}
```

```shell
# how to use it!!
$ ecco 31 some text here
```

[Tip Colors and Formatting](http://misc.flogisoft.com/bash/tip_colors_and_formatting)
