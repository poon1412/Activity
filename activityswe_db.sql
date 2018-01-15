-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `activity`;
CREATE TABLE `activity` (
  `idActivity` int(11) NOT NULL,
  `ActivityName` varchar(50) DEFAULT NULL,
  `Detail` varchar(200) DEFAULT NULL,
  `StartDate` date NOT NULL,
  `StartTime` time NOT NULL,
  `EndDate` date NOT NULL,
  `Endtime` time NOT NULL,
  `Teacher_idTeacher` int(11) NOT NULL,
  `Location_idLocation` int(11) NOT NULL,
  `Type_idType` int(11) DEFAULT NULL,
  `Yearofeducation_Semester` int(11) DEFAULT NULL,
  `Yearofeducation_Year` int(11) DEFAULT NULL,
  `image` text CHARACTER SET utf8mb4,
  PRIMARY KEY (`idActivity`),
  KEY `fk_Activity_Teacher1_idx` (`Teacher_idTeacher`),
  KEY `fk_Activity_Location1_idx` (`Location_idLocation`),
  KEY `fk_Activity_Type1_idx` (`Type_idType`),
  CONSTRAINT `fk_Activity_Teacher1` FOREIGN KEY (`Teacher_idTeacher`) REFERENCES `teacher` (`idTeacher`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Activity_Type1` FOREIGN KEY (`Type_idType`) REFERENCES `type` (`idType`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `activity` (`idActivity`, `ActivityName`, `Detail`, `StartDate`, `StartTime`, `EndDate`, `Endtime`, `Teacher_idTeacher`, `Location_idLocation`, `Type_idType`, `Yearofeducation_Semester`, `Yearofeducation_Year`, `image`) VALUES
(1,	'1',	'2014-03-16',	'2014-03-16',	'08:00:00',	'2014-03-16',	'18:00:00',	57112005,	1,	1,	1,	2559,	'../img/activity/1.jpg'),
(2,	'การแข่งขัน E-SPORT DOTA 2',	'เพื่อให้ผู้เข้าแข่งขันได้แสดงความสามารถ และมีรางวัลเป็นแรงจูงใจในการแข่งขัน',	'2017-03-23',	'08:30:00',	'2017-03-24',	'17:00:00',	5900017,	9,	1,	3,	2559,	'../img/activity/2.jpg'),
(3,	'การแสดงผลงานนักศึกษาสุดปังจาก 5 หลักสูตร',	'เพื่อให้ผลงานของนักศึกษาได้โชว์ ',	'2017-03-23',	'07:30:00',	'2017-03-26',	'16:20:00',	5900005,	7,	2,	2,	2559,	'../img/activity/3.jpg'),
(4,	'จำลองสตูดิโอวิทยุโทรทัศน์ ถ่ายทอดสดและบันทึกรายการ',	'เพื่อให้นักศึกษาได้แสดงออกในด้านต่างๆ และได้ถ่ายทอด หรือเสนอตัวเอง ให้ชาวโลกได้รู้',	'2017-03-30',	'07:40:00',	'2017-03-31',	'16:40:00',	5900016,	7,	3,	3,	2559,	'../img/activity/4.jpg'),
(5,	'การแสดงเทคโนโลยีโมชันแคปเจอร์',	'เพื่อให้นักศึกษาได้เผชิญกับโลกแห่งความจริง',	'2017-03-29',	'08:00:00',	'2017-03-27',	'15:30:00',	5900001,	4,	5,	2,	2559,	'../img/activity/5.jpg'),
(6,	'การเรียนรู้เทคโนโลยีสำหรับยุคดิจิทัลไทยแลนด์ 4.0',	'เพื่อให้นักศึกษาได้เรียนรู้ถึงเทคโนโลยีสำหรับยุคดิจิทัลไทยแลนด์ 4.0',	'2017-04-03',	'11:20:00',	'2017-04-05',	'09:00:00',	5900006,	9,	3,	1,	2559,	'../img/activity/6.jpg'),
(7,	'การเรียนรู้กระบวนการพัฒนาซอฟต์แวร์',	'เพื่อให้นักศึกษาได้สร้างซอฟต์แวร์และแก้ไขปัญหา ซอฟต์แวร์ได้ตามกระบวนการหรือเป็นขั้นเป็นตอน เพื่อให้ซอฟต์แวร์ที่สร้างมีประสิทธิภาพสูงสุด',	'2017-03-31',	'06:30:00',	'2017-03-31',	'13:50:00',	5900005,	2,	3,	2,	2559,	'../img/activity/7.jpg'),
(8,	'ห้องเรียนอัจฉริยะ',	'เพื่อให้นักศึกษาได้เปลี่ยนสถานที่เรียนใหม่ และมีจุดประสงค์เดียวกัน',	'2017-04-10',	'12:30:00',	'2017-04-10',	'17:30:00',	5900012,	2,	3,	2,	2559,	'../img/activity/8.jpg'),
(9,	'AR Anatomy, VR Gesture',	'เพื่อให้นักศึกษาได้เปลี่ยนทัศนคติทางนี้',	'0000-00-00',	'14:00:00',	'2017-04-24',	'17:30:00',	5900012,	1,	5,	3,	2559,	'../img/activity/9.jpg'),
(10,	'Computer Engineerings Smart Camp (CESCX)',	'เพื่อให้นักศึกษาการเขียนโปรแกรมให้เครื่องมือเชื่อมต่อกับอุปกรณ์อิเล็กทรอนิกส์ผ่านระบบอินเตอร์เน็ต (Internet of Things)\r\nการเขียนโปรแกรมบังคับหุ่นยนต์ (Robot)',	'2017-04-06',	'08:20:00',	'2017-04-08',	'10:00:00',	5900005,	6,	1,	3,	2559,	'../img/activity/10.jpg'),
(11,	'ค่าย Hypercube ',	'การทำเวิร์กช็อปด้านการพัฒนาเว็บไซต์ทั้งในมุมมองของนักออกแบบ, นักเขียน, นักการตลาด และนักโค้ด รวมไปถึงการลงสนามปฏิบัติทำเว็บจริงๆ และการฝ่าด่านกรรมการจากนักสร้างเว็บชื่อดังจากทุกสารทิศทั่วไทย',	'2017-05-01',	'08:20:00',	'2017-05-02',	'15:00:00',	5900006,	6,	1,	2,	2559,	'../img/activity/11.jpg'),
(12,	'SWE ไหวป๊ะ EP.3',	'ฝึกให้นักศึกษาเรียนรู้การทำงานแบบ scrum การทำงานเป็นทีมเวิร์ค',	'2017-03-09',	'09:00:00',	'2017-03-10',	'15:00:00',	5900012,	1,	2,	2,	2559,	'../img/activity/12.jpg'),
(13,	'ITM Network Gram',	'สานสัมพันธ์ระหว่างมหาวิทยาลัย และฝึกทักษะกานแข่งขันวิชาการต่างๆ',	'2017-03-25',	'11:00:00',	'2017-03-27',	'19:45:00',	5900017,	1,	5,	2,	2559,	'../img/activity/13.jpg'),
(14,	'Young webmaster camp',	'การทำเวิร์กช็อปด้านการพัฒนาเว็บไซต์ทั้งในมุมมองของนักออกแบบ, นักเขียน, นักการตลาด และนักโค้ด รวมไปถึงการลงสนามปฏิบัติทำเว็บจริงๆ และการฝ่าด่านกรรมการจากนักสร้างเว็บชื่อดังจากทุกสารทิศทั่วไทย',	'2017-04-14',	'10:10:00',	'2017-04-17',	'08:20:00',	5900001,	1,	1,	3,	2559,	'../img/activity/14.jpg'),
(15,	'โครงการฝึกอบรมเชิงปฏิบัติการคอมพิวเตอร์เบื้องต้น',	'โครงการฝึกอบรมเชิงปฏิบัติการคอมพิวเตอร์เบื้องต้น',	'2017-05-03',	'07:45:00',	'2017-05-05',	'09:40:00',	5900012,	5,	3,	2,	2559,	'../img/activity/15.jpg'),
(16,	'Young Webmaster ',	'ค่ายสำหรับนักสร้างสรรค์เว็บ ก้าวสู่การเปิดโลกมิติใหม่ และก้าวสู่โลกไร้พรมแดนพร้อมกัน',	'2017-05-29',	'09:15:00',	'2017-05-30',	'08:30:00',	5900017,	5,	3,	2,	2559,	'../img/activity/16.jpg'),
(17,	'ค่ายฝึกอบรมเชิงปฏิบัติการวิศวะกรรมซอฟต์แวร์',	'ฝึกให้นักศึกษาเตรียมความพร้อมและก้าวสู่การเป็นวิศวะกรรมซอฟต์แวร์',	'2017-05-12',	'11:20:00',	'2017-05-16',	'16:00:00',	5900012,	2,	4,	3,	2559,	'../img/activity/17.jpg'),
(18,	'ค่ายอบรมเชิงปฏิบัติการ ',	'ค่ายสำหรับน้องๆ ที่สนใจเทคโนโลยีอินเทอร์เน็ตเพื่อสังคม มาร่วมกันนำความรู้สู่ชุมชน มาค่ายนี้ได้ทั้งความรู้, มิตรภาพ และได้ทำประโยชน์ร่วมกับคนในชุมชนด้วย',	'2017-04-27',	'15:00:00',	'2017-04-30',	'11:00:00',	5900005,	1,	3,	3,	2559,	'../img/activity/18.jpg'),
(19,	'Young Mobile Dev Camp 2016',	'มาฝึกพัฒนาแอพลิเคชั่นบนระบบปฏิบัติการแอนดรอยด์ โดยใช้เครื่องมือ App Inventor 2.0  ซึ่งนักศึกษาจะได้เรียนรู้การพัฒนาแอพลิเคชั่นจริง ตั้งแต่กระบวนการแรก จนถึงกระบวนการสุดท้าย...',	'2017-06-04',	'13:00:00',	'2017-06-09',	'12:30:00',	5900016,	9,	4,	3,	2559,	'../img/activity/19.jpg'),
(20,	'SeedCamp by THiNKNET ตอน เขียนเว็บติดจรวด',	'อบรม และถ่ายทอดความรู้และเทคนิคเรื่องการเขียนเว็บแบบหมดเปลือก พร้อมจุดประกายความฝันให้แก่น้องๆ ที่มีใจรักในการเขียนเว็บโดยเฉพาะ',	'2017-06-17',	'15:15:00',	'2017-06-19',	'09:00:00',	5900001,	11,	3,	3,	2559,	'../img/activity/20.jpg'),
(21,	'เขียนโปรแกรมด้วยภาษาซี++',	'เพื่อให้นักศึกษามีพื้นฐานในการเขียนโปรแกรมที่เน้นขึ้น เพื่อเป็นพื้นฐานในการเรียนรู้ ภาษาอื่นต่อไป',	'2017-07-10',	'11:00:00',	'2017-07-15',	'00:00:00',	5900017,	14,	3,	2,	2560,	'../img/activity/21.jpg');

DROP TABLE IF EXISTS `activity_has_student`;
CREATE TABLE `activity_has_student` (
  `Activity_idActivity` int(11) NOT NULL,
  `Student_idStudent` varchar(8) NOT NULL,
  PRIMARY KEY (`Activity_idActivity`,`Student_idStudent`),
  KEY `fk_Activity_has_Student_Student1_idx` (`Student_idStudent`),
  KEY `fk_Activity_has_Student_Activity1_idx` (`Activity_idActivity`),
  CONSTRAINT `fk_Activity_has_Student_Activity1` FOREIGN KEY (`Activity_idActivity`) REFERENCES `activity` (`idActivity`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Activity_has_Student_Student1` FOREIGN KEY (`Student_idStudent`) REFERENCES `student` (`idStudent`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `activity_has_student` (`Activity_idActivity`, `Student_idStudent`) VALUES
(1,	'57112005'),
(1,	'57112914'),
(1,	'58111410'),
(1,	'58112418'),
(1,	'58112970'),
(1,	'58120379'),
(2,	'58112418'),
(2,	'58121856'),
(2,	'58141623'),
(2,	'58143900'),
(2,	'58144239'),
(3,	'57112005'),
(3,	'58117656'),
(3,	'58121435'),
(3,	'58143033'),
(3,	'58143900'),
(3,	'58145236'),
(4,	'57112005'),
(4,	'57112914'),
(4,	'58113341'),
(4,	'58117656'),
(4,	'58121856'),
(4,	'58140500'),
(4,	'58142753'),
(5,	'57112914'),
(5,	'58111410');

DROP TABLE IF EXISTS `activity_have_year`;
CREATE TABLE `activity_have_year` (
  `activity_have_year_idactivity` int(11) NOT NULL,
  `activity_have_year1` int(11) NOT NULL,
  `activity_have_year2` int(11) NOT NULL,
  `activity_have_year3` int(11) NOT NULL,
  `activity_have_year4` int(11) NOT NULL,
  PRIMARY KEY (`activity_have_year_idactivity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `activity_have_year` (`activity_have_year_idactivity`, `activity_have_year1`, `activity_have_year2`, `activity_have_year3`, `activity_have_year4`) VALUES
(1,	1,	0,	1,	1),
(2,	0,	0,	1,	1),
(3,	1,	1,	1,	1),
(4,	0,	0,	1,	1),
(5,	0,	1,	0,	1),
(6,	1,	1,	1,	1),
(7,	0,	1,	1,	1),
(8,	1,	1,	0,	0),
(9,	0,	0,	1,	1),
(10,	0,	1,	0,	1),
(11,	0,	1,	1,	0),
(12,	1,	0,	0,	1),
(13,	0,	1,	0,	1),
(14,	0,	0,	1,	0),
(15,	1,	0,	0,	0),
(16,	0,	0,	0,	1),
(17,	1,	1,	0,	1),
(18,	1,	0,	1,	1),
(19,	0,	1,	1,	1),
(20,	0,	1,	0,	0),
(21,	1,	1,	1,	1),
(22,	1,	1,	1,	0),
(23,	0,	1,	0,	1);

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `idadmin` varchar(8) NOT NULL,
  `FirstName` varchar(25) NOT NULL,
  `LastName` varchar(25) NOT NULL,
  `Password` varchar(45) NOT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `admin` (`idadmin`, `FirstName`, `LastName`, `Password`) VALUES
('57117319',	'pich',	'put',	'0993172559');

DROP TABLE IF EXISTS `location`;
CREATE TABLE `location` (
  `idLocation` int(11) NOT NULL,
  `LocationName` varchar(30) NOT NULL,
  `room` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idLocation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `location` (`idLocation`, `LocationName`, `room`) VALUES
(1,	'หาดท่าสูงบน',	'1'),
(2,	'อาคารนวัตกรรม',	'1500'),
(3,	'อาคารวิจัยและพัฒนา',	'212'),
(4,	'อาคารไทยบุรี',	'1500'),
(5,	'อาคารวิชาการ5',	'236'),
(6,	'อาคารวิชาการ3',	'248'),
(7,	'ศูนย์บรรณ',	'250'),
(8,	'อาคารไทยบุรี',	'1500'),
(9,	'อาคารวิชาการ1',	'214'),
(10,	'อาคารเรียนรวม3',	'3310'),
(11,	'อาคารเรียนรวม5',	'3301'),
(12,	'อาคารเรียนรวม1',	'212'),
(13,	'ในเมือง',	''),
(14,	'กทม',	''),
(15,	'316',	'');

DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `idStudent` varchar(8) NOT NULL,
  `Title` varchar(25) NOT NULL,
  `FirstName` varchar(25) NOT NULL,
  `LastName` varchar(25) NOT NULL,
  `Password` varchar(10) DEFAULT NULL,
  `year` int(10) NOT NULL,
  `image` text CHARACTER SET utf8mb4,
  PRIMARY KEY (`idStudent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `student` (`idStudent`, `Title`, `FirstName`, `LastName`, `Password`, `year`, `image`) VALUES
('57112005',	'นางสาว',	'เสาวลักษณ์',	'สุขสวัสดิ์',	'1000000000',	2559,	'../img/student/0.jpg'),
('57112914',	'นาย',	'ชัชฐาวุฒิ ',	'ไทรทอง',	'1000000001',	2560,	'../img/student/1.jpg'),
('58111410',	'นาย',	'โกเมศ ',	'รักชุม',	'1000000002',	2558,	'../img/student/2.jpg'),
('58112418',	'นาย',	'ฉลองราช',	' ประสิทธิวงศ์',	'1000000003',	2559,	'../img/student/3.jpg'),
('58112970',	'นางสาว',	'ชิดชนก ',	'ยีสมัน',	'1000000004',	2559,	'../img/student/4.jpg'),
('58113341',	'นางสาว',	'ฏอฮีเราะฮ์ ',	'ฮูซัยนี',	'1000000005',	2558,	'../img/student/5.jpg'),
('58117656',	'นาย',	'พรชัย',	' กลิ่นมาลา',	'1000000006',	2558,	'../img/student/6.jpg'),
('58120379',	'นาย',	'วุฒิชัย ',	'เพ็ชร์ทอง',	'1000000007',	2560,	'../img/student/7.jpg'),
('58121435',	'นาย',	'สิทธิชัย ',	'เขียวเข็ม',	'1000000008',	2559,	'../img/student/8.jpg'),
('58121856',	'นางสาว',	'สุทสา ',	'จันหอม',	'1000000009',	2557,	'../img/student/9.jpg'),
('58140500',	'นาย',	'กิตปกรณ์ ',	'ทองเงิน',	'1000000011',	2557,	'../img/student/11.jpg'),
('58141623',	'นาย',	'ทัศวัฒน์ ',	'รัตนพันธ์',	'1000000012',	2557,	'../img/student/12.jpg'),
('58142753',	'นางสาว',	'ประภาพร ',	'มั่งมี',	'1000000013',	2559,	'../img/student/13.jpg'),
('58143033',	'นาย',	'พงศธร ',	'จันด้วง',	'1000000014',	2558,	'../img/student/14.jpg'),
('58143900',	'นาย',	'มูฮัมหมัดมะฮ์ดี ',	'ราโอ๊ะ',	'1000000015',	2559,	'../img/student/15.jpg'),
('58144239',	'นาย',	'ลิขสิทธิ์ ',	'สุขชาญ',	'1000000016',	2558,	'../img/student/16.jpg'),
('58144924',	'นาย',	'ศุภณัฐ ',	'คุ้มปิยะผล',	'1000000017',	2560,	'../img/student/17.jpg'),
('58145236',	'นางสาว',	'สุดารัตน์ ',	'ผิวอ่อน',	'1000000018',	2559,	'../img/student/18.jpg'),
('58147406',	'นาย',	'ธนากร ',	'ลิ้มสกุล',	'1000000019',	2559,	'../img/student/19.jpg'),
('58148602',	'นางสาว',	'สิริพร ',	'พุทธวิริยะ',	'1000000020',	2560,	'../img/student/20.jpg'),
('58149840',	'นาย',	'อลีฟ ',	'รักไทรทอง',	'1000000021',	2559,	'../img/student/21.jpg'),
('58162660',	'นาย',	'สมศักดิ์ ',	'หมั่นถนอม',	'1000000022',	2557,	'../img/student/22.jpg');

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher` (
  `idTeacher` int(11) NOT NULL,
  `Title` varchar(20) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idTeacher`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `teacher` (`idTeacher`, `Title`, `FirstName`, `LastName`, `Password`, `status`, `image`) VALUES
(123,	'test',	'poon',	'1412',	'123',	1,	''),
(5900001,	'อาจารย์ ดร.',	'พุทธิพร ',	'ธนธรรมเมธี',	'12452545',	0,	'../img/teacher/5.jpg'),
(5900005,	'ผู้ช่วยศาสตราจารย์',	'เยาวเรศ ',	'ศิริสถิตย์กุล',	'25456523',	1,	'../img/teacher/3.jpg'),
(5900006,	'อาจารย์ ดร.',	'จิตติมา ',	'ศังขมณี',	'52565415',	0,	'../img/teacher/2.jpg'),
(5900012,	'ผู้ช่วยศาสตราจารย์',	'อุหมาด ',	'หมัดอาด้ำ',	'52452654',	1,	'../img/teacher/1.jpg'),
(5900016,	'อาจารย์',	'ศิริภิญโญ ',	'จันทมุณี',	'52415879',	1,	'../img/teacher/6.jpg'),
(5900017,	'ผู้ช่วยศาสตราจารย์ ',	'ฐิมาพร',	'เพชรแก้ว',	'12345678',	0,	'../img/teacher/4.jpg'),
(57112005,	'ดร.',	'techer',	'test',	'test1234',	1,	'');

DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `idType` int(11) NOT NULL,
  `TypeNamel` varchar(40) NOT NULL,
  PRIMARY KEY (`idType`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `type` (`idType`, `TypeNamel`) VALUES
(1,	'สร้างสรรค์'),
(2,	'วิชาการ'),
(3,	'ค่าย'),
(4,	'นันทนาการบริการอาสาสมัคร'),
(5,	'ทัศนศึกษา');

-- 2018-01-15 14:15:06
