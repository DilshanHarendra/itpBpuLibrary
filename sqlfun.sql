CREATE PROCEDURE `getLoginDetails`(IN `uname ` VARCHAR(10), OUT `gpass` VARCHAR(50)) 
NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER 
SELECT lipassword into gpass FROM templibmemmber WHERE studetId = uname;


CREATE PROCEDURE `changePass`(IN `cid` VARCHAR(10), IN `newPass` VARCHAR(50)) 
NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER
UPDATE `templibmemmber` SET `lipassword`=newPass WHERE studetId=cuname;




CREATE VIEW bookcatlog(bookid,booktitle,bookautor,bookcatagory,bookavailable) AS SELECT `BID`, `Title`, `Author`, `Catagory`, `Avilability` FROM book



CREATE TRIGGER `insertTotemplib` AFTER INSERT ON `student` FOR EACH ROW IF(new.LibMember = 1) THEN iNSERT INTO `templibmemmber` ( `studetId`, `lipassword`) VALUES (new.SID,new.NIC); END IF



CREATE TABLE templibmemmber(
studetId varchar(10)
lipassword varchar(50),
 PRIMARY KEY (lid)   
)



SELECT `BID`, `Title`, `Author`, `NoOfCoppies`, `Catagory`, `Avilability` FROM `book` WHERE 1
UPDATE `libmemmber` SET `lipassword`=[value-2] WHERE 1
SELECT `FnID`, `Name`, `Amount` FROM `fines` WHERE 1
