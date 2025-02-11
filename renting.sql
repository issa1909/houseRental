CREATE DATABASE renting;

CREATE TABLE admin_login (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL
);

INSERT INTO admin_login (username, password) VALUES ('Admin1', 'password123');
INSERT INTO admin_login (username, password) VALUES ('Admin2', 'admin_pass');

CREATE TABLE tenants (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nameOfTenant VARCHAR(255) NOT NULL,
  houseNumber VARCHAR(255),
  amountPayed DECIMAL(10, 2),
  date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);