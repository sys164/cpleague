SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

USE `dbs324471`;

--
-- Truncate tables before insert
--

TRUNCATE TABLE `chairperson`;
TRUNCATE TABLE `clubs`;
TRUNCATE TABLE `coaches`;
TRUNCATE TABLE `commmittee`;
TRUNCATE TABLE `divisions`;
TRUNCATE TABLE `secretary`;
TRUNCATE TABLE `teams`;
TRUNCATE TABLE `treasurer`;
TRUNCATE TABLE `welfare`;

--
-- Dumping data for table `chairperson`
--

INSERT INTO `chairperson` (`id`, `firstname`, `surname`, `mobile`, `email`, `password`, `hash`, `created`, `modified`, `active`) VALUES
(1, 'Chris', 'Wray', '07123456798', 'chris_wray2001@yahoo.co.uk', 'd988b8ea9fb16fc6eeb88a9654779c22', '7dcd340d84f762eba80aa538b0c527f7', '2020-06-03 12:47:14', '2020-07-09 23:13:07', 1),
(2, 'Davey', 'Jones', '07123456789', 'davey.jones@locker.com', NULL, '7dcd340d84f762eba80aa538b0c527f7', '2020-07-08 11:52:04', '2020-07-18 00:59:00', 1);

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `name`, `street`, `area`, `town`, `postcode1`, `postcode2`, `website`, `distance`, `chairperson`, `secretary`, `welfare`, `treasurer`, `created`, `modified`, `active`) VALUES
(1, 'AFC Bolton', NULL, '', '', 'BL3 4NG', NULL, 'https://afcbolton.co.uk/', '0.0000000000000', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(2, 'AFC Burnden Park', NULL, '', '', 'BL3 2RS', NULL, 'https://afcburndenpark.co.uk/', '0.0000000000000', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(3, 'Atherton Cols Junior', NULL, '', '', 'M46 9EY', NULL, 'http://athertoncollieries.co.uk/academy/', '0.0000000000000', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(4, 'Atherton Town', NULL, '', '', 'M46 0RQ', NULL, 'http://www.athertontownfc.co.uk/', '0.0000000000000', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(5, 'Bolton County Boys', NULL, '', '', 'M46 0RQ', NULL, 'https://boltoncounty.com/teams/junior-teams', '0.0000000000000', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(6, 'Bolton Lads & Girls Club', NULL, '', '', 'BL3 1SD', 'BL5 3DS', 'https://boltonladsandgirlsclub.co.uk', '0.0000000000000', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(7, 'Bolton Nomads Juniors', NULL, '', '', 'BL3 5LX', NULL, 'https://www.boltonnomadsfc.org.uk/', '0.0000000000000', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(8, 'Breightmet Wanderers AFC', NULL, '', '', 'BL2 5JA', NULL, 'https://www.breightmetwanderersafc.co.uk/', '0.0000000000000', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(9, 'CMB Sports Club', NULL, '', '', 'BL6 4ER', NULL, NULL, '0.0000000000000', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(10, 'Eagley', NULL, '', '', 'BL7 9PF', NULL, 'http://www.eagley-fc.co.uk/', '0.0000000000000', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(11, 'FC Strikerz', NULL, '', '', 'BL7 9TS', NULL, 'http://fcstrikerz.co.uk/', '0.0000000000000', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(12, 'Farnworth Hurricanes', 'ESSA Academy', 'Lever Edge Lane', 'Bolton', 'BL3 3HH', 'BL4 0QS', NULL, '1.6553909822102', 4, 3, NULL, NULL, NULL, '2020-07-14 21:35:31', 1),
(13, 'Hindley Green', '65c Thomas Street', 'Hindley Green', 'Wigan', 'WN2 4SU', 'WN2 4SS', NULL, '6.1454476580910', 3, 1, NULL, 5, NULL, '2020-07-17 22:48:56', 1),
(14, 'Hindley Juniors', NULL, '', '', 'WN2 3RU', NULL, NULL, '0.0000000000000', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(15, 'Horwich RMI FC', NULL, '', '', 'BL6 5RA', NULL, 'http://www.horwichrmifc.com/', '0.0000000000000', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(16, 'Horwich St Marys', NULL, '', '', 'BL6 7QE', NULL, 'http://www.horwichstmarysfc.co.uk/', '0.0000000000000', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(17, 'Howfen', NULL, '', '', 'BL5 3BZ', NULL, NULL, '0.0000000000000', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(18, 'Jogabola', NULL, '', '', 'BL3 1BT', 'M34 3QS', 'https://jogabola-futsal.co.uk/', '0.0000000000000', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(19, 'Ladybridge', NULL, '', '', 'BL6 4NN', NULL, 'https://www.ladybridgefc.co.uk/', '0.0000000000000', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(20, 'Leigh Genesis', NULL, '', '', 'WA3 1DU', NULL, 'https://www.leighgenesis.co.uk/', '0.0000000000000', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(21, 'Moss Bank Junior', NULL, '', '', 'BL1 5RP', NULL, 'http://www.mossbankjfc.co.uk/', '0.0000000000000', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(22, 'North Walkden', NULL, '', '', 'M38 9AN', NULL, 'https://northwalkdenfc.org.uk/', '0.0000000000000', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(23, 'Oxford Grove Junior', NULL, '', '', 'BL1 4JN', 'BL1 3BL', NULL, '0.0000000000000', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(24, 'Standish Panthers Juniors', NULL, '', '', 'WN1 1RU', NULL, NULL, '0.0000000000000', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(25, 'Tiki Taka', NULL, '', '', 'BL4 0DA', NULL, NULL, '0.0000000000000', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(26, 'Aspull Juniors', 'Playing Fields', 'Woods Road', 'Aspull', 'WN2 1PJ', NULL, NULL, '6.5774905452819', 2, 2, 2, 6, NULL, '2020-07-24 13:55:37', 1),
(27, 'Grassroots', '856 Atherton Road', 'Hindley Green', 'Wigan', 'WN2 4SA', NULL, NULL, '6.0297819691093', 5, 5, NULL, NULL, NULL, '2020-07-22 16:07:40', 1);

--
-- Dumping data for table `coaches`
--

INSERT INTO `coaches` (`id`, `firstname`, `surname`, `mobile`, `email`, `created`, `modified`, `active`) VALUES
(1, 'Chris', 'Wray', '07980632258', 'chris_wray2001@yahoo.co.uk', NULL, '2020-07-21 15:23:01', 1),
(2, 'Ben', 'Brookfield', '07740358766', 'brookfieldben@yahoo.co.uk', '2020-07-21 11:02:10', '2020-07-21 15:52:43', 1),
(3, 'Dodge', 'Ball', '07123456798', 'ball.dodger@gmail.com', '2020-07-21 14:03:52', '2020-07-21 15:08:41', 1),
(4, 'Joe', 'Harvey', '07531103010', 'jharvey2307@gmail.com', '2020-07-24 13:20:39', NULL, 1),
(5, 'Graham', 'Taylor', '07714753246', 'graham_tayloruk@yahoo.com', '2020-07-24 13:20:41', NULL, 1);

--
-- Dumping data for table `commmittee`
--

INSERT INTO `commmittee` (`id`, `lastname`, `firstname`, `gender`, `email`, `mobile`, `position`, `agegroup`, `photo`, `Created`, `Modified`, `Active`) VALUES
(1, 'Allon', 'Lesley', 'Female', 'lesley.allon@ntlworld.com', '07541132249', 'Secretary', NULL, 'lesley_allon.png', NULL, NULL, 1),
(2, 'Allon', 'Tom', 'Male', 'thomas.allon@ntlworld.com', '07743438813', 'Chairman', 'U13,U14', 'tom_allon.png', NULL, NULL, 1),
(3, 'Atherton', 'Rob', 'Male', 'rob.atherton@leighgenesis.com', '07847898343', 'Treasurer', NULL, 'rob_atherton.png', NULL, NULL, 1),
(4, 'Stableford', 'Nicola', 'Female', 'nstableford@aol..com', '07989562193', 'Welfare Officer', NULL, NULL, NULL, NULL, 1),
(5, 'Myers', 'Colin', 'Male', 'spurs50@hotmail.com', '07533519277', 'Discipline Officer', NULL, 'colin_myers.png', NULL, NULL, 1),
(6, 'Brown', 'Jamie', 'Male', 'jamiesbrown1981@hotmail.co.uk', '07974015517', 'Assistant Secretary', NULL, 'jamie_brown.png', NULL, NULL, 1),
(7, 'Brooks', 'Gary', 'Male', 'Gazbrooks.1968@gmail.com', '07903854758', 'Committee', 'U7,U8', 'gary_brooks.png', NULL, NULL, 1),
(8, 'McEwing', 'Martin', 'Male', 'martmc2602@gmail.com', '07788777677', 'Committee', 'U10,U11', NULL, NULL, NULL, 1),
(9, 'Wray', 'Chris', 'Male', 'chris_wray2001@yahoo.co.uk', '07980632258', 'Committee', 'U12', 'chris_wray.png', NULL, NULL, 1),
(10, 'McLoughlin', 'Greg', 'Male', 'a@b.com', '07711533799', 'Committee', 'U9', NULL, NULL, NULL, 1);

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `league_id`, `agegroup`, `season`, `season_id`, `division_suffix`, `division_code`, `division_id`, `division_season`, `Created`, `Modified`, `Active`) VALUES
(1, 968490466, 'U7', '2019-20', 191248818, '', 'D07X', 89998741, 853596308, NULL, NULL, 0),
(2, 968490466, 'U7', '2019-20', 191248818, 'Blue', 'D07B', 25314322, 144743097, NULL, NULL, 0),
(3, 968490466, 'U7', '2019-20', 191248818, 'Red', 'D07R', 670009233, 565390762, NULL, NULL, 0),
(4, 968490466, 'U7', '2019-20', 191248818, 'Yellow', 'D07Y', 406051950, 871359504, NULL, NULL, 0),
(5, 968490466, 'U8', '2019-20', 191248818, '', 'D08X', 26560114, 312408214, NULL, NULL, 0),
(6, 968490466, 'U8', '2019-20', 191248818, 'Girls', 'D08G', 597366651, 399453864, NULL, NULL, 1),
(7, 968490466, 'U9', '2019-20', 191248818, '', 'D09X', 238814860, 492124919, NULL, NULL, 0),
(8, 968490466, 'U10', '2019-20', 191248818, '', 'D10X', 123625431, 421953816, NULL, NULL, 0),
(9, 968490466, 'U11', '2019-20', 191248818, '', 'D11X', 585186527, 831182651, NULL, NULL, 0),
(10, 968490466, 'U11', '2019-20', 191248818, 'Friendlies', 'D11F', 385764347, 753958070, NULL, NULL, 1),
(11, 968490466, 'U12', '2019-20', 191248818, '', 'D12', 503150117, 388465460, NULL, NULL, 0),
(12, 968490466, 'U12', '2019-20', 191248818, 'A', 'D12A', 158248578, 468304267, NULL, NULL, 1),
(13, 968490466, 'U12', '2019-20', 191248818, 'B', 'D12B', 659331047, 238842465, NULL, NULL, 1),
(14, 968490466, 'U12', '2019-20', 191248818, 'C', 'D12C', 586223035, 632530946, NULL, NULL, 1),
(15, 968490466, 'U12', '2019-20', 191248818, 'Friendlies', 'D12F', 902754314, 300048470, NULL, NULL, 1),
(16, 968490466, 'U13', '2019-20', 191248818, '', 'D13', 583363002, 36862290, NULL, NULL, 0),
(17, 968490466, 'U13', '2019-20', 191248818, 'A', 'D13A', 13315215, 112208539, NULL, NULL, 1),
(18, 968490466, 'U13', '2019-20', 191248818, 'B', 'D13B', 669086073, 754134493, NULL, NULL, 1),
(19, 968490466, 'U7', '2019-20', 191248818, '', 'D07', 211177744, 8795917, NULL, NULL, 1),
(20, 968490466, 'U8', '2019-20', 191248818, '', 'D08', 589766246, 367538069, NULL, NULL, 1),
(21, 968490466, 'U9', '2019-20', 191248818, '', 'D09', 564533298, 641331081, NULL, NULL, 1),
(22, 968490466, 'U10', '2019-20', 191248818, '', 'D10', 620966779, 948619550, NULL, NULL, 1),
(23, 968490466, 'U11', '2019-20', 191248818, '', 'D11', 873214439, 857818766, NULL, NULL, 1);

--
-- Dumping data for table `secretary`
--

INSERT INTO `secretary` (`id`, `firstname`, `surname`, `mobile`, `email`, `password`, `hash`, `created`, `modified`, `active`) VALUES
(1, 'Chris', 'Wray', '07980632258', 'chris_wray2001@yahoo.co.uk', 'd988b8ea9fb16fc6eeb88a9654779c22', '7dcd340d84f762eba80aa538b0c527f7', '2020-06-03 12:47:14', '2020-07-22 17:14:08', 1),
(2, 'Joanne', 'Hammond', '07491642445', 'aspulljfc@gmail.com', 'f5768c336272c2912d50fc893f780558', '92977ae4d2ba21425a59afb269c2a14e', NULL, '2020-07-24 14:35:47', 1),
(3, 'Jamie', 'Brown', '07974015517', 'jamiesbrown1981@hotmail.co.uk', '83d9c2da09f0615dfbbb4f25715f71f4', 'a1d33d0dfec820b41b54430b50e96b5c', '2020-07-12 20:22:19', '2020-07-12 21:21:08', 1),
(4, 'Joe', 'Bloggs', '07123456789', 'a@b.com', NULL, 'c16a5320fa475530d9583c34fd356ef5', '2020-07-14 21:35:31', NULL, 1);

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `age`, `name`, `club`, `coach`, `created`, `modified`, `active`) VALUES
(1, 'U12', '', 13, 1, NULL, NULL, 1),
(2, 'U7', 'Aspull Royals', 26, 6, NULL, NULL, 1),
(3, 'U8', 'Aspull Storm', 26, 7, NULL, NULL, 1);

--
-- Dumping data for table `treasurer`
--

INSERT INTO `treasurer` (`id`, `firstname`, `surname`, `mobile`, `email`, `password`, `hash`, `created`, `modified`, `active`) VALUES
(1, 'Janet', 'Makinson', '07806795012', 'janetmakinson@btinternet.com', NULL, '8f53295a73878494e9bc8dd6c3c7104f', '2020-07-24 13:54:36', NULL, 1);

--
-- Dumping data for table `welfare`
--

INSERT INTO `welfare` (`id`, `firstname`, `surname`, `mobile`, `email`, `password`, `hash`, `created`, `modified`, `active`) VALUES
(1, 'Craig', 'McMullan', '07341266058', 'mcmullancraig@yahoo.co.uk', NULL, 'c058f544c737782deacefa532d9add4c', '2020-07-24 13:55:37', NULL, 1);
COMMIT;
