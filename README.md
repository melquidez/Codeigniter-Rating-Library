# Codeigniter Rating Library

This is a simple Rating Library, what this library does is to compute the rating, from your database array table select query.


It's very simple and easy to use, just load the library and call

### Load the library
``` 
$this->load->library('ratings');
```

### Call the method:
```
$this->ratings->rating($query, $column);
```
