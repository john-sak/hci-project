SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE sdi1800167;

USE sdi1800167;

CREATE TABLE countries (
  ID int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE greekUnis (
  ID int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE greekDepts (
  ID int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name varchar(20) NOT NULL,
  uniID int(11) NOT NULL,
  CONSTRAINT `greekDeptsFK` FOREIGN KEY (uniID) REFERENCES greekUnis (ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE courses (
  ID int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name varchar(20) NOT NULL,
  deptID int(11) NOT NULL,
  CONSTRAINT `coursesFK` FOREIGN KEY (deptID) REFERENCES greekDepts (ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE foreignUnis (
  ID int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name varchar(20) NOT NULL,
  countryID int(11) NOT NULL,
  CONSTRAINT `foreignUnisFK` FOREIGN KEY (countryID) REFERENCES countries (ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE foreignDepts (
  ID int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name varchar(20) NOT NULL,
  uniID int(11) NOT NULL,
  CONSTRAINT `foreignDeptsFK` FOREIGN KEY (uniID) REFERENCES foreignUnis (ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE users (
  ID int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  firstName varchar(20) NOT NULL,
  lastName varchar(20) NOT NULL,
  address varchar(50) NOT NULL,
  gender enum("m","f","o") NOT NULL,
  birthDay int(11) NOT NULL,
  birthMonth int(11) NOT NULL,
  birthYear int(11) NOT NULL,
  email varchar(50) NOT NULL,
  phone varchar(10) NOT NULL,
  username varchar(20) NOT NULL UNIQUE,
  password varchar(20) NOT NULL,
  isAdmin boolean NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE forms (
  ID int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  eduLevel enum("under","master","phd") DEFAULT NULL,
  identification varchar(50) DEFAULT NULL,
  diploma varchar(50) DEFAULT NULL,
  certificate varchar(50) DEFAULT NULL,
  status enum("saved","waiting","accepted","rejected","pending") NOT NULL,
  rejectReason varchar(100) DEFAULT NULL,
  userID int(11) NOT NULL,
  CONSTRAINT `formsFK1` FOREIGN KEY (userID) REFERENCES users (ID),
  foreignDeptID int(11) NOT NULL,
  CONSTRAINT `formsFK2` FOREIGN KEY (foreignDeptID) REFERENCES foreignDepts (ID),
  greekDeptID int(11) NOT NULL,
  CONSTRAINT `formsFK3` FOREIGN KEY (greekDeptID) REFERENCES greekDepts (ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE form_has_courses (
  formID int(11) NOT NULL,
  CONSTRAINT `form_has_coursesFK1` FOREIGN KEY (formID) REFERENCES forms (ID),
  courseID int(11) NOT NULL,
  CONSTRAINT `form_has_coursesFK2` FOREIGN KEY (courseID) REFERENCES courses (ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO countries (ID, name) VALUES
(0, "N/A"),
(1, "France"),
(2, "Germany"),
(3, "Italy");

INSERT INTO greekUnis (ID, name) VALUES
(0, "N/A"),
(1, "EKPA"),
(2, "APTH");

INSERT INTO greekDepts (ID, name, uniID) VALUES
(0, "N/A", 0),
(1, "Modern Languages", 1),
(2, "History", 1),
(3, "Chemistry", 2);

INSERT INTO courses (ID, name, deptID) VALUES
(1, "Greek Language", 1),
(2, "Organic Chemistry", 3),
(3, "Modern History", 2);

INSERT INTO foreignUnis (ID, name, countryID) VALUES
(0, "N/A", 0),
(1, "Sorbonne", 1),
(2, "Universität München", 2),
(3, "Bologna", 3);

INSERT INTO foreignDepts (ID, name, uniID) VALUES
(0, "N/A", 0),
(1, "Chemistry", 1),
(2, "History", 2),
(3, "Modern Languages", 3);

INSERT INTO users (ID, firstName, lastName, address, gender, birthDay, birthMonth, birthYear, email, phone, username, password, isAdmin) VALUES
(1, "Acel", "Moulin ", "rue lecoubre 1", "m", 10, 11, 1999, "acel@gmail.com", "1234567890", "acel1", "12345", 0),
(2, "Lukas", "Müller", "Hofgraben 12", "m", 8, 3, 1998, "Lukas@gmail.com", "9876543211", "Lukas", "12345", 0),
(3, "Maria", "Nikolopoulou", "Athinas 10", "f", 3, 8, 1990, "maria@gmail.com", "1234567899", "maria", "12345", 1);

INSERT INTO forms (ID, eduLevel, identification, diploma, certificate, status, rejectReason, userID, foreignDeptID, greekDeptID) VALUES
(1, "under", NULL, NULL, NULL, "saved", NULL, 1, 0, 0), -- 0 instead of NULL beacuse foreignDeptID and greekDeptID are foreign keys
(2, "under", NULL, NULL, NULL, "accepted", NULL, 2, 2, 2);

COMMIT;
