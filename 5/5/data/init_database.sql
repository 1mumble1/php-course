CREATE DATABASE php_course;
USE php_course;

CREATE TABLE user
(
	id INT NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(20) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    middle_name VARCHAR(30),
    gender VARCHAR(10) NOT NULL,
    birth_date DATE NOT NULL,
    email VARCHAR(200) NOT NULL UNIQUE,
    phone VARCHAR(20) UNIQUE,
    avatar_path VARCHAR(200),
    PRIMARY KEY (id)
);

INSERT INTO user (first_name, last_name, middle_name, gender, birth_date, email, phone, avatar_path)
VALUES ('Марат', 'Саляхов', 'Фарсилович', 'мужской', '2004-08-14', 'dhdhdhh@yandex.ru', '89300000000', ''),
	('Лилия', 'Саляхова', '', 'женский', '1991-02-14', 'dhdgd@gmail.com', '', '')
;

SELECT * FROM user;