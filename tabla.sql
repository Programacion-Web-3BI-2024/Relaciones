CREATE TABLE chefs(
	id int primary key auto_increment,
	nombre varchar(255),
	apellido varchar(255),
	created_at datetime,
	updated_at datetime,
	deleted_at datetime
	);
	
CREATE TABLE `pizzas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  chef_id int,
  foreign key(chef_id) references chefs(id),
  PRIMARY KEY (id)
)