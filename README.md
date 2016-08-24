# Codeigniter Rating Library

[DEMO](http://melquidezlazaro.ml/ratings/)

This is a simple Rating Library, What this library do is to compute an array of ratings of given item(product) and return an average rating.


It's very simple and easy to use, just load the library and call the method

### Load the library:
``` php
$this->load->library('ratings');
```

### Call the method:
``` php
$this->ratings->rating($query, $column);
```


### Sample Database:

``` sql
CREATE TABLE `products` (
  `p_id` tinyint(3) UNSIGNED NOT NULL,
  `p_item_name` varchar(50) NOT NULL,
  `p_price` tinyint(10) NOT NULL,
  `p_description` text NOT NULL,
  `p_rating` float NOT NULL DEFAULT '0',
  `p_slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

// Dump data
INSERT INTO `products` (`p_id`, `p_item_name`, `p_price`, `p_description`, `p_rating`, `p_slug`) VALUES
(1, 'Lorem Ipsum 1', 100, 'dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 0, 'lorem-ipsum-1'),
(2, 'Lorem Ipsum 2', 100, 'dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 0, 'lorem-ipsum-2'),
(3, 'Lorem Ipsum 3', 100, 'dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 0, 'lorem-ipsum-3');


CREATE TABLE `product_ratings` (
  `r_id` tinyint(3) UNSIGNED NOT NULL,
  `r_rating` int(1) NOT NULL,
  `r_rated_product` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `p_item_name` (`p_item_name`),
  ADD KEY `p_slug` (`p_slug`);


ALTER TABLE `product_ratings`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `r_rated_product` (`r_rated_product`);


ALTER TABLE `products`
  MODIFY `p_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `product_ratings`
  MODIFY `r_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `product_ratings`
  ADD CONSTRAINT `product_ratings_ibfk_1` FOREIGN KEY (`r_rated_product`) REFERENCES `products` (`p_slug`) ON DELETE CASCADE ON UPDATE CASCADE;
```
