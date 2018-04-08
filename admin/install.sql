DROP TABLE IF EXISTS `#__classes`;
 
CREATE TABLE `#__classes` (
  `id` int(11) NOT NULL auto_increment,
  `NumClass` varchar(8) NOT NULL,
  `TypeClass` varchar(8) NOT NULL,
  `GroupClass` varchar(8) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
 
INSERT INTO `#__classes` (`NumClass`, `TypeClass`, `GroupClass`) VALUES ('1', 'T', 'A'), ('1', 'T', 'B'), ('2', 'T', 'A'), ('2', 'T', 'B'), ('3', 'T', 'A'), ('3', 'T', 'B'), ('4', 'T', 'A'), ('4', 'T', 'B');


DROP TABLE IF EXISTS `#__teachers`;
 
CREATE TABLE `#__teachers` (
  `id` int(11) NOT NULL auto_increment,
  `Forename` varchar(64) NOT NULL,
  `Surname` varchar(64) NOT NULL,
  `Subject0` varchar(128) NOT NULL,
  `Subject1` varchar(128) NOT NULL,
  `Subject2` varchar(128) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
 
INSERT INTO `#__teachers` (`Forename`, `Surname`, `Subject0`, `Subject1`) VALUES ('Marian', 'Kontener', 'Mechanika i budowa powierzchni płaskich', ''), ('Ewelina', 'Żabojadła', 'Montaż urządzeń do obsługi powierzchni płaskich', ''), ('Muchamad', 'Aligandzia', 'Biologia', 'Wychowanie fizyczne'), ('Władysław', 'Kupmiwoda', 'Matematyka', '');


DROP TABLE IF EXISTS `#__subjects`;
 
CREATE TABLE `#__subjects` (
  `id` int(11) NOT NULL auto_increment,
  `NameSubject` varchar(128) NOT NULL,
  `GroupSubject` varchar(128) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
 
INSERT INTO `#__subjects` (`NameSubject`, `GroupSubject`) VALUES ('Matematyka', 'Ścisłe'), ('Mechanika i budowa powierzchni płaskich', 'Zawodowe'), ('Montaż urządzeń do obsługi powierzchni płaskich', 'Zawodowe'), ('Język Polski', 'Humanistyczne'), ('Wychowanie fizyczne', ''), ('Fizyka', 'Ścisłe');


DROP TABLE IF EXISTS `#__places`;
 
CREATE TABLE `#__places` (
  `id` int(11) NOT NULL auto_increment,
  `NamePlace` varchar(128) NOT NULL,
  `NumPlace` float(11) NOT NULL,
  `FloorPlace` float(11) NOT NULL,
  `AddressPlace` varchar(128) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
 
INSERT INTO `#__places` (`NamePlace`, `NumPlace`, `FloorPlace`, `AddressPlace`) VALUES ('Sala', '101', '0', 'Chocianów, ul. Kolonialna 13'), ('Sala', '102', '0', 'Chocianów, ul. Kolonialna 13'), ('Sala', '103', '0', 'Chocianów, ul. Kolonialna 13'), ('Sala', '104', '0', 'Chocianów, ul. Kolonialna 13'), ('Sala', '105', '0', 'Chocianów, ul. Kolonialna 13'), ('Sala', '106', '0', 'Chocianów, ul. Kolonialna 13'), ('Sala', '107', '0', 'Chocianów, ul. Kolonialna 13'), ('Sala', '108', '0', 'Chocianów, ul. Kolonialna 13'), ('Sala', '109', '0', 'Chocianów, ul. Kolonialna 13'), ('Sala', '110', '0', 'Chocianów, ul. Kolonialna 13'), ('Sala', '111', '0', 'Chocianów, ul. Kolonialna 13'), ('Sala', '201', '0', 'Chocianów, ul. Kolonialna 13'), ('Sala', '202', '0', 'Chocianów, ul. Kolonialna 13'), ('Sala', '203', '0', 'Chocianów, ul. Kolonialna 13'), ('Sala', '204', '0', 'Chocianów, ul. Kolonialna 13'), ('Sala', '205', '0', 'Chocianów, ul. Kolonialna 13'), ('Sala', '206', '0', 'Chocianów, ul. Kolonialna 13'), ('Sala', '207', '0', 'Chocianów, ul. Kolonialna 13'), ('Sala', '208', '0', 'Chocianów, ul. Kolonialna 13'), ('Sala', '209', '0', 'Chocianów, ul. Kolonialna 13'), ('Sala', '210', '0', 'Chocianów, ul. Kolonialna 13'), ('Sala', '211', '0', 'Chocianów, ul. Kolonialna 13'), ('Czytelnia', '112', '0', 'Chocianów, ul. Kolonialna 13'), ('Sprzątanie świata', '', '', 'Chocianów'), ('Dom', '', '', 'Chocianów');


DROP TABLE IF EXISTS `#__hours`;
 
CREATE TABLE `#__hours` (
  `id` int(11) NOT NULL auto_increment,
  `NumHour` float(11) NOT NULL,
  `StartHour` time NOT NULL,
  `EndHour` time NOT NULL,
  `TypeHour` varchar(128) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
 
INSERT INTO `#__hours` (`NumHour`, `StartHour`, `EndHour`, `TypeHour`) VALUES ('1', '08:10:00', '08:55:00', 'Normalna'), ('2', '09:00:00', '09:45:00', 'Normalna'), ('3', '09:50:00', '10:35:00', 'Normalna'), ('1', '08:10:00', '08:40:00', 'Skrócona'), ('2', '08:45:00', '09:15:00', 'Skrócona'), ('3', '08:20:00', '09:50:00', 'Skrócona'), ('1', '08:10:00', '10:10:00', 'Zawodowa');






DROP TABLE IF EXISTS `#__replacementsall`;
 
CREATE TABLE `#__replacementsall` (
  `id` int(11) NOT NULL auto_increment,
  `TypeReplace` varchar(128) NOT NULL,
  `TargetDate` date NOT NULL,
  `CreateDateTime` datetime NOT NULL,
  `EditDateTime` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
 
INSERT INTO `#__replacementsall` (`TypeReplace`, `TargetDate`, `CreateDateTime`, `EditDateTime`) VALUES ('Zwykłe zastępstwa', '2014-10-31', '2015-06-01 15:44:18', '2015-06-01 15:44:18'), ('Zwykłe zastępstwa', '2014-11-01', '2015-06-01 13:12:37', '2015-06-01 13:12:37');



DROP TABLE IF EXISTS `#__replacements1`;
 
CREATE TABLE `#__replacements1` (
  `id` int(11) NOT NULL auto_increment,
  `ClassId` int(11) NOT NULL,
  `TeacherId` int(11) NOT NULL,
  `SubjectId` int(11) NOT NULL,
  `PlaceId` int(11) NOT NULL,
  `HourId` int(11) NOT NULL,
  `HourVar` int(1) NOT NULL,
  `TeacherAbsentId` int(11) NOT NULL,
  `SubjectAbsentId` int(11) NOT NULL,
  `PlaceAbsentId` int(11) NOT NULL,
  `HourAbsentId` int(11) NOT NULL,
  `HourAbsentVar` int(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
 
INSERT INTO `#__replacements1` (`ClassId`, `TeacherId`, `SubjectId`, `PlaceId`, `HourId`, `HourVar`, `TeacherAbsentId`, `SubjectAbsentId`, `PlaceAbsentId`, `HourAbsentId`, `HourAbsentVar`) VALUES ('2', '2', '2', '2', '2', '0', '2', '2', '2', '2', '0'), ('3', '3', '3', '3', '3', '0', '3', '3', '3', '3', '0');


DROP TABLE IF EXISTS `#__replacements2`;
 
CREATE TABLE `#__replacements2` (
  `id` int(11) NOT NULL auto_increment,
  `ClassId` int(11) NOT NULL,
  `TeacherId` int(11) NOT NULL,
  `SubjectId` int(11) NOT NULL,
  `PlaceId` int(11) NOT NULL,
  `HourId` int(11) NOT NULL,
  `HourVar` int(1) NOT NULL,
  `TeacherAbsentId` int(11) NOT NULL,
  `SubjectAbsentId` int(11) NOT NULL,
  `PlaceAbsentId` int(11) NOT NULL,
  `HourAbsentId` int(11) NOT NULL,
  `HourAbsentVar` int(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
 
INSERT INTO `#__replacements2` (`ClassId`, `TeacherId`, `SubjectId`, `PlaceId`, `HourId`, `HourVar`, `TeacherAbsentId`, `SubjectAbsentId`, `PlaceAbsentId`, `HourAbsentId`, `HourAbsentVar`) VALUES ('1', '2', '', '3', '2', '0', '1', '2', '3', '4', '0'), ('4', '3', '0', '2', '1', '0', '4', '4', '3', '4', '0'), ('1', '2', '', '3', '1', '0', '1', '2', '3', '4', '0'), ('4', '3', '0', '2', '2', '0', '4', '4', '3', '4', '0');






DROP TABLE IF EXISTS `#__hello`;
 
CREATE TABLE `#__hello` (
  `id` int(11) NOT NULL auto_increment,
  `greeting` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
 
INSERT INTO `#__hello` (`greeting`) VALUES ('Nowy system zastępstw w fazie beta. Wróć później.');