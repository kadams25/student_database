/* 
Kyle Adams
CSCI 4000-W1B
11/11/2019
*/

-- create and select the database
DROP DATABASE IF EXISTS kyle_adams_student_db;
CREATE DATABASE kyle_adams_student_db;
USE kyle_adams_student_db;

-- create tables
CREATE TABLE major (
	majorID			INT(11)			NOT NULL	AUTO_INCREMENT,
	majorName		VARCHAR(255)	NOT NULL,
	PRIMARY KEY (majorID)
);

CREATE TABLE student (
	studentID		INT(11)			NOT NULL	AUTO_INCREMENT,
	majorID 		INT(11)			NOT NULL,
	firstName		VARCHAR(255)	NOT NULL,
	lastName		VARCHAR(255)	NOT NULL,
	gender			CHAR(1)			NOT NULL,
	PRIMARY KEY (studentID),

	FOREIGN KEY (majorID) REFERENCES major(majorID)
);

-- insert records to the major table
INSERT INTO major VALUES
(1, 'Computer Science'),
(2, 'Electrical Engineering'),
(3, 'Business');

-- insert records to the student table
INSERT INTO student VALUES
(1, 1, 'PO', 'BLACK', 'M'),
(2, 1, 'SHIFU', 'HOFFMAN', 'M'),
(3, 1, 'TIGRESS', 'JOLIE', 'F'),
(4, 1, 'JENNIFER', 'YUH', 'F'),
(5, 1, 'OX', 'STORMING', 'M'),
(6, 2, 'MONKEY', 'CHAN', 'M'),
(8, 2, 'MANTIS', 'ROGEN', 'M'),
(9, 3, 'CRANE', 'CROSS', 'M'),
(10, 3, 'OOGWAY', 'KIM', 'M'),
(11, 3, 'PING', 'HONG', 'M');

-- create database username and password with data privileges
GRANT SELECT, INSERT, UPDATE, DELETE
ON kyle_adams_student_db.*
TO kyleadams1@localhost
IDENTIFIED BY 'kyleisgreat';