-- DROP DATABASE cosmosDB;
CREATE DATABASE cosmosDB;

CREATE TABLE users (
    ID int NOT NULL AUTO_INCREMENT,
    Name varchar(255) NOT NULL,
    Password varchar(255) NOT NULL,
    Email varchar(255),
	PRIMARY KEY (ID)
);

CREATE TABLE reminders (
	ID int NOT NULL AUTO_INCREMENT,
	UserID int NOT NULL,
	Description varchar(255),
	Date date,
	Time time,
	Location varchar(255),
	Reoccuring varchar(255),
	PRIMARY KEY (ID)
);

CREATE TABLE habits (
	ID int NOT NULL AUTO_INCREMENT,
	UserID int NOT NULL,
	Description varchar(255),
	Date date,
	Time time,
	Points int,
	PRIMARY KEY (ID)
);