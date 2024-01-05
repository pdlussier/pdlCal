--
-- SQL DUMP 2023.08.14 @ 22:45
-- Calendar: Dating Up Yours
-- Calendar ID: mycal
--
-- LuxCal version: 4.7.7M
-- http://www.luxsoft.eu
--

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Table mycal_categories
--

DROP TABLE IF EXISTS `mycal_categories`;

CREATE TABLE `mycal_categories` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(48) DEFAULT NULL,
  `symbol` varchar(8) DEFAULT NULL,
  `sequence` tinyint(4) NOT NULL DEFAULT 1,
  `repeat` tinyint(4) NOT NULL DEFAULT 0,
  `noverlap` tinyint(4) NOT NULL DEFAULT 0,
  `olapGap` tinyint(4) NOT NULL DEFAULT 0,
  `olErrMsg` varchar(56) DEFAULT NULL,
  `defSlot` smallint(6) NOT NULL DEFAULT 0,
  `fixSlot` tinyint(4) NOT NULL DEFAULT 0,
  `approve` tinyint(4) NOT NULL DEFAULT 0,
  `dayColor` tinyint(4) NOT NULL DEFAULT 0,
  `color` varchar(8) DEFAULT NULL,
  `bgColor` varchar(8) DEFAULT NULL,
  `checkBx` tinyint(4) NOT NULL DEFAULT 0,
  `checkLb` varchar(16) NOT NULL DEFAULT 'approved',
  `checkMk` varchar(8) NOT NULL DEFAULT '&#x2713;',
  `subName1` varchar(20) DEFAULT NULL,
  `subColor1` varchar(8) DEFAULT NULL,
  `subBgrnd1` varchar(8) DEFAULT NULL,
  `subName2` varchar(20) DEFAULT NULL,
  `subColor2` varchar(8) DEFAULT NULL,
  `subBgrnd2` varchar(8) DEFAULT NULL,
  `subName3` varchar(20) DEFAULT NULL,
  `subColor3` varchar(8) DEFAULT NULL,
  `subBgrnd3` varchar(8) DEFAULT NULL,
  `subName4` varchar(20) DEFAULT NULL,
  `subColor4` varchar(8) DEFAULT NULL,
  `subBgrnd4` varchar(8) DEFAULT NULL,
  `urlLink` varchar(120) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `mycal_categories` VALUES
('1','Regular Event','','1','0','0','0','','0','0','0','3','#303030','','0','approved','✓','','','','','','','','','','','','','','0'),
('2','Publication Date','','0','0','0','0','event overlap - select an other time','0','0','0','3','#303030','','0','On Track','✓','Special Topic','','','Recurring Feature','','','','','','','','','','-1'),
('3','Promo End','','0','0','0','0','event overlap - select an other time','0','0','0','3','#303030','','0','','✓','','','','','','','','','','','','','','-1'),
('4','Publication Date - Feature','','5','0','0','0','event overlap - select an other time','0','0','0','0','#4265C9','','0','','✓','On Going - Fixed','#000000','#E9FFD4','Recurring - Fixed','#333333','#EFFF94','Series -Fixed Period','#555555','#FFE37D','New - Launch','#FFFFFF','#FF852E','','0'),
('5','Shooting - Police','','2','0','0','0','event overlap - select an other time','0','0','0','0','#000000','#FF6666','0','','✓','','','','','','','','','','','','','','0'),
('6','Shooting - Citizen','','4','0','0','0','event overlap - select an other time','0','0','0','0','#303030','#FFAB66','0','','✓','','','','','','','','','','','','','','0'),
('7','Shooting - Mass','','3','0','0','0','event overlap - select an other time','0','0','0','0','#FFFFFF','#AD2828','0','','✓','','','','','','','','','','','','','','0'),
('8','MIDDLE-EAST','','6','0','0','0','event overlap - select an other time','0','0','0','0','#FFFFFF','#C79B5A','0','','✓','War','#FFFFFF','#B84412','Political','#FFFFFF','#FFCA61','Other','#FFFFFF','#C79B5A','','','','','0'),
('9','Russo-Ukraine War','','7','0','0','0','event overlap - select an other time','0','0','0','3','#FADD1B','#FF081C','0','','✓','','','','','','','','','','','','','','0'),
('10','US Politics','','8','0','0','0','event overlap - select an other time','0','0','0','0','#FFF25C','#1C3B73','0','','✓','Dems','#FFFFFF','#78BBFF','GOP','#FFFFFF','#D89EFF','','','','','','','','0');

-- --------------------------------------------------------

--
-- Table mycal_events
--

DROP TABLE IF EXISTS `mycal_events`;

CREATE TABLE `mycal_events` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `private` tinyint(4) NOT NULL DEFAULT 0,
  `title` varchar(255) DEFAULT NULL,
  `venue` varchar(128) DEFAULT NULL,
  `text1` text DEFAULT NULL,
  `text2` varchar(255) DEFAULT NULL,
  `text3` varchar(255) DEFAULT NULL,
  `attach` text DEFAULT NULL,
  `catID` mediumint(9) NOT NULL DEFAULT 1,
  `scatID` tinyint(4) NOT NULL DEFAULT 0,
  `userID` mediumint(9) DEFAULT NULL,
  `editor` varchar(48) DEFAULT NULL,
  `approved` tinyint(4) NOT NULL DEFAULT 0,
  `checked` text DEFAULT NULL,
  `notEml` tinyint(4) NOT NULL DEFAULT -1,
  `notSms` tinyint(4) NOT NULL DEFAULT -1,
  `notRecip` varchar(255) DEFAULT NULL,
  `sDate` varchar(10) DEFAULT NULL,
  `eDate` varchar(10) NOT NULL DEFAULT '9999-00-00',
  `xDates` text DEFAULT NULL,
  `sTime` varchar(5) DEFAULT NULL,
  `eTime` varchar(5) NOT NULL DEFAULT '99:00',
  `rType` tinyint(4) NOT NULL DEFAULT 0,
  `rInterval` tinyint(4) NOT NULL DEFAULT 0,
  `rPeriod` tinyint(4) NOT NULL DEFAULT 0,
  `rMonth` tinyint(4) NOT NULL DEFAULT 0,
  `rUntil` varchar(10) NOT NULL DEFAULT '9999-00-00',
  `aDateTime` varchar(16) NOT NULL DEFAULT '9999-00-00 00:00',
  `mDateTime` varchar(16) NOT NULL DEFAULT '9999-00-00 00:00',
  `status` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `mycal_events` VALUES
('1','0','0','Sam &amp; S. Ham','','A testy testing day','All','None','','1','0','2','pdlussier','0','','-1','-1','pdlussier@pdlussier.ca;admin@pdlussier.ca','2020-04-17','2020-04-18','','11:00','11:30','0','0','0','0','9999-00-00','2020-04-17 02:50','2020-04-18 15:18','0'),
('2','0','0','tfser','','','','','','1','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;admin@pdlussier.ca','2020-04-22','9999-00-00','','11:00','11:30','0','0','0','0','9999-00-00','2020-04-18 15:47','9999-00-00 00:00','0'),
('3','0','0','e','','','','','','1','0','2','pdlussier','0','','-1','-1','pdlussier@pdlussier.ca;admin@pdlussier.ca','2020-04-23','2020-04-24','','08:00','08:30','0','0','0','0','9999-00-00','2020-04-18 15:48','2020-04-18 15:49','-1'),
('4','0','0','Biden Inauguration','','','','','','1','0','1','pdlussier','0','','-1','-1','','2021-01-20','9999-00-00','','00:00','23:59','0','0','0','0','9999-00-00','2021-01-22 00:10','2021-01-23 00:12','0'),
('5','0','0','DMS&amp;UY - Downtime &amp; Rebuild','','','','','','1','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;admin@pdlussier.ca','2021-01-05','2021-01-19','','00:00','23:59','0','0','0','0','9999-00-00','2021-01-22 00:12','9999-00-00 00:00','0'),
('6','0','0','Site Re-Launch','','','','','','4','1','1','','0','','-1','-1','','2021-01-23','9999-00-00','','00:00','23:59','0','0','0','0','9999-00-00','2021-01-23 00:41','9999-00-00 00:00','0'),
('7','0','0','Myanmar - Military Coup','','Military take over; government held in confinement, inc. Aung Soo Kyi','','','','1','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2021-01-30','9999-00-00','','07:30','08:00','0','0','0','0','9999-00-00','2021-02-03 23:50','9999-00-00 00:00','0'),
('8','0','0','Joe Biden - Presidential Transition','','Official inauguration - Highly controlled and closed event.','','','','1','0','2','pdlussier','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2021-01-20','9999-00-00','','12:00','14:00','0','0','0','0','9999-00-00','2021-02-03 23:51','9999-00-00 00:00','0'),
('9','0','0','Morgan Stanley &amp; Bitcoin','','Morgan Stanley becomes the first big U.S. bank to offer its wealthy clients access to bitcoin funds','<a class=''link'' href=''https://www.cnbc.com/2021/03/17/bitcoin-morgan-stanley-is-the-first-big-us-bank-to-offer-wealthy-clients-access-to-bitcoin-funds.html'' target=''_blank''>www.cnbc.com/2021/03/17/bitcoin-morgan-stanley-is-the-first-big-us-bank-to-offer-w','','','1','0','2','pdlussier','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2021-03-17','9999-00-00','','00:00','23:59','0','0','0','0','9999-00-00','2021-03-24 13:43','9999-00-00 00:00','0'),
('10','0','0','Atlanta Shooting - Spas','Atlanta, GA','On March 16, 2021, a series of mass shootings occurred at three spas or massage parlors in the metropolitan area of Atlanta, Georgia, United States. Eight people were killed, six of whom were Asian women, and one other person was wounded. A suspect, 21-year-old Robert Aaron Long, was taken into custody later that day. According to police, Long said he was motivated by a sexual addiction that was at odds with his religious beliefs.','<a class=''link'' href=''https://en.wikipedia.org/wiki/Killing_of_Rayshard_Brooks'' target=''_blank''>en.wikipedia.org/wiki/Killing_of_Rayshard_Brooks</a>','Shooting, Mass','','1','0','2','pdlussier','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2021-03-16','9999-00-00','','16:50','17:50','0','0','0','0','9999-00-00','2021-03-25 10:14','2021-04-17 01:07','0'),
('11','0','0','Biden - First Address','','Biden to address nation for first time since inauguration.','','','','1','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2021-03-25','9999-00-00','','00:00','23:59','0','0','0','0','9999-00-00','2021-03-25 10:15','9999-00-00 00:00','0'),
('12','0','0','Daunte Wright Shooting - Police Taser FU','Minnesota, US','<a class=''link'' href=''https://www.bostonglobe.com/2021/04/12/nation/police-officer-who-fired-shot-that-killed-daunte-wright-intended-discharge-taser-chief-says/'' target=''_blank''>www.bostonglobe.com/2021/04/12/nation/police-officer-who-fired-shot-that-killed-daunte-wright-intended-discharge-taser-chief-says/</a>','','','','1','0','2','pdlussier','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2021-04-11','9999-00-00','','16:30','20:00','0','0','0','0','9999-00-00','2021-04-14 00:27','9999-00-00 00:00','0'),
('13','0','0','Riots Across Major US Cities','','Protests against police violence turn into rioting and looting.','','','','1','0','2','pdlussier','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2021-04-11','9999-00-00','','20:00','22:45','1','1','1','0','2021-04-14','2021-04-14 00:30','9999-00-00 00:00','0'),
('14','0','0','Police Shooting - Ohio Hospital','Ohio, US','Standoff during arrest in hospital - victim was black, armed with a gun; weapon discharged during tasing and fight.<br><a class=''link'' href=''https://ca.news.yahoo.com/video-shows-police-shooting-ohio-002654681.html'' target=''_blank''>ca.news.yahoo.com/video-shows-police-shooting-ohio-002654681.html</a>','','Police Shooting','','5','0','2','pdlussier','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2021-04-14','9999-00-00','','17:30','18:00','0','0','0','0','9999-00-00','2021-04-17 00:30','2021-04-19 12:11','0'),
('15','0','0','Video Release - Shooting Adam Toledo, 13','Chicago, IL','29-Mar-2021 Shooting of black teen in alleyway - Public made aware with vid release<br><a class=''link'' href=''https://www.foxnews.com/us/chicago-braces-for-thursday-release-of-video-in-adam-toledo-police-shooting-death'' target=''_blank''>www.foxnews.com/us/chicago-braces-for-thursday-release-of-video-in-adam-toledo-police-shooting-death</a>','','','','5','0','2','pdlussier','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2021-04-15','9999-00-00','','19:30','20:00','0','0','0','0','9999-00-00','2021-04-17 00:37','2021-04-19 12:11','0'),
('16','0','0','Shooting Adam Toledo, 13','Chicago, IL','See 15-Apr-2021<br>Shooting of black teen in alley way','','Police Shootings','','1','0','2','pdlussier','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2021-03-29','9999-00-00','','22:00','22:30','0','0','0','0','9999-00-00','2021-04-17 00:38','2021-04-17 00:40','-1'),
('17','0','0','Shooting Adam Toledo, 13','Chicago, IL','See 15-Apr-2021<br>Event occurred @ 2:39am<br>Black teen shot in alleyway; said to be holding gun','','','','1','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2021-03-29','9999-00-00','','00:30','01:00','0','0','0','0','9999-00-00','2021-04-17 00:40','9999-00-00 00:00','0'),
('18','0','0','Biden Announces End of Afghan War','Afghanistan','Passed off as hero ending war but Trump already had peace deal promising withdrawal by 1-May-2021; Biden actually extending stay.','','','','1','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2021-04-14','9999-00-00','','15:30','16:00','0','0','0','0','9999-00-00','2021-04-17 00:43','9999-00-00 00:00','0'),
('19','0','0','Shooting - 8 Fed Ex employees','Indianapolis, IN','Shooter - Brandon Scott Hole, 19 (white) - Dead <br>Was on FBI&#039;s radar. 4 Sikhs where victims; one victim was pregnant. <br><a class=''link'' href=''https://www.cbc.ca/news/world/shooting-fedex-indianapolis-1.5990075'' target=''_blank''>www.cbc.ca/news/world/shooting-fedex-indianapolis-1.5990075</a>','','Shooting - Mass','','1','0','2','pdlussier','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2021-04-16','9999-00-00','','07:00','08:00','0','0','0','0','9999-00-00','2021-04-17 00:53','2021-04-17 00:57','-1'),
('20','0','0','Shooting - 8 Fed Ex Employees','','Happened late at night<br>Shooter - Brandon Scott Hole, 19 (white) - Dead <br>Was on FBI&#039;s radar. 4 Sikhs where victims; one victim was pregnant.','<a class=''link'' href=''https://www.cbc.ca/news/world/shooting-fedex-indianapolis-1.5990075'' target=''_blank''>www.cbc.ca/news/world/shooting-fedex-indianapolis-1.5990075</a>','Shooting, Mass','','7','0','2','pdlussier','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2021-04-16','9999-00-00','','00:30','01:00','0','0','0','0','9999-00-00','2021-04-17 00:55','2021-04-19 12:10','0'),
('21','0','0','Shooting - Rayshard Brooks, 27','Atlanta, GA','Shot and killed by an Atlanta Police Department officer on the evening of June 12, 2020. Brooks had resisted arrest and wrested a taser from one officer as he wrestled on the ground with the two police officers and punched one of them.','<a class=''link'' href=''https://en.wikipedia.org/wiki/Killing_of_Rayshard_Brooks'' target=''_blank''>en.wikipedia.org/wiki/Killing_of_Rayshard_Brooks</a>','Police Shooting','','1','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2020-06-12','9999-00-00','','22:00','23:59','0','0','0','0','9999-00-00','2021-04-17 01:03','9999-00-00 00:00','0'),
('22','0','0','Shooting - Ahmaud Arbery, 25','Brunswick, GA','2 white men claim they thought Arbery was a buglar (he was checking wiring on property); fight broke out; Arbery was shot','<a class=''link'' href=''https://www.the-sun.com/news/884444/ahmaud-arberys-mom-says-son-checking-wiring-electrician/'' target=''_blank''>www.the-sun.com/news/884444/ahmaud-arberys-mom-says-son-checking-wiring-electrician/</a>','Shooting - Citizens','','1','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2020-02-23','9999-00-00','','14:00','14:30','0','0','0','0','9999-00-00','2021-04-17 21:13','9999-00-00 00:00','0'),
('23','0','0','Shooting - 3 Dead - black shooter','Austin, TX','Stephen Nicholas Broderick, 47<br>At least 3 dead.<br>Broderick, according to local reports is a former Travis County Sheriff’s detective. He was previously charged with sexual assault of a child and posted bail last year.','<a class=&#039;link&#039; href=&#039;https://www.theepochtimes.com/shooting-in-texas-capital-leaves-at-least-3-dead-police-hunt-for-armed-suspect_3780908.html?utm_source=pushengage&#039; target=&#039;_blank&#039;>www.theepochtimes.com/shooting-in-texas-ca','Shooting - Citizen','','5','0','2','pdlussier','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2021-04-18','9999-00-00','','14:00','14:30','0','0','0','0','9999-00-00','2021-04-18 18:07','2021-04-19 12:09','0'),
('24','0','0','Shooting - @2 National Guardsmen','Minneapolis, MN','The Minnesota Guard said the men were hurt when several shots came from a light-coloured SUV around 4:19 a.m. One was treated at a hospital for an injury for shattered glass, and the other Guard member’s injuries were described as superficial.','<a class=&#039;link&#039; href=&#039;https://www.theglobeandmail.com/world/article-two-national-guardsmen-injured-after-shots-fired-while-on-patrol-in/&#039; target=&#039;_blank&#039;>www.theglobeandmail.com/world/article-two-national-guardsmen-injured-af','Shooting at Cops, Citizens','','6','0','2','pdlussier','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2021-04-18','9999-00-00','','04:19','05:00','0','0','0','0','9999-00-00','2021-04-18 22:46','2021-04-19 12:08','0'),
('25','0','0','Shooting - White man - Car Jacking','Burnsville, MN','Police in suburban Minneapolis shot and killed a (white) man in his 20s Sunday afternoon who was allegedly involved in a carjacking and fired shots at pursuing officers.','<a class=''link'' href=''https://abcnews.go.com/US/wireStory/minnesota-authorities-respond-police-involved-shooting-77155029'' target=''_blank''>abcnews.go.com/US/wireStory/minnesota-authorities-respond-police-involved-shooting-77155029</a>','','','5','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2021-04-18','9999-00-00','','16:30','17:00','0','0','0','0','9999-00-00','2021-04-19 12:13','9999-00-00 00:00','0'),
('26','0','0','Verdict - Derek Chauvin','Minneapolis, Minnesota','Guilty on all counts.<br>2nd &amp; 3rd degree murder &amp; manslaughter','<a class=''link'' href=''https://globalnews.ca/news/7777256/chauvin-guilty-verdict-gta-reaction/'' target=''_blank''>globalnews.ca/news/7777256/chauvin-guilty-verdict-gta-reaction/</a>','','','5','0','2','pdlussier','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2021-04-21','9999-00-00','','16:00','16:30','0','0','0','0','9999-00-00','2021-04-21 21:20','9999-00-00 00:00','0'),
('27','0','0','Justified Shooting - Ma&#039;Khia Bryant, 16','Columbus, OH','Shot while Armed with knife.<br>A Columbus, Ohio, police officer shot and killed a Black teenager Tuesday afternoon after she attempted to cut two females with a knife.','<a class=''link'' href=''https://www.ctvnews.ca/world/columbus-police-fatally-shoot-black-teen-swinging-knife-1.5396163'' target=''_blank''>www.ctvnews.ca/world/columbus-police-fatally-shoot-black-teen-swinging-knife-1.5396163</a>','White Cop Shoots Black Girl','','5','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2021-04-21','9999-00-00','','14:00','14:30','0','0','0','0','9999-00-00','2021-04-21 21:25','9999-00-00 00:00','0'),
('28','0','0','Shooting - 1 Dead, 4 Inj. - Shooter Arrested','San Diego, CA','Classified as &quot;Mass shooting&quot; due to number of victims, but events seem to indicate otherwise.<br>The first shooting was reported at 10:30 p.m. at Fifth Avenue and J Street. When officers arrived, they found a 28-year-old man on the sidewalk with a gunshot wound to his upper body; he died.<br>He then headed north on Fifth Avenue, confronted a group of men and opened fire again, injuring four.','<a class=''link'' href=''https://www.gunviolencearchive.org/incident/1984807?__cf_chl_jschl_tk__=b42b219bcbb068683f6adf7b063c50f87376723e-1619218284-0-AcDI1dEZmY0Rrc28H67lmiuStQNtzjJgwawjqoaN8oCNrkU9SDO7yvPFXW1MlxMqJUekzAnNK-kVj-KlZtMoE0w3TbkO9ZcGgUt4MyOkuHi','Shooting, (Mass)','','7','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2021-04-22','9999-00-00','','22:30','23:00','0','0','0','0','9999-00-00','2021-04-23 19:09','9999-00-00 00:00','0'),
('29','0','0','Mass Shooting - 1 Critical, 4 Injured','Atlanta, GA','','<a class=''link'' href=''https://www.gunviolencearchive.org/incident/1982260'' target=''_blank''>www.gunviolencearchive.org/incident/1982260</a>','Shooting, Mass','','7','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2021-04-19','9999-00-00','','22:30','23:30','0','0','0','0','9999-00-00','2021-04-23 19:23','9999-00-00 00:00','0'),
('30','0','0','Mass Shooting - 3 Dead, 3 Injured','Kenosha, WI','A man has been arrested in connection with the Kenosha, Wisconsin, shooting that killed three people and wounded three others early Sunday, authorities said. <br>In a Monday statement, Kenosha County Sheriff David G. Beth identified the suspect as Rakayo Alandis Vinson, 24.<br>The deceased victims were Kevin T. Donaldson, Cedric D. Gaston and Atkeem D. Stevenson, according to a second news release from the Kenosha County Sheriff&#039;s Department.<br>Gunfire broke out both inside and outside the The Somers House tavern around 12:40 a.m. Sunday.','<a class=''link'' href=''https://www.cnn.com/2021/04/18/us/kenosha-shooting-tavern-sunday/index.html'' target=''_blank''>www.cnn.com/2021/04/18/us/kenosha-shooting-tavern-sunday/index.html</a>','Shooting, Black Shooter',';20210423192655MassShooter-210419134053-rakayo-alandis-vinson-mug-medium-plus-169.jpg','7','0','2','pdlussier','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2021-04-19','9999-00-00','','00:40','01:00','0','0','0','0','9999-00-00','2021-04-23 19:26','9999-00-00 00:00','0'),
('31','0','0','MIDDLE-EAST - Turkey Attacks Syria','Syria','The Turkish airforce conducted its first strikes in 17 months against a zone in north Syria held by Kurdish militia on Saturday night.<br><br>&quot;A Turkish fighter jet has struck military positions of Syrian Democratic Forces (SDF) in Saida village in Ain Issa countryside... which caused loud explosions,&quot; the Syrian Observatory for Human Rights (SOHR) said.','Turkey conducts first air strikes in months against Kurdish zone in Syria<br>Turkey conducts first air strikes in months against Kurdish zone in Syria','',';20210512154038Wion-Turkey-Syria-attack-21Mar2021.png','8','1','2','pdlussier','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2021-03-21','9999-00-00','','08:00','08:30','0','0','0','0','9999-00-00','2021-05-12 15:40','9999-00-00 00:00','0'),
('32','0','0','6-Jan Insurgency - 1st Anniversary','','Was due to give speech; he cancelled at last minute, to the relief of everyone.','6-Jan','Trump','','1','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2022-01-06','9999-00-00','','00:00','23:59','0','0','0','0','9999-00-00','2022-01-06 15:57','9999-00-00 00:00','0'),
('33','0','0','MLK - Day - USA','','','','','','1','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2022-01-17','9999-00-00','','00:00','23:59','0','0','0','0','9999-00-00','2022-01-18 03:31','9999-00-00 00:00','0'),
('34','0','0','Imran Khan - Launches National Security Policy','','','','','','1','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2022-01-14','9999-00-00','','00:00','23:59','0','0','0','0','9999-00-00','2022-01-18 03:32','9999-00-00 00:00','0'),
('35','0','0','JCPOA - Nuclear Deal','','Joe Biden removes important sanctions','US Foreign Policies','<a class=''link'' href=''https://downmystreetandupyours.org/dms-and-uy/isil-syria-iran-us-and-sanctions-oh-my/'' target=''_blank''>downmystreetandupyours.org/dms-and-uy/isil-syria-iran-us-and-sanctions-oh-my/</a>','','1','0','2','pdlussier','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2022-02-04','9999-00-00','','00:00','23:59','0','0','0','0','9999-00-00','2022-02-07 20:54','9999-00-00 00:00','0'),
('36','0','0','ISIL Leader Killed','','US ground troops conduct raid in Ameht, Syria; ISIL leader Abu Ibrahim al-Hashimi al-Qurayshi died.','US Foreign Policies','<a class=''link'' href=''https://downmystreetandupyours.org/dms-and-uy/isil-syria-iran-us-and-sanctions-oh-my/'' target=''_blank''>downmystreetandupyours.org/dms-and-uy/isil-syria-iran-us-and-sanctions-oh-my/</a>','','1','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2022-02-03','9999-00-00','','00:30','03:00','0','0','0','0','9999-00-00','2022-02-07 20:57','9999-00-00 00:00','0'),
('37','0','0','Freedom Convoy','Ottawa, Canada','Ottawa - Day Two - Evacuation<br><a class=''link'' href=''https://ottawa.ctvnews.ca/police-take-more-aggressive-stance-to-push-freedom-convoy-protesters-in-ottawa-back-1.5788097'' target=''_blank''>ottawa.ctvnews.ca/police-take-more-aggressive-stance-to-push-freedom-convoy-protesters-in-ottawa-back-1.5788097</a>','','Freedom Convoy - Evacuation',';20220219114024FreedomConvoy-2022-Ottawa-Eviction.png','1','0','2','pdlussier','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2022-02-19','9999-00-00','','10:00','14:00','0','0','0','0','9999-00-00','2022-02-19 11:35','9999-00-00 00:00','0'),
('38','0','0','Freedom Convoy','Ottawa, Canada','Clearing Operation Begins; Police taking action to remove protesters','','Freedom Convoy - Evacuation','','1','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2022-02-18','9999-00-00','','07:00','17:00','0','0','0','0','9999-00-00','2022-02-19 11:43','9999-00-00 00:00','0'),
('39','0','0','Russia invades Ukraine','Ukraine','Putin launches full-scale invasion of Ukraine. Comes after sending troops in Donbas region; day after recognizing Luhansk (LPR) and Donetsk (DPR) as independent states and sending peacekeepers.','Ukraine-Russia Crisis','Invasion - official war declared','','1','0','2','pdlussier','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2022-02-24','9999-00-00','','00:00','23:59','0','0','0','0','9999-00-00','2022-03-03 16:44','9999-00-00 00:00','0'),
('40','0','0','Repeal Title 42','USA','Official date given by Biden admin in late March to repeal the Trump-era policy that allows Border Security to turn back anyone, without explanation, based on COVID-19.','','','','1','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2022-05-23','9999-00-00','','00:00','23:59','0','0','0','0','9999-00-00','2022-04-20 11:16','9999-00-00 00:00','0'),
('41','0','0','Twitter Files Released','','Elon Musk / Matt Taibi - Big reveal?','Twitter Files','Censorship','','1','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2022-12-02','9999-00-00','','00:00','23:59','0','0','0','0','9999-00-00','2022-12-13 22:21','9999-00-00 00:00','0'),
('42','0','0','Bill Vote -AOC Lone Wolf','','<a class=''link'' href=''https://www.msn.com/en-ca/news/other/rep-alexandria-ocasio-cortez-was-the-lone-democrat-in-congress-to-oppose-the-1-7-trillion-federal-spending-bill/ar-AA15BUcs?ocid=msedgntp&amp;cvid=eedbe6c415fe4dd7b45a59b189be614d'' target=''_blank''>www.msn.com/en-ca/news/other/rep-alexandria-ocasio-cortez-was-the-lone-democrat-in-congress-to-oppose-the-1-7-trillion-federal-spending-bill/ar-AA15BUcs?ocid=msedgntp&amp;cvid=eedbe6c415fe4dd7b45a59b189be614d</a>','Progressives','US Politics','','1','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2022-12-23','9999-00-00','','12:00','12:30','0','0','0','0','9999-00-00','2022-12-23 16:59','9999-00-00 00:00','0'),
('43','0','0','Jeff Beck - Died','','1944 - 2023<br>Meningitis','','','','1','0','2','pdlussier','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-01-11','9999-00-00','','07:30','08:00','0','0','0','0','9999-00-00','2023-01-11 22:58','2023-01-13 15:22','-1'),
('44','0','0','Twitter Files - Russiagate','','Matt Taibi and Twitter communications conclusively prove that Russiagate was entirely falsified by Dem elements.','Twitter Files','Russiagate','','1','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-01-12','9999-00-00','','00:00','23:59','0','0','0','0','9999-00-00','2023-01-13 15:21','9999-00-00 00:00','0'),
('45','0','0','Jeff Beck - Died','','1944 - 2023; 78 yrs old<br>Bacterial Meningitis','People','Musicians','','1','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-01-10','9999-00-00','','21:30','22:00','0','0','0','0','9999-00-00','2023-01-13 15:23','9999-00-00 00:00','0'),
('46','0','0','Secs. Blinken and Austin Hold News Conference with Japanese Counterparts','','<a class=''link'' href=''https://www.c-span.org/video/?525303-1/secs-blinken-austin-hold-news-conference-japanese-counterparts'' target=''_blank''>www.c-span.org/video/?525303-1/secs-blinken-austin-hold-news-conference-japanese-counterparts</a>','USA - Japan','Defense','','1','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-01-11','9999-00-00','','09:00','09:30','0','0','0','0','9999-00-00','2023-01-15 10:08','9999-00-00 00:00','0'),
('47','0','0','Rogan v. Soros','','<a class=''link'' href=''https://www.newsweek.com/joe-rogan-accused-disgusting-antisemitism-over-george-soros-views-podcast-1774270'' target=''_blank''>www.newsweek.com/joe-rogan-accused-disgusting-antisemitism-over-george-soros-views-podcast-1774270</a>','Leftist Manipulation','Soros','','1','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-01-11','9999-00-00','','20:30','21:00','0','0','0','0','9999-00-00','2023-01-17 22:38','9999-00-00 00:00','0'),
('48','0','0','Rogan v. Soros','','When &quot;people&quot; turned; attacked Rogan. See 11-Jan-2023','Leftist Manipulation','Soros','','1','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-01-16','9999-00-00','','21:00','21:30','0','0','0','0','9999-00-00','2023-01-17 22:40','9999-00-00 00:00','0'),
('49','0','0','Biden - Classified Docs','','Another pile found on 20-Dec-2022 but was reported on on 12-Jan-2023 onbly.','Biden Bunch','Corruption','','1','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2022-12-20','9999-00-00','','00:00','23:59','0','0','0','0','9999-00-00','2023-01-21 22:08','9999-00-00 00:00','0'),
('50','0','0','Monterey Park Shooting','California, USA','<a class=''link'' href=''https://www.axios.com/2023/01/22/monterey-park-mass-shooting-california'' target=''_blank''>www.axios.com/2023/01/22/monterey-park-mass-shooting-california</a>','Gun Violence','Mass shooting - Asians','','7','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-01-21','9999-00-00','','22:30','22:45','0','0','0','0','9999-00-00','2023-01-23 02:17','9999-00-00 00:00','0'),
('51','0','0','David Crosby - Died - 81','','','Deaths','Musicians','','1','0','2','pdlussier','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-01-18','9999-00-00','','07:00','07:30','0','0','0','0','9999-00-00','2023-01-23 02:46','9999-00-00 00:00','0'),
('52','0','0','Jeff Beck - Died - 78','','Bacterial Meningitis','Deaths','Musicians','','1','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-01-10','9999-00-00','','09:30','10:00','0','0','0','0','9999-00-00','2023-01-23 02:48','9999-00-00 00:00','0'),
('53','0','0','Shooting - 3 Dead - Yakima, WA','','<a class=''link'' href=''https://abcnews.go.com/US/3-killed-shooting-yakima-washington-gunman-large/story?id=96635522'' target=''_blank''>abcnews.go.com/US/3-killed-shooting-yakima-washington-gunman-large/story?id=96635522</a>','Gun Violence','Shooting','','6','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-01-25','9999-00-00','','10:00','10:30','0','0','0','0','9999-00-00','2023-01-25 12:34','9999-00-00 00:00','0'),
('54','0','0','Pompeo - Memoir Release','','Memoir stirred controversy on dayreleased.','Politicians','Mike Pompeo','','4','1','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-01-24','9999-00-00','','10:00','10:30','0','0','0','0','9999-00-00','2023-01-25 12:36','9999-00-00 00:00','0'),
('55','0','0','Day of Honour - Hungary','','Hungarian police have banned the annual marking of the “Day of Honour” dedicated to commemorating the Nazi forces who broke out of a Russian-encircled Hungary.<br><a class=''link'' href=''https://www.bing.com/ck/a?!&amp;&amp;p=5c6a6c81018eabefJmltdHM9MTY3NTIwOTYwMCZpZ3VpZD0xNGQ3NTZkMS0wY2JhLTYwODItMDk0Ny00N2FhMGQ2YzYxNDkmaW5zaWQ9NTQyMg&amp;ptn=3&amp;hsh=3&amp;fclid=14d756d1-0cba-6082-0947-47aa0d6c6149&amp;psq=%22Day+of+Honour.%22+hungary&amp;u=a1aHR0cHM6Ly9ldXJvamV3Y29uZy5vcmcvbmV3cy9jb21tdW5pdGllcy1uZXdzL2h1bmdhcnkvaHVuZ2FyeS1iYW5zLWFubnVhbC1kYXktb2YtaG9ub3VyLW5lby1uYXppLXBhcmFkZS8&amp;ntb=1'' target=''_blank''>www.bing.com/ck/a?!&amp;&amp;p=5c6a6c81018eabefJmltdHM9MTY3NTIwOTYwMCZpZ3VpZD0xNGQ3NTZkMS0wY2JhLTYwODItMDk0Ny00N2FhMGQ2YzYxNDkmaW5zaWQ9NTQyMg&amp;ptn=3&amp;hsh=3&amp;fclid=14d756d1-0cba-6082-0947-47aa0d6c6149&amp;psq=%22Day+of+Honour.%22+hungary&amp;u=a1aHR0cHM6Ly9ldXJvamV3Y29uZy5vcmcvbmV3cy9jb21tdW5pdGllcy1uZXdzL2h1bmdhcnkvaHVuZ2FyeS1iYW5zLWFubnVhbC1kYXktb2YtaG9ub3VyLW5lby1uYXppLXBhcmFkZS8&amp;ntb=1</a>','Extremists','Neo-Nazis','','1','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-02-12','9999-00-00','','00:00','23:59','0','0','0','0','9999-00-00','2023-02-01 04:45','9999-00-00 00:00','0'),
('56','0','0','Shooting - 13-yr-old perp - Jerusalem','','Key Event<br><a class=''link'' href=''https://www.jta.org/2023/01/29/israel/13-year-old-palestinian-shoots-2-in-jerusalem-as-violence-flares-and-government-flexes'' target=''_blank''>www.jta.org/2023/01/29/israel/13-year-old-palestinian-shoots-2-in-jerusalem-as-violence-flares-and-government-flexes</a>','Gun Violence','Middle East','','7','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-01-28','9999-00-00','','09:00','09:30','0','0','0','0','9999-00-00','2023-02-01 04:47','9999-00-00 00:00','0'),
('57','0','0','Palestine - Raid by Israel IDF','Palestine','<a class=''link'' href=''https://www.washingtonpost.com/world/2023/01/26/israel-raid-palestine-jenin-deaths/'' target=''_blank''>www.washingtonpost.com/world/2023/01/26/israel-raid-palestine-jenin-deaths/</a>','Gun Violence, War','Middle East','','1','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-01-26','9999-00-00','','10:30','11:00','0','0','0','0','9999-00-00','2023-02-01 04:51','9999-00-00 00:00','0'),
('58','0','0','Jerusalem - 21-yr-old - Synagogue attack','Jerusalem','<a class=''link'' href=''https://www.cnn.com/2023/01/27/middleeast/jerusalem-shooting-dead-intl/index.html'' target=''_blank''>www.cnn.com/2023/01/27/middleeast/jerusalem-shooting-dead-intl/index.html</a>','Gun Violence, War','Middle East','','1','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-01-27','9999-00-00','','10:30','11:00','0','0','0','0','9999-00-00','2023-02-01 04:53','9999-00-00 00:00','0'),
('59','0','0','Ilhan Omar - Committee role','USA','Foreign Committee - removed from role; Republican Revenge.<br>Antisemitic comments cited as reason. Access to classified info motivation.','GOP Revenge','Progressives','','10','1','2','pdlussier','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-02-02','9999-00-00','','07:00','07:30','0','0','0','0','9999-00-00','2023-02-03 03:15','2023-02-07 01:32','0'),
('60','0','0','Chinese &quot;Spy&quot; Balloon','USA','Massive freak-out over a balloon that flies through US skies. Readily assumed to be Chinese and used to spy.','US Warmongering','US-Chinese relations','','1','0','2','pdlussier','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-01-30','2023-02-05','','00:00','23:59','0','0','0','0','9999-00-00','2023-02-05 02:25','2023-02-07 01:13','0'),
('61','0','0','Vantage - First Post','India','CNN18 - Palki Sharma','Media','Propaganda','','1','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-01-26','9999-00-00','','21:00','21:30','0','0','0','0','9999-00-00','2023-02-05 09:38','9999-00-00 00:00','0'),
('62','0','0','Ukraine - sanction India &amp; China','Ukraine','Senior Ukrainian lawmaker Oleksandr Merezhko urged for sanctiuons against India and China for buying cheap oil.   <br><a class=''link'' href=''https://www.tribuneindia.com/news/nation/influential-ukraine-leader-urges-us-to-impose-sanctions-on-india-china-for-buying-russian-oil-476278'' target=''_blank''>www.tribuneindia.com/news/nation/influential-ukraine-leader-urges-us-to-impose-sanctions-on-india-china-for-buying-russian-oil-476278</a>','Russo-Ukraine War','Sanctions','','9','0','2','pdlussier','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-02-01','9999-00-00','','08:30','09:00','0','0','0','0','9999-00-00','2023-02-07 01:17','2023-02-07 01:32','0'),
('63','0','0','Syd Hirsh Piece - Pipeline','','Seymour Hirsh','World Order','US Hegemony','','10','1','2','pdlussier','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-02-10','9999-00-00','','07:30','08:00','0','0','0','0','9999-00-00','2023-02-12 17:36','9999-00-00 00:00','0'),
('64','0','0','Wayne Shorter - Dies','','Saxophonist Wayne Shorter passed away','Obituary','Musicians','','1','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-03-02','9999-00-00','','17:00','17:30','0','0','0','0','9999-00-00','2023-03-03 06:28','9999-00-00 00:00','0'),
('65','0','0','Biden in Ukraine','','Biden visit in Kiev','Biden Bunch','Ukraine','','9','0','2','pdlussier','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-02-20','9999-00-00','','07:00','07:30','0','0','0','0','9999-00-00','2023-03-03 07:08','9999-00-00 00:00','0'),
('66','0','0','Silicon Valley Bank Collapse','','The start of something very bad?','Economic collapse','Failing Empire','','10','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-03-11','9999-00-00','','08:00','08:30','0','0','0','0','9999-00-00','2023-03-12 18:38','9999-00-00 00:00','0'),
('67','0','0','US clashes with Russian Jet','Black Sea - Near Crimea','<a class=''link'' href=''https://www.msn.com/en-ca/news/world/moscow-sees-drone-incident-as-provocation-russia-s-ambassador-to-u-s/ar-AA18DA6i?ocid=msedgntp&amp;cvid=607e1defce004d8b90a38db89c15a2d0&amp;ei=15'' target=''_blank''>www.msn.com/en-ca/news/world/moscow-sees-drone-incident-as-provocation-russia-s-ambassador-to-u-s/ar-AA18DA6i?ocid=msedgntp&amp;cvid=607e1defce004d8b90a38db89c15a2d0&amp;ei=15</a>','World at War','US provocation','','9','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-03-15','9999-00-00','','08:00','08:30','0','0','0','0','9999-00-00','2023-03-15 23:25','9999-00-00 00:00','0'),
('68','0','0','Finland enters NATO','Finland','','War Machine','US Imperialism','','10','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-04-04','9999-00-00','','07:00','07:30','0','0','0','0','9999-00-00','2023-04-13 01:30','9999-00-00 00:00','0'),
('69','0','0','Tucker Carlson fired','','Carlson fired from Fox News','Media','Fox News','','10','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-04-24','9999-00-00','','07:00','07:30','0','0','0','0','9999-00-00','2023-04-25 09:41','9999-00-00 00:00','0'),
('70','0','0','Dan Bongino leaves Fox','','Bongino unable to settle on new contract, he claims.','Media','Fox News','','10','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-04-20','9999-00-00','','07:00','07:30','0','0','0','0','9999-00-00','2023-04-25 09:42','9999-00-00 00:00','0'),
('71','0','0','Don Lemon Fired','','Lemon fired from CNN','Media','CNN','','10','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-04-24','9999-00-00','','08:00','08:30','0','0','0','0','9999-00-00','2023-04-25 09:43','9999-00-00 00:00','0'),
('72','0','0','Gordon Lightfoot - Died','','Gordon Lightfoot - Canadian Folk musician<br>b. 1938 - d. 2023','Musicians','Death','','10','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-05-02','9999-00-00','','07:30','08:00','0','0','0','0','9999-00-00','2023-05-02 15:40','9999-00-00 00:00','0'),
('73','0','0','Big Tech - CDN Media','','<a class=''link'' href=''https://www.reuters.com/technology/meta-end-news-access-canadians-if-online-news-act-becomes-law-2023-03-11/'' target=''_blank''>www.reuters.com/technology/meta-end-news-access-canadians-if-online-news-act-becomes-law-2023-03-11/</a>','Info Control &amp; Dissemination','Canadian Publishers','','1','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-03-15','9999-00-00','','11:00','11:30','0','0','0','0','9999-00-00','2023-05-10 11:25','9999-00-00 00:00','0'),
('74','0','0','Chokehold by Marine - Jordan Neely','','<a class=''link'' href=''https://www.cnn.com/2023/05/05/us/jordan-neely-new-york-city-subway-chokehold-death-friday/index.html'' target=''_blank''>www.cnn.com/2023/05/05/us/jordan-neely-new-york-city-subway-chokehold-death-friday/index.html</a> <br><a class=''link'' href=''https://news.yahoo.com/jordan-neely-chokehold-death-nyc-153928334.html'' target=''_blank''>news.yahoo.com/jordan-neely-chokehold-death-nyc-153928334.html</a>','US Violence','Vigilantism','','6','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-05-05','9999-00-00','','08:30','09:00','0','0','0','0','9999-00-00','2023-05-14 02:18','9999-00-00 00:00','0'),
('75','0','0','Coup in Niger','','Removal of &quot;President-elect&quot; Mohamed Bazoum; <br>Ex-criminal turned ruler; pro-West.','','','','1','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-07-26','9999-00-00','','10:00','10:30','0','0','0','0','9999-00-00','2023-08-10 18:56','9999-00-00 00:00','0'),
('76','0','0','Victoria Nuland in Niger','','<a class=''link'' href=''https://www.cnn.com/2023/08/07/politics/niger-military-junta-nuland-meeting/index.html'' target=''_blank''>www.cnn.com/2023/08/07/politics/niger-military-junta-nuland-meeting/index.html</a>    <br><a class=''link'' href=''https://www.politico.com/news/2023/08/07/niger-coup-leaders-refuse-to-let-senior-u-s-diplomat-meet-with-deposed-president-00110207'' target=''_blank''>www.politico.com/news/2023/08/07/niger-coup-leaders-refuse-to-let-senior-u-s-diplomat-meet-with-deposed-president-00110207</a>','Anti-imperialism','Niger Coup - France/US neocolonialism','','1','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-08-07','9999-00-00','','07:30','08:00','0','0','0','0','9999-00-00','2023-08-11 07:37','9999-00-00 00:00','0'),
('77','0','0','Major forest fire in Maui','','Many deaths (40, latest count)','Climate','Disasters','','1','0','2','pdlussier','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-08-10','9999-00-00','','07:00','07:30','0','0','0','0','9999-00-00','2023-08-11 15:15','9999-00-00 00:00','0'),
('78','0','0','US Credit rating down graded','','In response to the 2023 United States debt-ceiling crisis, Fitch placed its AAA rating on a negative watch on May 24, 2023, warning that &quot;risks have risen that the debt limit will not be raised or suspended before the x-date and consequently that the government could begin to miss payments on some of its obligations.&quot; The agency cautioned that a default would downgrade affected securities to &#039;D&#039;, while other treasury bills could fall to &#039;CCC&#039; or &#039;C&#039;.[38]<br>On August 1, 2023 Fitch downgraded USA long-term credit rating to AA+ from AAA.[39]','World Order','Economy','','4','1','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-08-01','9999-00-00','','07:00','07:30','0','0','0','0','9999-00-00','2023-08-12 02:01','9999-00-00 00:00','0'),
('79','0','0','Hunter Biden appointed special council','','','Biden Affair','Ukraine','','1','0','2','pdlussier','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-08-11','9999-00-00','','07:00','07:30','0','0','0','0','9999-00-00','2023-08-12 05:20','2023-08-12 06:46','0'),
('80','0','0','Ecuadorian Fernando Villavicencio assassinated','','Ecuador presidential candidate Villavicencio assassinated.<br><a class=''link'' href=''https://www.reuters.com/world/americas/ecuadorean-candidate-villavicencio-killed-campaign-event-local-media-2023-08-10/'' target=''_blank''>www.reuters.com/world/americas/ecuadorean-candidate-villavicencio-killed-campaign-event-local-media-2023-08-10/</a>','World Order','Coup','','1','0','2','pdlussier','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-08-10','9999-00-00','','09:30','10:30','0','0','0','0','9999-00-00','2023-08-12 06:48','2023-08-14 00:09','0'),
('81','0','0','Imam Killed by Hindu Mob','','Imam killed after Hindu mob attacks mosque in India’s Gurugram.<br>mob of far-right Hindus torched and opened fire at a mosque in a suburb of the Indian capital, New Delhi, hours after deadly communal violence in a nearby district.<br><a class=''link'' href=''https://www.aljazeera.com/news/2023/8/1/imam-killed-after-hindu-mob-attacks-mosque-in-indias-gurugram'' target=''_blank''>www.aljazeera.com/news/2023/8/1/imam-killed-after-hindu-mob-attacks-mosque-in-indias-gurugram</a>','Extremism','India','','1','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-08-01','9999-00-00','','09:00','09:30','0','0','0','0','9999-00-00','2023-08-12 07:03','9999-00-00 00:00','0'),
('82','0','0','Virgin Galactic - Flies first tourist into space','','','Tech Progress','Space','','1','0','2','pdlussier','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-08-11','9999-00-00','','08:00','08:30','0','0','0','0','9999-00-00','2023-08-14 00:07','9999-00-00 00:00','0'),
('83','0','0','Saudi Appoints 1st Palestinian Ambassador','','<a class=''link'' href=''https://www.msn.com/en-ca/news/world/saudi-arabia-appoints-first-ambassador-to-palestine-amid-rapprochement-with-israel/ar-AA1fbnr6?ocid=msedgntp&amp;cvid=307006f0fff64f2885aee8f9074b36c4&amp;ei=57'' target=''_blank''>www.msn.com/en-ca/news/world/saudi-arabia-appoints-first-ambassador-to-palestine-amid-rapprochement-with-israel/ar-AA1fbnr6?ocid=msedgntp&amp;cvid=307006f0fff64f2885aee8f9074b36c4&amp;ei=57</a>','','','','1','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-08-12','9999-00-00','','07:30','08:00','0','0','0','0','9999-00-00','2023-08-14 00:10','9999-00-00 00:00','0'),
('84','0','0','Drones Hit Moscow','','<a class=''link'' href=''https://www.msn.com/en-ca/video/news/drone-explosion-in-moscow-caught-on-camera-my-heart-is-still-pounding/vi-AA1f9DhX?ocid=msedgntp&amp;cvid=307006f0fff64f2885aee8f9074b36c4&amp;ei=71'' target=''_blank''>www.msn.com/en-ca/video/news/drone-explosion-in-moscow-caught-on-camera-my-heart-is-still-pounding/vi-AA1f9DhX?ocid=msedgntp&amp;cvid=307006f0fff64f2885aee8f9074b36c4&amp;ei=71</a>','','','','1','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-08-11','9999-00-00','','12:00','12:30','0','0','0','0','9999-00-00','2023-08-14 00:12','9999-00-00 00:00','0'),
('85','0','0','India - Independence Day','','','Nationalism','India','','1','0','2','','0','','-1','-1','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','2023-08-15','9999-00-00','','07:30','08:00','0','0','0','0','9999-00-00','2023-08-14 21:05','9999-00-00 00:00','0');

-- --------------------------------------------------------

--
-- Table mycal_groups
--

DROP TABLE IF EXISTS `mycal_groups`;

CREATE TABLE `mycal_groups` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `privs` tinyint(4) NOT NULL DEFAULT 0,
  `vCatIDs` varchar(128) NOT NULL DEFAULT '0',
  `eCatIDs` varchar(128) NOT NULL DEFAULT '0',
  `rEvents` tinyint(4) NOT NULL DEFAULT 1,
  `mEvents` tinyint(4) NOT NULL DEFAULT 1,
  `pEvents` tinyint(4) NOT NULL DEFAULT 1,
  `upload` tinyint(4) NOT NULL DEFAULT 0,
  `sendSms` tinyint(4) NOT NULL DEFAULT 0,
  `tnPrivs` varchar(2) NOT NULL DEFAULT '00',
  `color` varchar(8) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `mycal_groups` VALUES
('1','No access','0','0','0','1','1','1','0','0','00','','0'),
('2','Admin','9','0','0','1','1','1','1','1','22','','0'),
('3','Read access','1','0','0','1','1','1','0','0','00','','0'),
('4','Client','2','0','1','0','1','1','1','1','20','','0'),
('5','Post All','3','0','0','1','1','1','0','0','21','','0'),
('6','Manager','4','0','0','1','1','1','1','1','22','','0');

-- --------------------------------------------------------

--
-- Table mycal_settings
--

DROP TABLE IF EXISTS `mycal_settings`;

CREATE TABLE `mycal_settings` (
  `name` varchar(16) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `outline` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `mycal_settings` VALUES
('calendarTitle','Dating Up Yours','Calendar title displayed in the top bar'),
('calendarUrl','https://pdlussier.ca/downmystreetandupyours/public/pdl_cal//?cal=mycal','Calendar link (URL)'),
('backLinkUrl','','Nav bar back link URL (blank: no link, url: link)'),
('logoPath','./PDL-logo4.png','Path/name of optional left upper corner logo image'),
('timeZone','America/New_York','Calendar time zone'),
('notifChange','1','Send a notification when event added/edited/deleted (0:no, 1:yes)'),
('chgRecipList','[pdlussier@bell.net];[pdl@pdlussier.ca]','List of notification email/SMS addresses'),
('maxXsWidth','760','Upper limit responsive calendar mode'),
('rssFeed','1','Display RSS feed links in footer and HTML head (0:no, 1:yes)'),
('logWarnings','1','Log calendar warning messages (0:no, 1:yes)'),
('logNotices','1','Log calendar notice messages (0:no, 1:yes)'),
('logVisitors','1','Log calendar visitors data (0:no, 1:yes)'),
('maintMode','0','Run calendar in maintenance mode (0:no, 1:yes)'),
('contButton','1','Display Contact button in side menu (0:no, 1:yes)'),
('viewMenu','1','Display view menu in options panel (0:no, 1:yes)'),
('groupMenu','0','Display group filter menu in options panel (0:no, 1:yes)'),
('userMenu','0','Display user filter menu in options panel (0:no, 1:yes)'),
('catMenu','1','Display category filter menu in options panel(0:no, 1:yes)'),
('langMenu','0','Display ui-language selection menu in options panel (0:no, 1:yes)'),
('viewsPublic','2,4,6,10,11','Calendar views available to the public users'),
('viewsLogged','1,2,3,4,5,6,7,8,9,10,11','Calendar views available to the logged-in users'),
('viewButsPub','2,4,6,10,11','View buttons on the navbar (1:year, ... 11:gantt) - public user'),
('viewButsLog','1,2,3,4,5,6,7,8,9,10','View buttons on the navbar (1:year, ... 11:gantt) - logged in user'),
('defViewPubL','4','View large display at start-up (1:year, ... 8:changes) - public user'),
('defViewPubS','2','View small display at start-up (1:year, ... 8:changes) - public user'),
('defViewLogL','4','View large display at start-up (1:year, ... 8:changes) - logged in user'),
('defViewLogS','5','View small display at start-up (1:year, ... 8:changes) - logged in user'),
('language','english','Default user interface language'),
('privEvents','1','Private events (0:disabled 1:enabled, 2:default, 3:always)'),
('aldDefault','0','All-day event default in event window (0:no 1:yes)'),
('details4All','1','Show event details to x users (0:none, 1:all, 2:logged-in users)'),
('evtDelButton','2','Display Delete button in Event window (0:no, 1:yes, 2:manager)'),
('eventColor','1','Event colors (0:user color, 1:cat color)'),
('defVenue','','Default venue in the venue field of the event form'),
('xField1Label','Project','Label optional extra event field 1'),
('xField2Label','Subject','Label optional extra event field 2'),
('xField1Rights','1','Extra event field 1 minimum required rights to see'),
('xField2Rights','1','Extra event field 2 minimum required rights to see'),
('selfReg','1','Self-registration (0:no, 1:yes)'),
('selfRegGrp','3','Self-registration user group ID'),
('selfRegQ','What colour was Napoleon''s white horse','Self-registration question to answer'),
('selfRegA','White','Self-registration answer to selfregQ'),
('selfRegNot','1','User self-reg notification to admin (0:no, 1:yes)'),
('restLastSel','1','Restore last session when user revisits calendar'),
('cookieExp','30','Number of days before a Remember Me cookie expires'),
('evtTemplGen','12453678','Event fields and order of fields in general views'),
('evtTemplUpc','123458','Event fields and order of fields in upcoming events view'),
('evtTemplPop','123458','Event fields and order of fields in hover box'),
('evtSorting','0','Sort events on times or cat. seq. nr (0:times, 1:cat seq nr)'),
('yearStart','0','Start month in year view (1-12 or 0, 0:current month)'),
('YvColsToShow','3','Number of months to show per row in year view'),
('YvRowsToShow','6','Number of rows to show in year view'),
('MvWeeksToShow','6','Number of weeks to show in month view'),
('XvWeeksToShow','6','Number of weeks to show in matrix view'),
('GvWeeksToShow','6','Number of weeks to show in gantt view'),
('workWeekDays','12345','Working days (0: su - 6: sa)'),
('weekStart','1','First day of the week (0: su - 6: sa)'),
('lookaheadDays','30','Days to look ahead in upcoming view, todo list and RSS feeds'),
('dwStartHour','7','Day/week view start hour'),
('dwEndHour','22','Day/week view end hour'),
('dwTimeSlot','30','Day/week time slot in minutes'),
('dwTsHeight','20','Day/week time slot height in pixels'),
('ownerTitle','0','Prepend owner to event title (0:disabled 1:enabled)'),
('spMiniCal','0','Show mini calendar in side panel (0:disabled 1:enabled)'),
('spImages','0','Show images in side panel (0:disabled 1:enabled)'),
('spInfoArea','0','Show info area in side panel (0:disabled 1:enabled)'),
('spFilesDir','sidepanel','Folder for the side panel image and text files'),
('mvShowEtime','0','Show end time (if specified) in month view (0:disabled 1:enabled)'),
('showImgInMV','0','Show images in month view (0:no, 1:yes)'),
('monthInDCell','0','Show in month view month for each day (0:no, 1:yes)'),
('evtWinSmall','0','Show reduced Event window (0:no, 1:yes)'),
('mapViewer','https://maps.google.com/maps?q=','map viewer for the event address button'),
('dateFormat','d.m.y','Date format: yyyy-mm-dd (y:yyyy, m:mm, d:dd)'),
('MdFormat','d M','Date format: dd month (d:dd, M:month)'),
('MdyFormat','d M y','Date format: dd month yyyy (d:dd, M:month, y:yyyy)'),
('MyFormat','M y','Date format: month yyyy (M:month, y:yyyy)'),
('DMdFormat','WD d M','Date format: weekday dd month (WD:weekday d:dd, M:month)'),
('DMdyFormat','WD d M y','Date format: weekday dd month yyyy (WD:weekday d:dd, M:month, y:yyyy)'),
('timeFormat','h:m','Time format (H:hh, h:h, m:mm, a:am|pm, A:AM|PM)'),
('weekNumber','1','Week numbers on(1) or off(0)'),
('maxUplSize','10','Max. size of uploaded attachment and thumbnail files in MBs'),
('attTypes','.pdf,.jpg,.gif,.png,.mp4,.avi','Valid types of uploaded attachments'),
('tnlTypes','.jpg,.jpeg,.gif,.png','Valid types of uploaded thumbnails'),
('tnlMaxW','160','Max. width of uploaded thumbnails image in pixels'),
('tnlMaxH','140','Max. height of uploaded thumbnails image in pixels'),
('tnlDelDays','20','thumbnails used since last 20 days cannot be deleted'),
('emlService','1','Mail service (0:no, 1:yes)'),
('smsService','0','SMS service (0:no, 1:yes)'),
('defRecips','pdlussier@pdlussier.ca;pdl@downmystreetandupyours.org','Default recipients list for email and SMS notifications'),
('maxEmlCc','10','Default max. number of recipients in email Cc field'),
('notSenderEml','0','Sender of notification emails (0:calendar, 1:user)'),
('calendarEmail','pdl@downmystreetandupyours.org','Sender of email notifications'),
('smtpServer','mail.downmystreetandupyours.org','SMTP mail server name'),
('smtpPort','465','SMTP port number'),
('smtpSsl','1','Use SSL (Secure Sockets Layer) (0:no, 1:yes)'),
('smtpAuth','1','Use SMTP authentication (0:no, 1:yes)'),
('smtpUser','pdlussier','SMTP username'),
('smtpPass','Whitmn4550!','SMTP password'),
('notSenderSms','0','Sender of notification SMSes (0:calendar, 1:user)'),
('calendarPhone','5147071137','Sender of SMS notifications'),
('smsCarrier','','SMS carrier template (# = mob. phone number)'),
('smsCountry','Canada','SMS country code'),
('cCodePrefix','1','Country code starts with prefix + or 00 (0:no, 1:yes)'),
('smsSubject','','Subject field template for SMS emails to the carrier'),
('maxLenSms','70','Maximum length of SMS messages (bytes)'),
('smsAddLink','0','Add event report link to SMS (0:no, 1:yes)'),
('mailServer','2','Mail server (1:PHP mail, 2:SMTP mail)'),
('adminCronSum','1','Send cron job summary to admin (0:no, 1:yes)'),
('chgNofDays','2','Days to look back for calendar changes summary'),
('chgSumRecips','pdlussier@pdlussier.ca;admin@pdlussier.ca;5147071137','Recipient list for calendar change summaries'),
('icsExport','0','Daily export of events in iCal format (0:no 1:yes)'),
('eventExp','0','Number of days after due when an event expires / can be deleted (0:never)'),
('maxNoLogin','365','Number of days not logged in, before deleting user account (0:never delete)'),
('popFieldsSbar','12345','Event fields in sidebar hover box (none: no box)'),
('showLinkInSB','1','Show URL-links in sidebar (0:no, 1:yes)'),
('sideBarDays','14','Days to look ahead in sidebar');

-- --------------------------------------------------------

--
-- Table mycal_styles
--

DROP TABLE IF EXISTS `mycal_styles`;

CREATE TABLE `mycal_styles` (
  `name` varchar(8) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `mycal_styles` VALUES
('THEME','pdl-Cal'),
('BXXXX','#0F1933'),
('BTBAR','#FDFDFD'),
('BBHAR','#6F91C4'),
('BBUTS','#4876B8'),
('BDROP','#FFFFFF'),
('BXWIN','#ADC7FF'),
('BINBX','#FFFFEE'),
('BOVBX','#FEFEFE'),
('BFFLD','#FFFFFF'),
('BCONF','#A0D070'),
('BWARN','#FFF0A0'),
('BERRO','#FF2222'),
('BHLIT','#DFFF52'),
('CXXXX','#7AADFF'),
('CTBAR','#2B3856'),
('CBHAR','#FFFFFF'),
('CBUTS','#FFFFFF'),
('CDROP','#2B3856'),
('CXWIN','#000000'),
('CINBX','#2B3856'),
('COVBX','#2B3856'),
('CFFLD','#2B3856'),
('CCONF','#2B3856'),
('CWARN','#2B3856'),
('CERRO','#2B3856'),
('CHLIT','#2B3856'),
('EXXXX','#C8CBCC'),
('EOVBX','#73A9FF'),
('EBUTS','#000000'),
('FFXXX','roboto,sans-serif'),
('PSXXX','12'),
('PTBAR','17'),
('PPGTL','14'),
('PTHDL','14'),
('MTHDM','1.0'),
('MDTHD','1.0'),
('MSNHD','1.0'),
('MOVBX','1.2'),
('MFFLD','1.1'),
('MBUTS','1'),
('MPWIN','1.1'),
('MSMAL','0.8'),
('sTbSw','1'),
('sCtOf','10'),
('BGCTH','#A3D141'),
('BGTFD','#ADCFFF'),
('BGWTC','#DDDDDD'),
('BGWD1','#BBBDC4'),
('BGWD2','#FFFFFF'),
('BGWE1','#8A93BD'),
('BGWE2','#818E91'),
('BGOUT','#FEFEFE'),
('BGTOD','#419636'),
('BGSEL','#FFEEEE'),
('BLINK','#FFFFFF'),
('BCHBX','#FFFFDD'),
('CGWTC','#333333'),
('CGTFD','#303030'),
('CGWD1','#2B3856'),
('CGWD2','#2B3856'),
('CGWE1','#FFFFFF'),
('CGWE2','#FFFFFF'),
('CGOUT','#2B3856'),
('CGTOD','#2B36FF'),
('CGSEL','#2B3856'),
('CLINK','#C02020'),
('CCHBX','#FF0000'),
('EGTOD','#777777'),
('EGSEL','#6682FF'),
('MEVTI','1.2'),
('BHNOR','#FDFFD6'),
('BHPRI','#5C95FF'),
('BHREP','#FFF8E6'),
('CHNOR','#2B3856'),
('CHPRI','#FFFFFF'),
('CHREP','#2B3856'),
('EHNOR','#4F9C20'),
('EHPRI','#545454'),
('EHREP','#4684C7'),
('MPOPU','1.2');

-- --------------------------------------------------------

--
-- Table mycal_users
--

DROP TABLE IF EXISTS `mycal_users`;

CREATE TABLE `mycal_users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(48) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `tPassword` varchar(32) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(32) DEFAULT NULL,
  `number` varchar(32) DEFAULT NULL,
  `groupID` mediumint(9) NOT NULL DEFAULT 3,
  `language` varchar(24) DEFAULT 'english',
  `login0` varchar(10) NOT NULL DEFAULT '9999-00-00',
  `login1` varchar(10) NOT NULL DEFAULT '9999-00-00',
  `loginCnt` mediumint(9) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `mycal_users` VALUES
('1','Public Access','','','','','','3','english','2020-03-06','2023-08-14','3689','0'),
('2','pdlussier','f6445c693347fd3d7aa556c303323fbc','','pdlussier@processdatalogic.ca','5147071137','','2','english','2020-03-06','2023-08-14','488','0'),
('3','pdl','754b31071326b94a8fff0e82d04058f0','','pdl@downmystreetandupyours.org','','','4','english','9999-00-00','9999-00-00','0','0');

