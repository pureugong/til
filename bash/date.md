## date

### 1. check today

```shell
$ date
2016년 4월 27일 수요일 08시 02분 37초 KST
```

### 2. date with format

```shell
$ date +%Y-%m-%d\ %H:%M:%S
2016-04-27 08:04:14
```

### 3. practice

create file with the date name, for instance 2016-04-27.md

```shell
$ touch $(date +%Y-%m-%d).md
$ tree 
.
└── 20160426.md
```

