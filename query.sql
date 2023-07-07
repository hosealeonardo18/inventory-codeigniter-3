CREATE TABLE roles (
	id int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	uid varchar(128),
	name varchar(128)
);


CREATE TABLE users (
	id int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	uid varchar(128),
	fullname varchar(128),
	image varchar(128),
	email varchar(128),
	password varchar(128),
	role_id int(10),

	CONSTRAINT FK_role
	FOREIGN KEY (role_uid) REFERENCES roles(id) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE categories (
	id int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	uid varchar(128),
	name varchar(128)
);

CREATE TABLE inventory (
	id_barang int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	slug varchar(128),
	kode_barang varchar(20),
	nama_barang varchar(50),
	jumlah_barang int(10),
	satuan_barang varchar(20),
	harga_beli int(20),
	status_barang boolean,
	image varchar(128),
	created_at varchar(128),
	category_id INT(10),
	

	CONSTRAINT FK_categori
	FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE transactions (
	id_transaction int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	user_id int(10),
	id_barang int(10),
	jumlah_barang_transaction int(10),
	created_at varchar(128),
	status varchar(50),

	CONSTRAINT fk_transaction_user
	FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE,

	CONSTRAINT fk_transaction_barang
	FOREIGN KEY (id_barang) REFERENCES inventory(id_barang) ON DELETE CASCADE ON UPDATE CASCADE
);




