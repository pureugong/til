## dump and load

This is a clean way to create trunk directory on existing repository

### 1. dump 

```shell
# dump existing repository into a filev
$ svnadmin dump /path/to/myrepo/ > /some/dir/myproject.svndump
``` 

### 2. new repository

```shell
# create new repository
$ svnadmin create /path/to/mynewrepo/
``` 

### 3. trunk, branches and tags

```shell
# add the trunk, branches and tags folder
# and commit it, in the working copy directory
$ mkdir trunk branches tags; svn add *; svn commit -m "Add : trunk branches tags folder" 
``` 

### 4. load 

```shell
# laod the dumpfie into the new repository using trunk as parent-dir
$ svnadmin load --parent-dir trunk /path/to/mynewrepo/ < /some/dir/mynewrepo.svndump
``` 
