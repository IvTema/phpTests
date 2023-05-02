
CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `website` text COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `date` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;


INSERT INTO `comment` (`comment_id`, `post_id`, `name`, `email`, `website`, `body`, `date`) VALUES
(1, 1, 'htainlinshwe', 'htainlinshwe@gmail.com', 'http://en.saturngod.net', 'This is comment', 'Sep 25 2009 11:55:32'),
(2, 1, 'comment', 'comment@gmail.com', 'comment.com', 'This is comment 2', 'Sep 25 2009 11:58:38'),
(6, 1, 'Saturngod', 'saturngod@gmail.com', 'en.satu', 'saturngod', 'Sep 27 2009 01:09:41'),
(3, 1, 'saturngod', 'saturngod@gmail.com', 'en.saturngod.net', 'This is another comment', 'Sep 26 2009 01:09:05');


CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;


INSERT INTO `post` (`post_id`, `title`, `body`, `user_id`, `date`) VALUES
(1, 'This is simple post', 'This is a body text. This is sample text. ', 1, 'Sep 25 2009 11:54:33'),
(9, 'Another Post', 'This is another post', 2, 'Sep 27 2009 06:09:32'),
(10, 'Simple', 'This is <span style="font-weight: bold;">GUI editor</span>. <big><big><big>jwysiwyg</big></big></big> editor<br><br>my blog is <a href="http://en.saturngod.net">here</a>.', 2, 'Sep 27 2009 10:09:38'),
(14, 'Test', 'RSS test', 1, 'Sep 27 2009 10:09:22'),
(16, 'Test', 'Test', 1, 'Sep 27 2009 11:09:39');


CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;


INSERT INTO `user` (`user_id`, `username`, `password`, `type`) VALUES
(1, 'admin', '0a14de5a76e5e14758b04c209f266726', '1'),
(2, 'boba', '0a14de5a76e5e14758b04c209f266726', '1');


Выбор
select comment.body as comment_body
from post 
left join user on post.user_id = user.user_id
right join comment on post.post_id = comment.post_id
where user.username = 'admin'


Операции
// having вместо where
select count(*) as post_count
from post
group by user_id
having post_count > 2;

// limit отрезает снизу при выводе, ограничивает кол-во
// offset отрезает сверху при выводе, отрезает указанное кол-во
select * from comment
order by date desc
limit 3
offset 1


SELECT * FROM
(SELECT count(*) AS post_count, user_id 
FROM post
GROUP BY user_id) AS posts_count_table 
LEFT JOIN post ON post.user_id=posts_count_table.user_id 
WHERE posts_count_table.post_count>2


//
Выводим все посты бобы
select post.body
from post
left join user on user.user_id = post.user_id
where user.username = 'boba'
;

Все посты после 2010.01
select *
from post
left join user on post.user_id = user.user_id
where post.date > '2010-01-01 00:00:00'
;

Имена всех юзеров с постами после 2010.01
select username
from post
left join user on post.user_id = user.user_id
where post.date > '2010-01-01 00:00:00'
;

Имена юзеров и кол-во постов > 2
SELECT DISTINCT user.username, posts_count_table.post_count
FROM
(SELECT count(*) AS post_count, user_id 
FROM post
GROUP BY user_id) AS posts_count_table 
LEFT JOIN user ON user.user_id=posts_count_table.user_id
HAVING post_count > 2


//

Обновить таблицу
UPDATE TABLE candies
SET candy_name = "Шипучка 3000+"
WHERE candy_id = 5;


// еще задание

CREATE TABLE categories (
	category_id INT PRIMARY KEY AUTO_INCREMENT,
	category_name VARCHAR (255) NOT NULL
);

CREATE TABLE brands (
	brand_id INT PRIMARY KEY,
	brand_name VARCHAR (255) NOT NULL
);

CREATE TABLE products (
	product_id INT PRIMARY KEY,
	product_name VARCHAR (255) NOT NULL,
	brand_id INT NOT NULL,
	category_id INT NOT NULL,
	model_year SMALLINT NOT NULL,
	list_price DECIMAL (10, 2) NOT NULL
);

CREATE TABLE customers (
	customer_id INT PRIMARY KEY AUTO_INCREMENT,
	first_name VARCHAR (255) NOT NULL,
	last_name VARCHAR (255) NOT NULL,
	phone VARCHAR (25),
	email VARCHAR (255) NOT NULL,
	street VARCHAR (255),
	city VARCHAR (50),
	state VARCHAR (25),
	zip_code VARCHAR (5)
);

CREATE TABLE stores (
	store_id INT PRIMARY KEY AUTO_INCREMENT,
	store_name VARCHAR (255) NOT NULL,
	phone VARCHAR (25),
	email VARCHAR (255),
	street VARCHAR (255),
	city VARCHAR (255),
	state VARCHAR (10),
	zip_code VARCHAR (5)
);

CREATE TABLE staffs (
	staff_id INT PRIMARY KEY,
	first_name VARCHAR (50) NOT NULL,
	last_name VARCHAR (50) NOT NULL,
	email VARCHAR (255) NOT NULL UNIQUE,
	phone VARCHAR (25),
	active tinyint NOT NULL,
	store_id INT NOT NULL,
	manager_id INT
);

CREATE TABLE orders (
	order_id INT PRIMARY KEY,
	customer_id INT,
	order_status tinyint NOT NULL,
	-- Order status: 1 = Pending; 2 = Processing; 3 = Rejected; 4 = Completed
	order_date DATE NOT NULL,
	required_date DATE NOT NULL,
	shipped_date DATE,
	store_id INT NOT NULL,
	staff_id INT NOT NULL
);

CREATE TABLE order_items (
	order_id INT,
	item_id INT,
	product_id INT NOT NULL,
	quantity INT NOT NULL,
	list_price DECIMAL (10, 2) NOT NULL,
	discount DECIMAL (4, 2) NOT NULL DEFAULT 0,
	PRIMARY KEY (order_id, item_id)
);

CREATE TABLE stocks (
	store_id INT,
	product_id INT,
	quantity INT
);

INSERT INTO brands(brand_id,brand_name) VALUES(1,'Electra');
INSERT INTO brands(brand_id,brand_name) VALUES(2,'Haro');
INSERT INTO brands(brand_id,brand_name) VALUES(3,'Heller');
INSERT INTO brands(brand_id,brand_name) VALUES(4,'Pure Cycles');

INSERT INTO categories(category_id,category_name) VALUES(1,'Children Bicycles');
INSERT INTO categories(category_id,category_name) VALUES(2,'Comfort Bicycles');
INSERT INTO categories(category_id,category_name) VALUES(3,'Cruisers Bicycles');
INSERT INTO categories(category_id,category_name) VALUES(4,'Cyclocross Bicycles');
INSERT INTO categories(category_id,category_name) VALUES(5,'Electric Bikes');
INSERT INTO categories(category_id,category_name) VALUES(6,'Mountain Bikes');
INSERT INTO categories(category_id,category_name) VALUES(7,'Road Bikes');

INSERT INTO products(product_id, product_name, brand_id, category_id, model_year, list_price) VALUES(1,'Trek 820 - 2016',3,6,2016,379.99);
INSERT INTO products(product_id, product_name, brand_id, category_id, model_year, list_price) VALUES(2,'Ritchey Timberwolf Frameset - 2016',4,6,2016,749.99);
INSERT INTO products(product_id, product_name, brand_id, category_id, model_year, list_price) VALUES(3,'Surly Wednesday Frameset - 2016',2,6,2016,999.99);
INSERT INTO products(product_id, product_name, brand_id, category_id, model_year, list_price) VALUES(4,'Trek Fuel EX 8 29 - 2016',1,6,2016,2899.99);
INSERT INTO products(product_id, product_name, brand_id, category_id, model_year, list_price) VALUES(5,'Heller Shagamaw Frame - 2016',3,6,2016,1320.99);

INSERT INTO customers(first_name, last_name, phone, email, street, city, state, zip_code) VALUES('Debra','Burks',NULL,'debra.burks@yahoo.com','9273 Thorne Ave. ','Orchard Park','NY',14127);
INSERT INTO customers(first_name, last_name, phone, email, street, city, state, zip_code) VALUES('Kasha','Todd',NULL,'kasha.todd@yahoo.com','910 Vine Street ','Campbell','CA',95008);
INSERT INTO customers(first_name, last_name, phone, email, street, city, state, zip_code) VALUES('Tameka','Fisher',NULL,'tameka.fisher@aol.com','769C Honey Creek St. ','Redondo Beach','CA',90278);
INSERT INTO customers(first_name, last_name, phone, email, street, city, state, zip_code) VALUES('Daryl','Spence',NULL,'daryl.spence@aol.com','988 Pearl Lane ','Uniondale','NY',11553);
INSERT INTO customers(first_name, last_name, phone, email, street, city, state, zip_code) VALUES('Charolette','Rice','(916) 381-6003','charolette.rice@msn.com','107 River Dr. ','Sacramento','CA',95820);
INSERT INTO customers(first_name, last_name, phone, email, street, city, state, zip_code) VALUES('Lyndsey','Bean',NULL,'lyndsey.bean@hotmail.com','769 West Road ','Fairport','NY',14450);

INSERT INTO stores(store_name, phone, email, street, city, state, zip_code)
VALUES('Santa Cruz Bikes','(831) 476-4321','santacruz@bikes.shop','3700 Portola Drive', 'Santa Cruz','CA',95060),
      ('Baldwin Bikes','(516) 379-8888','baldwin@bikes.shop','4200 Chestnut Lane', 'Baldwin','NY',11432),
      ('Rowlett Bikes','(972) 530-5555','rowlett@bikes.shop','8000 Fairway Avenue', 'Rowlett','TX',75088);

INSERT INTO stocks(store_id, product_id, quantity) VALUES(1,1,27);
INSERT INTO stocks(store_id, product_id, quantity) VALUES(1,2,5);
INSERT INTO stocks(store_id, product_id, quantity) VALUES(1,3,6);
INSERT INTO stocks(store_id, product_id, quantity) VALUES(1,4,23);
INSERT INTO stocks(store_id, product_id, quantity) VALUES(1,5,22);
INSERT INTO stocks(store_id, product_id, quantity) VALUES(2,6,0);
INSERT INTO stocks(store_id, product_id, quantity) VALUES(2,7,8);

INSERT INTO orders(order_id, customer_id, order_status, order_date, required_date, shipped_date, store_id,staff_id) VALUES(1,1,4,'20160101','20160103','20160103',1,2);
INSERT INTO orders(order_id, customer_id, order_status, order_date, required_date, shipped_date, store_id,staff_id) VALUES(2,2,4,'20160101','20160104','20160103',2,6);
INSERT INTO orders(order_id, customer_id, order_status, order_date, required_date, shipped_date, store_id,staff_id) VALUES(3,2,4,'20160102','20160105','20160103',2,7);
INSERT INTO orders(order_id, customer_id, order_status, order_date, required_date, shipped_date, store_id,staff_id) VALUES(4,3,4,'20160103','20160104','20160105',1,3);
INSERT INTO orders(order_id, customer_id, order_status, order_date, required_date, shipped_date, store_id,staff_id) VALUES(5,4,4,'20160103','20160106','20160106',2,6);

INSERT INTO order_items(order_id, item_id, product_id, quantity, list_price,discount) VALUES(1,1,20,1,599.99,0.2);
INSERT INTO order_items(order_id, item_id, product_id, quantity, list_price,discount) VALUES(1,2,8,2,1799.99,0.07);
INSERT INTO order_items(order_id, item_id, product_id, quantity, list_price,discount) VALUES(1,3,10,2,1549.00,0.05);
INSERT INTO order_items(order_id, item_id, product_id, quantity, list_price,discount) VALUES(1,4,16,2,599.99,0.05);
INSERT INTO order_items(order_id, item_id, product_id, quantity, list_price,discount) VALUES(1,5,4,1,2899.99,0.2);
INSERT INTO order_items(order_id, item_id, product_id, quantity, list_price,discount) VALUES(2,1,20,1,599.99,0.07);
INSERT INTO order_items(order_id, item_id, product_id, quantity, list_price,discount) VALUES(2,2,16,2,599.99,0.05);
INSERT INTO order_items(order_id, item_id, product_id, quantity, list_price,discount) VALUES(3,1,3,1,999.99,0.05);
INSERT INTO order_items(order_id, item_id, product_id, quantity, list_price,discount) VALUES(3,2,20,1,599.99,0.05);
INSERT INTO order_items(order_id, item_id, product_id, quantity, list_price,discount) VALUES(4,1,2,2,749.99,0.1);
INSERT INTO order_items(order_id, item_id, product_id, quantity, list_price,discount) VALUES(5,1,10,2,1549.00,0.05);
INSERT INTO order_items(order_id, item_id, product_id, quantity, list_price,discount) VALUES(5,2,17,1,429.00,0.07);
INSERT INTO order_items(order_id, item_id, product_id, quantity, list_price,discount) VALUES(5,3,26,1,599.99,0.07);



select * from stores;
select * from categories;
select * from brands;
select * from products;
select * from customers;
select * from staffs;
select * from orders;
select * from order_items;
select * from stocks;

все продукты категории горный велосипед

select * 
from products
left join categories on categories.category_id = products.category_id
where category_name = 'Mountain Bikes'



select product_name, brand_name from products
left join brands on brands.brand_id = products.brand_id;

mysql
USE production;
SELECT * FROM orders;
SELECT * FROM customers;
SELECT * FROM order_items;

SELECT orders.order_id, order_date, last_name, SUM(list_price)  FROM orders
left join customers on customers.customer_id = orders.customer_id
left join order_items on order_items.order_id = orders.order_id
group by orders.order_id;

SELECT order_id, order_date, last_name, count(list_price) FROM
(SELECT * FROM orders
left join order_items on order_items.order_id = orders.order_id
group by orders.order_id) AS posts_count_table 
left join customers on customers.customer_id = orders.customer_id;




-- БОЕВАЯ ОРГАНИЗАЦИИ

--main
CREATE TABLE main_cult_orgs (
	org_id INT NOT NULL AUTO_INCREMENT,
	org_name VARCHAR (255) NOT NULL,
	org_type VARCHAR (255) NOT NULL,
	profile VARCHAR (255) NOT NULL,
	property_type VARCHAR (255) NOT NULL,
	belonging_type VARCHAR (255) NOT NULL,
	owner_id INT NOT NULL,
	branch_id VARCHAR (255) NOT NULL,
	district VARCHAR (255) NOT NULL,
	address VARCHAR (255) NOT NULL,
	support_tel VARCHAR (255) NOT NULL,
	mail VARCHAR (255) NOT NULL,
	site VARCHAR (255) NOT NULL,
	identification_number INT NOT NULL,
	org_charter VARCHAR (255) NOT NULL,
	staff_num INT NOT NULL,
	head_name VARCHAR (255) NOT NULL,
	head_position VARCHAR (255) NOT NULL,
	head_tel VARCHAR (255) NOT NULL,
	addition VARCHAR (255) NOT NULL,
	PRIMARY KEY (org_id)
);
INSERT INTO main_cult_orgs(org_id,org_name,org_type,profile,property_type,belonging_type,owner_id,branch_id,district,address,support_tel,mail,site,identification_number,org_charter,staff_num,head_name,head_position,head_tel,addition) VALUES(1,'Children Bicycles');


--owner
CREATE TABLE owner_orgs (
	owner_id INT NOT NULL AUTO_INCREMENT,
	owner_name VARCHAR (255) NOT NULL,
	PRIMARY KEY (owner_id)
);
INSERT INTO owner_orgs(owner_id,owner_name) VALUES(1,'Children Bicycles');



--head-position
CREATE TABLE head_position_orgs (
	head_id INT NOT NULL AUTO_INCREMENT,
	head_position VARCHAR (255) NOT NULL,
	PRIMARY KEY (head_id)
);
INSERT INTO head_position_orgs(head_id,head_position) VALUES(1,'Children Bicycles');


--belonging
CREATE TABLE belonging_orgs (
	belonging_id INT NOT NULL AUTO_INCREMENT,
	belonging_type VARCHAR (255) NOT NULL,
	PRIMARY KEY (belonging_id)
);
INSERT INTO belonging_orgs(belonging_id,belonging_type) VALUES(1,'Children Bicycles');


--profile
CREATE TABLE profile_orgs (
	profile_id INT NOT NULL AUTO_INCREMENT,
	profile VARCHAR (255) NOT NULL,
	PRIMARY KEY (profile_id)
);
INSERT INTO profile_orgs(profile_id,profile) VALUES(1,'Children Bicycles');


--district
CREATE TABLE district_orgs (
	district_id INT NOT NULL AUTO_INCREMENT,
	district VARCHAR (255) NOT NULL,
	PRIMARY KEY (district_id)
);
INSERT INTO district_orgs(district_id,district) VALUES(1,'Children Bicycles');


--type
CREATE TABLE type_orgs (
	type_id INT NOT NULL AUTO_INCREMENT,
	org_type VARCHAR (255) NOT NULL,
	PRIMARY KEY (type_id)
);
INSERT INTO type_orgs(type_id,org_type) VALUES(1,'Children Bicycles');


--branch
CREATE TABLE branch_orgs (
	branch_id INT NOT NULL AUTO_INCREMENT,
	branch_name VARCHAR (255) NOT NULL,
	PRIMARY KEY (branch_id)
);
INSERT INTO branch_orgs(branch_id,branch_name) VALUES(1,'Children Bicycles');


--property
CREATE TABLE property_orgs (
	property_id INT NOT NULL AUTO_INCREMENT,
	property_type VARCHAR (255) NOT NULL,
	PRIMARY KEY (property_id)
);
INSERT INTO property_orgs(property_id,property_type) VALUES(1,'Children Bicycles');
