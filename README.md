# login-system
Before entering into the coding part, first let us build the database required for this example.

CREATE DATABASE `testdb`;
USE `testdb`;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

Run this sql file in phpmyadmin interface and create the database and table.

#PHP Script for Login and Registration System

To build the login/registration system we need to create the following files.

##index.php - This is the home page of our application
##register.php - It contains the user sign up form
##login.php - It contains the login form
##logout.php - This contains the user logout script
##dbconnect.php - MySQL database connection script




