CREATE DATABASE IF NOT EXISTS fund_act;
USE fund_act;

DROP TABLE IF EXISTS projects;
CREATE TABLE projects (
	pid INT AUTO_INCREMENT NOT NULL,
	owner_fn VARCHAR(25),
	owner_ln VARCHAR(25),
	title VARCHAR(200),
	description VARCHAR(1000),
	category ENUM("schools and supplies","libraries","ict tools an apps","other creative projects"),
	target_amount INT,
	video VARCHAR(500),
	PRIMARY KEY (pid)
);

INSERT INTO projects(owner_fn,owner_ln,title,description,category,target_amount,video) VALUES
("Carl","Agbenyega","Cool beans","some description","schools and supplies",500,"https://www.youtube.com/watch?feature=player_embedded&list=PLetBe2Jd1OJq8AJQbFMo_0oE2osSDna4N&v=utOVbVhU9zg"),
("Nanette","Taylor","NT creative solutions","some description","libraries",600,"https://www.youtube.com/watch?v=J-infmEWIbQ"),
("Edem","Anaglo","Another creative educatoinal solution","ict tools an apps","some description",700,"https://www.youtube.com/watch?v=9EgCROOU6r8"),
("Aba","Debrah","The brain behind the brain--wink wink","some description","other creative projects",800,"https://www.youtube.com/watch?v=7yqFhDoblPo");

-- Select * from projects;