## markdown to html

markdown can be converted to html by using redcarpet ruby gem.

```shell
# install gem
$ gem install redcarpet
Fetching: redcarpet-3.3.4.gem (100%)
Building native extensions.  This could take a while...
Successfully installed redcarpet-3.3.4
1 gem installed
```

```ruby
# test.rb
require 'redcarpet'

renderer = Redcarpet::Render::HTML
md = Redcarpet::Markdown.new(renderer)
text = '## This is title'

p md.render(text)
```

```shell
# run
$ ruby test.rb   
"<\h2>This is title<\/h2>"
```

