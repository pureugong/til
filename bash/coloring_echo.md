## coloring echo

``` shell
# ~/.bash_profile
ecco(){
  echo -e "\033[$2m$1\033[0m"
}
```

```shell

$ ecco red 31

```
