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
(3, "Spain"),
(4, "UK"),
(5, "Italy");

INSERT INTO greekUnis (ID, name) VALUES
(0, "N/A"),
(1, "University of Athens"),
(2, "University of Thessaloniki"),
(3, "University of Patras");

INSERT INTO greekDepts (ID, name, uniID) VALUES
(0, "N/A", 0),
(1, "Chemistry", 1),
(2, "Physics", 1),
(3, "Mathematics", 1),
(4, "Modern Languages", 2),
(5, "History", 2),
(6, "Social Work", 3);

INSERT INTO courses (ID, name, deptID) VALUES
(1, "Greek Language", 4),
(2, "Organic Chemistry", 1),
(3, "Modern History", 5),
(4, "Linear Algebra", 3),
(5, "Quantum Physics", 2),
(6, "Psychology", 6);

INSERT INTO foreignUnis (ID, name, countryID) VALUES
(0, "N/A", 0),
(1, "Sorbonne University", 1),
(2, "University of Munich", 2),
(3, "University of Madrid", 3),
(4, "University of Oxford", 4),
(5, "University of Bologna", 5),
(6, "University of Hamburg", 2),
(7, "University of Cambridge", 4);

INSERT INTO foreignDepts (ID, name, uniID) VALUES
(0, "N/A", 0),
(1, "Medicine", 1),
(2, "Chemistry", 2),
(3, "Accounting and Finance", 3),
(4, "Mathematical Sciences", 4),
(5, "School of Engineering", 5),
(6, "Department of Social Sciences", 6),
(7, "Architecture", 7);

INSERT INTO users (ID, firstName, lastName, address, gender, birthDay, birthMonth, birthYear, email, phone, username, password, isAdmin) VALUES
(1, "Acel", "Moulin ", "Rue Lecoubre 1, Paris, France", "m", 10, 11, 1999, "acel@gmail.com", "1234567890", "acel99", "12345", 0),
(2, "Lukas", "Muller", "Hofgraben 12, Munich, Germany", "m", 8, 3, 1998, "lukas98@gmail.com", "9876543211", "lukas", "12345", 0),
(3, "Katerina", "Stamatiou", "Leoforos Kifissias 154, Athens, Greece", "f", 17, 2, 2000, "kate172@gmail.com", "1234567899", "kate2000", "12345", 0),
(4, "Maria", "Papadopoulou", "Athinas 10, Athens, Greece", "f", 3, 8, 1990, "maria@gmail.com", "1238904567", "maria", "12345", 1),
(5, "Kontantinos", "Nikolopoulos", "Solonos 24, Athens, Greece", "m", 6, 11, 1994, "konstnik@gmail.com", "5678901234", "konst94", "12345", 1);

INSERT INTO forms (ID, eduLevel, identification, diploma, certificate, status, rejectReason, userID, foreignDeptID, greekDeptID) VALUES
(1, "under", NULL, NULL, NULL, "rejected", "No files attatched", 1, 1, 0),
(2, "under", NULL, NULL, NULL, "accepted", NULL, 1, 1, 1),
(3, "master", NULL, NULL, NULL, "saved", NULL, 1, 0, 0),
(4, "under", NULL, NULL, NULL, "accepted", NULL, 3, 6, 6),
(5, "under", NULL, NULL, NULL, "saved", NULL, 2, 0, 0),
(6, "under", NULL, NULL, NULL, "accepted", NULL, 2, 2, 2),
(7, "under", NULL, NULL, NULL, "saved", NULL, 2, 6, 0);

COMMIT;
