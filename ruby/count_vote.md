### count vote

```ruby
def count(array)
  (1..array.first.length).each do |n|
	puts "##{n} -> #{array.map{ |t| t[n-1]}.reject{ |t| t == 'x'}.size}"
  end
end

count(["oooo", "xoxo", "oooo", "ooxo", "xoxx", "oooo"])

```

