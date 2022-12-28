use davidbeck;
DROP TABLE IF EXISTS Orders;
DROP TABLE IF EXISTS Customer;
DROP TABLE IF EXISTS Product;
DROP TABLE IF EXISTS Users;
CREATE TABLE Customer (
    id int NOT NULL AUTO_INCREMENT,
    first_name varchar(255),
    last_name varchar(255),
    email varchar(255),
    PRIMARY KEY (id)
);
CREATE TABLE Product (
    id int NOT NULL AUTO_INCREMENT,
    product_name varchar(255),
    image_name varchar(255),
    price decimal(6,2),
    in_stock int,
    inactive BOOLEAN,
    PRIMARY KEY (id)
);
CREATE TABLE Orders(
    id int NOT NULL AUTO_INCREMENT,
    product_id int,
    customer_id int,
    quantity int,
    price decimal(6,2),
    tax decimal(6,2),
    donation decimal(4,2),
    time_stamp bigint,
    PRIMARY KEY (id),
    FOREIGN KEY (product_id) REFERENCES Product(id),
    FOREIGN KEY (customer_id) REFERENCES Customer(id)
);
CREATE TABLE Users (
    id int NOT NULL AUTO_INCREMENT,
    first_name varchar(255),
    last_name varchar(255),
    email varchar(255),
    pass varchar(255),
    access int,
    PRIMARY KEY (id)
);

INSERT INTO Customer (first_name, last_name, email)
VALUES ('David', 'Beck', 'davidbeck45@gmail.com');
INSERT INTO Customer (first_name, last_name, email)
VALUES ('Mickey', 'Mouse', 'mmouse@mines.edu');

INSERT INTO Product (product_name,image_name, price, in_stock, inactive)
VALUES ('Pilot','Pilot', 0.99, 0, true);
INSERT INTO Product (product_name,image_name, price, in_stock, inactive)
VALUES ('BSIQ','BSIQ-200', 1.66, 10, false);
INSERT INTO Product (product_name,image_name, price, in_stock, inactive)
VALUES ('Crayola','Crayola', 0.83, 3, false);

INSERT INTO Users (first_name, last_name, email, pass, access)
VALUES ('Frodo', 'Baggens', 'fb@mines.edu', 'fb', 1);
INSERT INTO Users (first_name, last_name, email, pass, access)
VALUES('Harry', 'Potter', 'hp@mines.edu', 'hp',2);