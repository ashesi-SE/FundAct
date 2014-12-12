DROP DATABASE IF EXISTS fund_act;
CREATE DATABASE fund_act;
USE fund_act;

CREATE TABLE users(
	uid INT AUTO_INCREMENT NOT NULL,
	fname VARCHAR(25),
	lname VARCHAR(25),
	passwd VARCHAR(50),
	user_type ENUM("admin","user"),
	email_address VARCHAR(150),
	tel_number VARCHAR(10),
	physical_address VARCHAR(200),
	PRIMARY KEY(uid)
);
INSERT INTO users(fname,lname,passwd,user_type,email_address,tel_number,physical_address) VALUES
("Nanette","Taylor",MD5("password"),"admin","nanette.taylor@ashesi.edu.gh","0000000000","Ashesi"),
("Carl","Agbenyega",MD5("password"),"admin","carl.agbenyega@ashesi.edu.gh","0000000000","Ashesi"),
("Edem","Anaglo",MD5("password"),"admin","edem.anaglo@ashesi.edu.gh","0000000000","Ashesi"),
("Judah","Lafia-King",MD5("password"),"admin","judah.lafia-king@ashesi.edu.gh","0000000000","Ashesi"),
("Aba","Debrah",MD5("password"),"admin","aba.debrah@ashesi.edu.gh","0000000000","Ashesi");
-- SELECT * FROM users; 

CREATE TABLE projects (
	pid INT AUTO_INCREMENT NOT NULL,
	uid INT NOT NULL,
	title VARCHAR(50),
	description VARCHAR(2000),
	category ENUM("schools and supplies","libraries","ict tools and apps","creative projects"),
	location VARCHAR(100),
	target_amount INT,
	amount_donated INT,
	target_date DATE,
	pictures VARCHAR(500),
	videos VARCHAR(500),
	PRIMARY KEY (pid),
	FOREIGN KEY (uid) REFERENCES users(uid)
);
INSERT INTO projects(uid,title,description,category,location,target_amount,amount_donated,target_date,pictures,videos) VALUES
("1","Cool beans","some description","schools and supplies","Ashesi",500,200,"2015-01-08","",""),
("2","NT creative solutions","some description","libraries","Ashesi",600,100,"2015-02-14","",""),
("3","Another creative educational solution","some description","ict tools an apps","Ashesi",700,200,"2014-12-31","",""),
("4","The brain behind the brain--wink wink","some description","other creative projects","Ashesi",800,400,"2015-01-01","","");
-- Select * from projects;