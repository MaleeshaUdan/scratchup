create database scratch;
use scratch;

CREATE TABLE newlycreatedcards (
    cardnumber VARCHAR(8),
    value int(4),
    createdtime VARCHAR(10),
    createddate VARCHAR(12),
    usedby varchar(8)
);

ALTER TABLE newlycreatedcards
ADD COLUMN usedby VARCHAR(8);



CREATE TABLE user (
    accountNumber VARCHAR(8) PRIMARY KEY,
    name VARCHAR(255),
    email varchar(60),
    branch VARCHAR(255),
    balance DOUBLE
);





ALTER TABLE newlycreatedcards
ADD CONSTRAINT fk_usedby_user
FOREIGN KEY (usedby) REFERENCES user(accountNumber);

insert into user values
('8050120','User 01','Vavuniya',10000,'s.ishandissanayake'),
('8050720','User 02','Jaffna',10000,'s.ishandissanayake'),
('8050450','User 03','Anuradhapura',20000,'maleeshaudan@gmail.com'),
('8050560','USer 04','Colombo',50000,'maleeshaudan@gmail.com');

insert into user(email) values
('s.ishandissanayake'),
('s.ishandissanayake'),
('maleeshaudan@gmail.com'),
('maleeshaudan@gmail.com');






