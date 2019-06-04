-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2014 at 01:43 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `es-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(40) NOT NULL,
  `uid` int(11) NOT NULL,
  `comment` text NOT NULL,
  `id_event` int(11) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `deleget`
--

CREATE TABLE IF NOT EXISTS `deleget` (
  `deleget_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `password` varchar(50) CHARACTER SET big5 COLLATE big5_bin NOT NULL,
  `contact` varchar(20) NOT NULL,
  `industry_category` int(11) NOT NULL,
  `education_level` int(11) NOT NULL,
  `professionally_qualified` varchar(10) NOT NULL,
  `working_exp` varchar(20) NOT NULL,
  `dqualifications` varchar(5000) NOT NULL,
  `role` varchar(20) NOT NULL,
  `rdate` datetime NOT NULL,
  `activation` varchar(300) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `full_img` varchar(100) NOT NULL,
  `thumb_img` varchar(100) NOT NULL,
  PRIMARY KEY (`deleget_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `deleget`
--

INSERT INTO `deleget` (`deleget_id`, `email`, `fname`, `lname`, `password`, `contact`, `industry_category`, `education_level`, `professionally_qualified`, `working_exp`, `dqualifications`, `role`, `rdate`, `activation`, `status`, `full_img`, `thumb_img`) VALUES
(1, 'sm@gmail.com', 'Sam', 'Perera', '827ccb0eea8a706c4c34a16891f84e7b', '0719402690', 1, 3, 'YES', '2', 'weweww', 'Deleget', '2014-04-21 00:12:35', 'cbacb464edfcf7639fa4f5355a3d2df1', '0', '', ''),
(2, 'cnwijekoon@gmail.com', 'chinthana', 'wijekoon', 'e10adc3949ba59abbe56e057f20f883e', '0772666940', 1, 4, 'YES', '8', 'mcse', 'Deleget', '2014-04-21 00:26:04', '83e2af3de99a71806ba4490f21a61c49', '1', '', ''),
(3, 'jeewanthe@gmail.com', 'Thushara', 'Jeewantha', 'ad4a77170d86096b9d6f6d420a01c094', '0777695505', 1, 4, 'YES', '15', 'CCNA. MCSE', 'Deleget', '2014-04-22 02:59:31', '8942b601ec5a3793d3376848548387ca', '0', '', ''),
(4, 'heshaninw@gmail.com', 'Heshan', 'Wijesekara', '81dc9bdb52d04dc20036dbd8313ed055', '0775784474', 9, 4, 'YES', '20', 'ABCD', 'Deleget', '2014-04-22 03:24:32', 'e029c0ef3910397cd5a73d7efcafafd1', '0', '', ''),
(5, 'jeewanthe@cis.lk', 'Naleen', 'Hamantha', '81dc9bdb52d04dc20036dbd8313ed055', '2784474', 7, 5, 'YES', '25', 'ABCD', 'Deleget', '2014-04-22 03:27:21', 'cfbe638453b3343e8dafc3fc48063390', '0', '', ''),
(7, 'nishanran@gmail.com', 'nishan', 'randika', 'e10adc3949ba59abbe56e057f20f883e', '0719402690', 2, 2, 'YES', '3', 'sss', 'Deleget', '2014-04-25 00:55:58', '71b6ff6564bb572165bbf43fca0c7b5a', '0', '', ''),
(9, 'telneel@yahoo.com', 'Naleen', 'Hamantha', '5a105e8b9d40e1329780d62ea2265d8a', '2784474', 7, 4, 'YES', '25', 'abcd', 'Deleget', '2014-04-25 01:47:20', 'a6fcff9b6df60d590f050e9477bcec00', '0', '', ''),
(10, 'telneel@gmail.com', 'Naleen', 'Hamantha', '5a105e8b9d40e1329780d62ea2265d8a', '2784474', 7, 4, 'YES', '25', 'abcd', 'Deleget', '2014-04-25 02:08:06', '0ac6e238893505b187d33467e4f3df86', '0', '', ''),
(11, 'pranacool@yahoo.com', 'Pranavan', 'Amaradevan', '9e3e898cc136c21d31b675393145857a', '94773774775', 1, 3, 'NO', '', '', 'Deleget', '2014-04-25 08:12:17', '4d55b9022a9d727ff298acab0d6f6c2d', '0', '', ''),
(12, 'pranacool@yahoo.com', 'Pranavan', 'Amaradevan', '9e3e898cc136c21d31b675393145857a', '94773774775', 1, 3, 'NO', '', '', 'Deleget', '2014-04-25 08:12:21', '4c3bb59d81bc9d6c639317f2ba1d4f6f', '0', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `eligibility`
--

CREATE TABLE IF NOT EXISTS `eligibility` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `groups` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `eligibility`
--

INSERT INTO `eligibility` (`id`, `name`, `groups`) VALUES
(1, 'School Leaver', 'Student'),
(2, 'Certificate of Higher Education', 'Student'),
(3, 'Diploma of Higher Education', 'Student'),
(4, 'Bachelorâ€™s Degree', 'Student,Lecturer'),
(5, 'Masterâ€™s Degre', 'Student,Lecturer'),
(6, 'Doctoral Degree', 'Student,Lecturer'),
(7, '5year working experience', 'Student,Lecturer');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ename` varchar(100) NOT NULL,
  `ecategory` varchar(100) NOT NULL,
  `ecategory_id` int(11) NOT NULL,
  `electurer` int(11) NOT NULL,
  `edate` varchar(100) NOT NULL,
  `ehour` varchar(20) NOT NULL,
  `eminute` varchar(20) NOT NULL,
  `ehour_to` varchar(20) NOT NULL,
  `eminute_to` varchar(20) NOT NULL,
  `etimetype` varchar(20) NOT NULL,
  `elocation_id` int(11) NOT NULL,
  `evenue` varchar(50) NOT NULL,
  `evenue_no` int(11) NOT NULL,
  `no_of_seats` varchar(100) NOT NULL,
  `booking` varchar(500) NOT NULL,
  `eeligibility` varchar(100) NOT NULL,
  `eligibility_id` int(11) NOT NULL,
  `edescription` varchar(1000) NOT NULL,
  `publish` enum('0','1') NOT NULL,
  `publish_date` datetime NOT NULL,
  `full_img` varchar(1000) NOT NULL,
  `thumb_img` varchar(1000) NOT NULL,
  `cancel_note` varchar(5000) NOT NULL,
  `organizer_name` varchar(50) NOT NULL,
  `organizer_id` int(11) NOT NULL,
  `emultimedia` varchar(1000) NOT NULL,
  `esupporters` varchar(500) NOT NULL,
  `o_by` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `ename`, `ecategory`, `ecategory_id`, `electurer`, `edate`, `ehour`, `eminute`, `ehour_to`, `eminute_to`, `etimetype`, `elocation_id`, `evenue`, `evenue_no`, `no_of_seats`, `booking`, `eeligibility`, `eligibility_id`, `edescription`, `publish`, `publish_date`, `full_img`, `thumb_img`, `cancel_note`, `organizer_name`, `organizer_id`, `emultimedia`, `esupporters`, `o_by`) VALUES
(1, ' Marketing Strategy ...', '', 1, 5, '2014-03-31', '14', '00', '17', '00', '', 2, 'Class room 1', 12, '200', '-1', '', 5, 'Having a marketing strategy can be the life or death of a business. If you aren''t sure how to begin developing your marketing plan and strategy these resources will help you..', '1', '2014-03-28 01:39:33', '', '', '', 'Nishan Randika', 2, '26,28', '7', ''),
(2, 'Giving voice to the poetry', '', 5, 4, '2014-03-29', '09', '00', '11', '00', '', 1, 'Auditorium 1', 9, '300', '', '', 3, 'The Wick Poetry Center presents its ninth annual Giving Voice performance at 6 p.m. on May 5 in the Block A. The event features poetry and song performances by guest musician Hal Walker. This event is free and open to the public.\r\nThe material performed at Giving Voice was created in workshops that Kent State undergraduate students led during the course â€œTeaching Poetry in the Schools,â€ as well as other Wick outreach programs.  \r\nFor more information about Giving Voice or any of the events, contact the knowledge storm at 330-672-2067 or visit the center\\''s website.\r\n', '1', '2014-03-28 15:09:53', '5-25-12-giving-voice-pic-8789258399.jpg', 'thumb_5-25-12-giving-voice-pic-8789258399.jpg', '', 'Nishan Randika', 2, '19', '', ''),
(3, 'Hindu and Buddhist Vision in Indian and Southeast Asian Art', '', 5, 4, '2014-04-02', '15', '30', '18', '00', '', 2, 'Class room 2', 13, '100', '', '', 2, 'This introduction to South and Southeast Asian art takes visitors through eighteen chronologically arranged galleries featuring an extraordinary array of masterworks dating from 3000 b.c. to the mid-nineteenth century a.d. The arts of India, Pakistan, Afghanistan, Sri Lanka, Nepal, Tibet, Thailand, Cambodia, Vietnam, Indonesia, and Myanmar are represented through archaeological finds, sculpture, painting, and decorative art.', '1', '2014-03-28 15:10:23', 'buddhistartconfwebimage-1325998674.jpg', 'thumb_buddhistartconfwebimage-1325998674.jpg', '', 'Nishan Randika', 2, '31', '', ''),
(4, 'Arts of Ancient Greece and Rome', '', 5, 4, '2014-04-09', '13', '30', '16', '00', '', 7, 'Board room 4', 18, '100', '', '', 4, 'The study of Greek and Roman Art and Architecture is at a critical stage in its development. In recent years, this field has been characterized by an ever-increasing range of approaches, under the influence of various disciplines such as Sociology, Semiotics, Gender Theory, Anthropology, Reception Theory, and Hermeneutics. The scope of this Seminar is to explore key aspects of Greek and Roman Art and Architecture, and to assess the current state of the discipline by reviewing and subjecting its current larger theoretical implications, methodologies, and directions of research to critical scrutiny.', '1', '2014-03-28 15:11:01', 'colloseum-8594933091.jpg', 'thumb_colloseum-8594933091.jpg', '', 'Nishan Randika', 2, '32', '', ''),
(5, 'Reimagining the Indian and Tibet Buddhist Traditions', '', 5, 4, '2014-03-31', '08', '00', '10', '15', '', 1, 'Auditorium 3', 11, '100', '', '', 3, 'Only recently have students of religion begun to fully consider the role of the senses in religious practice and thought. Once alerted to the issue, however, it became clear that in the Indian Buddhist tradition the sense of smell was particularly important. Textual, archeological and art historical evidence all converge to make the point and some of this evidence will be presented and discussed.', '1', '2014-03-28 15:12:02', 'rbz-mandala-sand-painting-01-4316664915.jpg', 'thumb_rbz-mandala-sand-painting-01-4316664915.jpg', '', 'Nishan Randika', 2, '29', '', ''),
(6, 'Refugee Protection, Migration and Human Rights in Europe', '', 6, 6, '2014-06-02', '12', '00', '14', '30', '', 7, 'Board room 4', 18, '100', '', '', 7, 'The Syrian crisis is not only the worldâ€™s biggest humanitarian crisis at present, but also Europeâ€™s biggest refugee crisis in 20 years. Last December the Dr John Morgan carried out a â€œthematic missionâ€, following the route taken by many Syrian refugees through Turkey, Bulgaria and Germany. This journey strengthened the Dr John Morganâ€™s conviction that European states can and must do much more to live up to their obligation to protect Syrian refugees.', '1', '2014-03-28 14:57:30', 'refugee-3960506231.jpg', 'thumb_refugee-3960506231.jpg', '', 'Nishan Randika', 2, '19', '', ''),
(7, 'Reasonableness and the Reasonable Person Standard in Criminal Law', '', 6, 6, '2014-06-18', '09', '00', '12', '00', '', 2, 'Class room 1', 12, '200', '', '', 5, 'The notions of the reasonable and of the reasonable person are often attacked as decidedly not helpful to criminal law and criminal law theory (and often the claim is made with respect not just to criminal law, but law in general). I try to show that the reasonable has a great deal more going for it, for purposes of criminal law, than is often thought. Elsewhere I try to understand what the basis for the misgivings is. In this paper, I take a step back from the issues in law and criminal law theory and examine the everyday notion of reasonableness, and more specifically to reasonableness understood as a quality we attribute to (some but not all) persons. By giving it a close look weâ€™ll be in a better position to reflect on the suitability (or lack thereof) of reasonableness for purposes to which it is put to use in the criminal law, e.g., the heat of passion defense and (the culpability level of) negligence.â€™', '1', '2014-03-28 14:58:03', 'lady-j-7324346229.jpg', 'thumb_lady-j-7324346229.jpg', '', 'Nishan Randika', 2, '19', '', ''),
(8, 'What is an international crime?', '', 6, 6, '2014-07-01', '12', '45', '14', '00', '', 1, 'Room No\\'' 01', 8, '100', '', '', 5, 'Nearly all International Criminal Law scholars accept the idea that an international crime is an act that is directly criminalized by international law. Dr John Morgan will challenge that definition, what he calls the \\"direct-criminalization thesis,\\" in this lecture. More specifically, he argue that the thesis can only be defended on the basis of an unconvincing and illegitimate naturalist understanding of the creation of international law -- and that any attempt to defend the direct-criminalization thesis on positivist grounds collapses it into what he calls the \\"national-criminalization thesis,\\" the idea that an international crime is an act that all states are obligated to domestically criminalize.', '1', '2014-03-28 15:12:06', 'icc2-571047174.jpg', 'thumb_icc2-571047174.jpg', '', 'Nishan Randika', 2, '31', '', ''),
(9, 'Human Resource Management for Events', '', 4, 7, '2014-04-07', '10', '00', '12', '00', '', 7, 'Board room 1', 15, '70', '', '', 2, 'Human Resource Management for Events is the first text to cover management of human resources in the event environment. Linking theory, research and application it covers the differing and various types of event in which human resource management is key, such as: * Business Events - a vast sector including events people who manage conferences, exhibitions, incentive trips and individual business travel.', '1', '2014-03-28 14:57:56', 'istock_000016439491large-1270728968.jpg', 'thumb_istock_000016439491large-1270728968.jpg', '', 'Nishan Randika', 2, '19', '', ''),
(10, 'Simple Tips for Going Green in the Workplace', '', 4, 7, '2014-04-22', '15', '00', '16', '00', '', 7, 'Board room 1', 15, '70', '', '', 2, 'Greener homes are in the spotlight these days, but what about the other places where many of us spend huge chunks of our time--our offices? Some simple changes of habit can save energy and resources at work, and these small steps can be multiplied by persuading the powers-that-be at your workplace to adopt environmentally friendly (and often cost-effective) policies.', '1', '2014-03-28 15:18:58', 'think-green-6043497440.jpg', 'thumb_think-green-6043497440.jpg', '', 'Nishan Randika', 2, '25', '', ''),
(11, 'Current Issues in Human Resource Management', '', 4, 7, '2014-04-26', '10', '00', '12', '15', '', 2, 'Class room 3', 14, '50', '1', '', 4, 'The Center for Human Resource Studies of The Knowledge Storm offers a series of professional enrichment seminars designed to keep HR and business students as well as HR professionals up-to-date with the most current practices and issues in human resources management, employee and labor relations, and professional certification.', '1', '2014-03-28 15:27:16', 'dsc_0087-5090385708.jpg', 'thumb_dsc_0087-5090385708.jpg', '', 'Nishan Randika', 2, '24', '', ''),
(12, 'Financial Issues in Asia Pacific Economy', '', 2, 8, '2014-05-02', '08', '00', '10', '15', '', 2, 'Class room 1', 12, '200', '1', '', 4, 'The economy of Asia comprises more than 4.2 billion people (60% of the world population) living in 46 different states. Six further states lie partly in Asia, but are considered to belong to another region economically and politically. Asia is the world\\''s fastest growing economic region and the largest continental economy by GDP PPP. China is the largest economy in Asia and the second largest economy in the world. Moreover, Asia is the site of some of the world\\''s longest economic booms, starting from the Japanese economic miracle (1950-1990), Miracle of the Han River (1961-1996) in South Korea and the economic boom (1978-2013) in China.', '1', '2014-03-29 00:47:51', 'possible-slider-2-106429033.jpg', 'thumb_possible-slider-2-106429033.jpg', '', 'Nishan Randika', 2, '31', '', ''),
(13, 'Technology Finance and Trade in Emerging Markets', '', 2, 8, '2014-05-12', '12', '15', '14', '00', '', 7, 'Board room 2', 16, '40', '', '', 2, 'An emerging market is a country that has some characteristics of a developed market but is not a developed market. This includes countries that may be developed markets in the future or were in the past. It may be a nation with social or business activity in the process of rapid growth and industrialization. The economies of China (excluding Hong Kong and Macau, as both are developed) and India are considered to be the largest. According to The Economist, many people find the term outdated, but no new term has gained much traction yet. Emerging market hedge fund capital reached a record new level in the first quarter of 2011 of $121 billion. The four largest emerging and developing economies by either nominal or inflation-adjusted GDP are the BRIC countries (Brazil, Russia, India and China). The next four largest markets are MIKT (Mexico, Indonesia, South Korea and Turkey), although South Korea is not considered as an emerging market by some sources. Iran is also considered as an emerg', '1', '2014-03-29 00:53:39', 'common-financial-issues-6962174410.jpg', 'thumb_common-financial-issues-6962174410.jpg', '', 'Nishan Randika', 2, '26', '', ''),
(14, 'The Importance of Networking', '', 1, 1, '2014-04-02', '11', '15', '13', '00', '', 1, 'Auditorium 2', 10, '200', '', '', 4, 'With so many talented public relations professionals, itâ€™s no longer about what you know, itâ€™s all about who you know. Networking is an essential skill that, when used wisely, can help you find future employment and enhance your career advancement opportunities. As many as 90% of open positions are filled as a result of networking. As an internship-seeking student, this statistic fills me with hope that all of those networking nights, resume workshops and a completed LinkedIn profile will help me in the hunt for my first job.\r\nThough networking has endless benefits, the thought of actually going to a networking event and making small talk with potential employers is nerve-racking. \r\n', '1', '2014-03-29 01:06:13', 'network-2582702604.jpg', 'thumb_network-2582702604.jpg', '', 'Nishan Randika', 2, '26', '', ''),
(15, 'User Centered Design and Testing', '', 1, 1, '2014-04-03', '15', '00', '19', '30', '', 7, 'Board room 4', 18, '100', '', '', 7, 'User-centered design (UCD) is a process (not restricted to interfaces or technologies) in which the needs, wants, and limitations of end users of a product, service or process are given extensive attention at each stage of the design process. User-centered design can be characterized as a multi-stage problem solving process that not only requires designers to analyses and foresee how users are likely to use a product, but also to test the validity of their assumptions with regard to user behavior in real world tests with actual users. Such testing is necessary as it is often very difficult for the designers of a product to understand intuitively what a first-time user of their design experiences, and what each user\\''s learning curve may look like.\r\n\r\nThe chief difference from other product design philosophies is that user-centered design tries to optimize the product around how users can, want, or need to use the product, rather than forcing the users to change their behavior to accomm', '1', '2014-03-29 01:22:07', 'computer-networking-1657026759.jpg', 'thumb_computer-networking-1657026759.jpg', '', 'Nishan Randika', 2, '25', '', ''),
(16, ' Ethical Decision Making...', '', 7, 9, '2014-04-27', '10', '30', '01', '00', '', 2, 'Class room 3', 14, '50', '', '', 4, 'What is Ethics? Decision Making..Making an Ethical Decision, A Framework for Ethical Decision Making, Thinking Ethically, How to Identify an Ethical Issue...', '0', '0000-00-00 00:00:00', '', '', '', 'Nishan Randika', 2, '19,27', '7', ''),
(17, ' Enhancing the Human Potential...', '', 4, 7, '2014-02-10', '14', '00', '01', '30', '', 1, 'Auditorium 1', 9, '300', '', '', 5, 'Throughout time, people have explored the ways in which they can improve some aspect of their performance...', '0', '0000-00-00 00:00:00', '', '', '', 'Nishan Randika', 2, '20', '7', ''),
(18, 'Economic Shocks and Organizational Innovations in India''s Struggle for Democracy', '', 2, 8, '2014-04-30', '10', '30', '11', '30', '', 1, 'Auditorium 3', 11, '100', '', '', 1, 'We summarize recent research in progress that examines the potential and limitations of non-violent civil disobedience through the lens of the evolution of an iconic success: Indiaâ€™s struggle for democratic self-rule. We present a theoretical framework that highlights two key twin challenges faced by non-violent movements in ethnically diverse countries. The first is the challenge of mass mobilization across ethnic lines. The second challenge lies in overcoming the enhanced temptations faced by members of large mobilized groups to turn violent, whether to secure short-term gains from mob action or in response to manipulation by agents who stand to gain from political violence. We show how these challenges appear to match general patterns from cross-campaign data.', '1', '2014-04-28 10:22:24', 'personal-finances-4846009705.jpg', 'thumb_personal-finances-4846009705.jpg', '', 'Thushara Jeewantha', 11, '21,23,27', '7', '');

-- --------------------------------------------------------

--
-- Table structure for table `event_attend`
--

CREATE TABLE IF NOT EXISTS `event_attend` (
  `event_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_role` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `event_attend`
--

INSERT INTO `event_attend` (`event_id`, `id`, `user_id`, `user_role`) VALUES
(12, 2, 2, 'Deleget'),
(11, 4, 2, 'Deleget');

-- --------------------------------------------------------

--
-- Table structure for table `event_multimedia`
--

CREATE TABLE IF NOT EXISTS `event_multimedia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `event_multimedia`
--

INSERT INTO `event_multimedia` (`id`, `eid`, `mid`) VALUES
(1, 17, 5),
(2, 17, 11);

-- --------------------------------------------------------

--
-- Table structure for table `event_rate`
--

CREATE TABLE IF NOT EXISTS `event_rate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_event` int(11) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `rate` int(1) NOT NULL,
  `dt_rated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `event_rate`
--

INSERT INTO `event_rate` (`id`, `id_event`, `id_user`, `rate`, `dt_rated`) VALUES
(3, 3, '1', 1, '2014-04-21 01:40:50'),
(4, 8, '5', 1, '2014-04-21 08:03:15'),
(5, 13, '2', 2, '2014-04-21 18:40:10'),
(6, 3, '2', 1, '2014-04-21 22:18:40'),
(7, 5, '2', 2, '2014-04-22 01:14:28'),
(8, 14, '2', 1, '2014-04-22 05:54:38'),
(9, 9, '2', 1, '2014-04-22 05:56:48');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE IF NOT EXISTS `lecturer` (
  `lecturer_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `password` varchar(50) CHARACTER SET big5 COLLATE big5_bin NOT NULL,
  `contact` varchar(20) NOT NULL,
  `a_no` varchar(20) NOT NULL,
  `a_street` varchar(50) NOT NULL,
  `a_city` varchar(50) NOT NULL,
  `a_country` varchar(50) NOT NULL,
  `industry_category` int(11) NOT NULL,
  `education_level` int(11) NOT NULL,
  `working_exp` varchar(500) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_designation` varchar(100) NOT NULL,
  `summary` varchar(500) NOT NULL,
  `experience` varchar(500) NOT NULL,
  `skills` varchar(500) NOT NULL,
  `membership` varchar(500) NOT NULL,
  `role` varchar(20) NOT NULL,
  `rdate` datetime NOT NULL,
  `activation` varchar(300) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `admin_confirm` varchar(20) NOT NULL,
  `full_img` varchar(100) NOT NULL,
  `thumb_img` varchar(100) NOT NULL,
  PRIMARY KEY (`lecturer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`lecturer_id`, `email`, `fname`, `lname`, `password`, `contact`, `a_no`, `a_street`, `a_city`, `a_country`, `industry_category`, `education_level`, `working_exp`, `company_name`, `company_designation`, `summary`, `experience`, `skills`, `membership`, `role`, `rdate`, `activation`, `status`, `admin_confirm`, `full_img`, `thumb_img`) VALUES
(1, 'nishanra@gmail.com', 'Sumathipala', 'Silva', 'e10adc3949ba59abbe56e057f20f883e', '0719402690', '20/14', '2nd Avenue', 'colombo', 'srilanka', 1, 4, '3', 'datacoregroup', 'web developer', 'One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin.', 'software developer', 'php,ajx,jquery', 'sience society', 'Lecturer', '0000-00-00 00:00:00', 'ef07acad011d95ec83ae72ee4ef189db', '1', 'Sent', '', ''),
(4, 'maxwebster@hotmail.com', 'Max', 'Webster', 'd88dd280fd0889613b32cbe1b040cece', '00447024012345', '735', 'Madingley Road', 'Cambridge', 'U.K', 5, 6, '5', 'Arts Research Institute ', 'Lecturer in Arts ', 'Art practice is concerned with the recording of time and history through different drawing technologies.\r\nUsing the surfaces of old/new master paintings, contemporary conservation x-rays and nitrate film the intention of this work is to register and map the effect time has on the materials and supports of iconic paintings and early film.\r\n', 'Arts and animation lecturer at Small-vile University \r\nVisiting Lecturer at National College of Arts\r\n', 'Practice Consultant \r\nCultural visual art artist \r\nLecturer\r\nWorkshop leader\r\n', 'Artist Board Member of the Lewis Gallery \r\nFormer Board member of visual artists\r\n', 'Lecturer', '0000-00-00 00:00:00', '7ce95337daff22be6abfc09334c22dab', '1', 'Sent', 'acheson-2-8465924044.jpg', 'thumb_acheson-2-8465924044.jpg'),
(5, 'amyperera@yahoo.com', 'Amy', 'Perera', '939c8891e22e6601f6d7085f2fc65ec3', '0094773774775', 'No 64/8', 'Hill Street', 'Malabe', 'Sri Lanka', 1, 5, '5', 'Data-core Technologies  ', 'Chief Technical officer ', 'Ten yearsâ€™ experience in varied and challenging roles has kept me focused on improving my technical abilities, always at the forefront of new and emerging technologies.\r\nSpecialties: Virtualization, VDI, Microsoft Technologies, Disaster Recovery, Project Management\r\n', 'Spring global services\r\nSri Lanka insurance \r\nPC house \r\n', 'Windows server\r\nActive directory \r\nVirtualization \r\nVM Ware \r\nEnterprise architecture \r\nDatacenter \r\nFirewall \r\nVPN \r\nNetwork security \r\nPre sales \r\nCloud application \r\n', 'Consultant networks/project management\r\nITIL â€“ Sri Lanka forum \r\nIT managerâ€™s group Sri Lanka \r\n', 'Lecturer', '0000-00-00 00:00:00', '285b343e73fcb94033108127ac613ec7', '1', 'Sent', 'hirani-2193409018.png', 'thumb_hirani-2193409018.png'),
(6, 'johnmorgan@rocketmail.com', 'John', 'Morgan', '47cbe56cbf65565d49db023892599f5f', '0012127032399', '795 E', 'Dragram', 'Tucson', 'U.S.A', 6, 6, '10', 'Sky Analytics', 'Vice President ', 'I research, speak teach and advise on topics related to purchasing decision, metrics and change in law firms.\r\nI connect my decade of fields-based research on law firms with my first-hand working in law firms as well as advising legal departments to generate novel insights and practical recommendations \r\n', 'Principal â€“ Law school\r\nAdjunct professor of law â€“ law school\r\nAdjunct professor of marketing â€“ College of law \r\nDirector of Research Service - TyMetric \r\n', 'Public speaking \r\nCorporate law\r\nStrategic planning \r\nManagement \r\nBusiness Development \r\nLegal Research\r\n', 'Team Member in Legal Marketing Association\r\nMember of the Law Practice Division\r\nMember in ABA Women Rainmakers\r\n', 'Lecturer', '0000-00-00 00:00:00', '861651ef5f574e52a931efd9b300504d', '1', 'Sent', 'cammock-1-1791888107.jpg', 'thumb_cammock-1-1791888107.jpg'),
(7, 'paulhodgman@yahoo.com.au', 'Paul', 'Hodgman', '0a7ee3e38bba0f96d09720fa0e6b9418', '00610292883000', '200', 'Broadway Av', 'West Beach', 'Australia', 4, 5, '2', 'Labor and Employment law', 'Senior Lecturer ', 'It is my goal to combine my range of experience with my willingness to become an efficient and successful HR professional.\r\nSpecialties â€“ Recruitment, Training & development, setting targets, employee assessment.\r\n', 'Research Professor\r\nSenior Lecturer\r\nAssociate Professor \r\nManaging Director \r\n', 'Recruiting \r\nPerformance Management  \r\nCRM \r\nEmployee Training \r\nPerformance Appraisal \r\nLeadership Development \r\nManagement Science \r\n', 'Member in HR Association\r\nTeam member in research Association\r\n', 'Lecturer', '0000-00-00 00:00:00', '0e62c9d9531bdb6647ec160bc5c52d9b', '1', 'Sent', 'dalzell-1-3364331447.jpg', 'thumb_dalzell-1-3364331447.jpg'),
(8, 'mahelafernando@gmail.com', 'Mahela', 'Fernando', 'ec0a273c085be8a663ca96fcdc3cf24a', '0094727600557', 'N 105', 'park road', 'Mt.Lavinia', 'Sri Lanka', 2, 6, '25', 'SLIIT', 'Senior Lecturer ', '25 years of experience as an interim manager and independent consultant & Academic lecturer in accounting & finance with extensive teaching experience at undergraduate and postgraduate levels in private and public educational institutions. \r\nSpecialties: Financial Reporting, Process improvement, Budgeting and forecasting, Cash flow forecasting, policies and procedures.\r\n', 'Honorary Advisor\r\nEditorial Board Member\r\nCourse Coordinator \r\nAssociate Editor \r\nEditor in Chief\r\nBoard of Finance Research\r\nSenior Lecturer\r\n', 'Auditing\r\nAccounting \r\nLecturing \r\nData analysis\r\nRisk Management \r\nQualitative research\r\nCorporate Finance\r\n', 'Member of editorial board\r\nMember of the Review Board \r\n', 'Lecturer', '0000-00-00 00:00:00', '74dee73e230510f036a4acf48ffb7373', '1', 'Sent', 'dsc_0136-1258819177.jpg', 'thumb_dsc_0136-1258819177.jpg'),
(9, 'senathdesilva@hotmail.com', 'Senath', 'De Silva ', '1ecdad1659001336d71b978e5ed324ae', '0094777695505', 'No 25 1/2', 'Dharmarama road', 'Colomobo 7', 'Sri Lanka', 7, 5, '9', 'Deshodaya Development Finance company LTD', 'Chief Executive Officer ', 'To provide cutting edge solutions for employee education, to provide best tertiary education qualifications and affiliations with leading international educational institutes. \r\nExperience in banking sectors for more than 16+ years with regards to corporate banking, SME, Project financing.\r\n', 'Visiting Lecturer\r\nChief Executive Officer,Colombo city campus\r\nHead of SME & Microfinance,ICICI bank\r\nSenior Relationship Manager\r\n', 'Project Finance,\r\nTrade Finance,\r\nRetail Banking, \r\nSME Banking, \r\nCorporate Banking, \r\nBusiness Strategy,\r\nMicrofinance,\r\nStrategic Management, \r\nLean Manufacturing\r\n', 'Member of Association of Business Executives\r\nAssociation of Professional Bankers\r\n', 'Lecturer', '0000-00-00 00:00:00', '76b8b04ac95cbf90b590d7890ae92889', '1', 'Sent', 's-9137332770.jpg', 'thumb_s-9137332770.jpg'),
(10, 'karinamishra@yahoo.co.in', 'Karina', 'Mishra', 'e3e57ef7445714ed57402d3b19079f3e', '00919789814974', 'Flat No. 100', 'Pitam Pura', 'New Delhi', 'India', 8, 6, '3', 'Saga College of Engineering ', 'Lecturer', 'Karina is a professional oriented and well-presented individual with the ability to learn new skills and systems very quickly and to a very high level, allowing her to deliver the results on time. She is dedicated to her roles and responsibilities, always keen to apply a first class attitude to whatever challenges she comes across.', 'Lecturer â€“ Gandhi Institute of Engineering and Technology\r\nVisiting Lecturer\r\nAssociate lecturer in Engineering  \r\nFreelance Design Engineering \r\nStudent Advocate\r\n', 'Leadership\r\nSupplier Negotiation\r\nFinance\r\nCommunication skills\r\nEngineering \r\nProject management \r\nLecturing \r\nExperimentation \r\n', 'Member of the Association of Engineering\r\nMember of Engineering Projects \r\nChartered member of the Institute of Engineering \r\n', 'Lecturer', '0000-00-00 00:00:00', '48567085bd8ee70928649e518ce2a981', '1', 'Sent', '402_image-2741616279.jpg', 'thumb_402_image-2741616279.jpg'),
(11, 'dexterrandall@hotmail.com', 'Dexter', 'Randall', 'f9b8765a8cbc723fe2789ff5848f3765', '009647503021112', '10 Qahwa Shareâ€™a', 'Al Asmaee', 'Al Basrah', 'Iraq', 9, 5, '15', 'MSc Pharmaceutical Sciences', 'Pharmacist BSc ', 'Proficient in prioritizing and completing tasks in a timely manner, yet flexible to multitask when necessary. A team player is who attentive to details and able to work in a fast paced environment. Excellent oral and written communication skills and enjoys learning new programs and processes.', 'Assistant Lecturer\r\nCommercial Coordinator \r\nProfessional Pharmacist\r\nPharmaceutical Representative\r\nVisiting Senior Lecturer\r\nConsultant (Public Health Medicine)\r\n', 'Healthcare\r\nPublic Health\r\neHealth\r\nMedicines\r\nHealthcare Management \r\nClinical Research\r\nKnowledge Management\r\nHealth Information Systems \r\nChange Management \r\n', 'Member of Pharmacists Syndicate \r\nPharmaceuticals Association\r\nMember of Pharmacist Research\r\n', 'Lecturer', '0000-00-00 00:00:00', '19b7249d62252345fb03b146c763bb4d', '1', 'Sent', 'abdel-wahab-1-525215687.jpg', 'thumb_abdel-wahab-1-525215687.jpg'),
(12, 'chamilaidm@gmail.com', 'Jennifer', 'Polland', '202cb962ac59075b964b07152d234b70', '1223659874', 'k', 'Galle Rd', 'Colombo 02', 'Sri Lanka', 2, 4, '10', 'k', 'k', 'Can  bring a dry academic subject to life while educating and inspiring students.\r\nBut if you add a level of fame to that mix, students will really pay attention.\r\n\r\nI was a  former U.S. Secretary of State Madeleine Albright to Pulitzer Prize-winning writer Junot Diaz.\r\n\r\n\r\n\r\nRead more: http://www.businessinsider.com/famous-college-professors-teaching-now-2013-4?op=1#ixzz2ybLJVbxU', 'k', 'k', 'k', 'Lecturer', '2014-04-11 13:52:34', '0fca5e25512da8744064aa3a46d5e433', '0', '', '', ''),
(13, 'jeewanthe@gmail.com', 'thushara', 'jeeewantha', 'ad4a77170d86096b9d6f6d420a01c094', '2784474', '47/45A', 'Perera avenue', 'Talangama south', 'sri lanka', 1, 4, '15', 'CIS', 'System administrator', 'abcd', 'abcd', 'abcd', 'ccna', 'Lecturer', '2014-04-25 00:41:29', 'b0a7d9eecb487d580a1934bd7ae2de4c', '0', '', '', ''),
(14, 'jeewanthe@cis.lk', 'Thushara', 'Jeewantha', 'ad4a77170d86096b9d6f6d420a01c094', '2784474', '47/45A', 'Perera avenue', 'Talangama south', 'sri lanka', 7, 4, '25', 'CIS', 'System administrator', 'abcd', 'abcd', 'abcd', 'ccna', 'Lecturer', '2014-04-25 01:15:20', '461c20b391a35e2cfa48e6a4d6fc6aa9', '0', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer_rate`
--

CREATE TABLE IF NOT EXISTS `lecturer_rate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lecturer_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `publish` datetime NOT NULL,
  `description` varchar(2000) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `publisher_name` varchar(100) NOT NULL,
  `full` varchar(200) NOT NULL,
  `thumb` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `publish`, `description`, `publisher_id`, `publisher_name`, `full`, `thumb`) VALUES
(4, 'Achievement and Service ', '2014-04-21 13:57:57', 'Outstanding individuals were honored at annual awards ceremony for the best services  at the awarding ceremony which was held on 04th April  2014.\r\n\r\nEvery year  this  achievement awards for professional  excellence to there  best  services offered and for their ratings on services.', 5, 'Nishantha Randika', '', ''),
(5, 'The Greater Achievements at Year 2014', '2014-04-22 11:36:05', 'Best Education Service Provider Awarding Ceremony...\r\n\r\nThe highlight of the best service provider awarding ceremony at the Kingsbury Singapore. Every year, this international Education, media and industry who come to make important contacts. It is a night of celebration and an important highlights..\r\n\r\nThis year, the awarding ceremony was held on 26 Feb 2014...', 5, 'Nishantha Randika', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `resource`
--

CREATE TABLE IF NOT EXISTS `resource` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `no_of_seats` varchar(50) NOT NULL,
  `location_id` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `resource`
--

INSERT INTO `resource` (`id`, `type`, `name`, `no_of_seats`, `location_id`, `description`) VALUES
(1, 'Location', 'Block A', '', 1, 'Block A'),
(2, 'Location', 'Block B', '', 0, 'block b'),
(7, 'Location', 'Block C', '', 0, 'HR Section.'),
(8, 'Room', 'Room No\\'' 01', '100', 1, 'This is a aaaaaaaaaaaaaaaaa\r\naaaaaaaaaaaaaaaaa'),
(9, 'Room', 'Auditorium 1', '300', 1, 'Seating Arrangement-Theatre'),
(10, 'Room', 'Auditorium 2', '200', 1, 'Seating Arrangement-Theatre'),
(11, 'Room', 'Auditorium 3', '100', 1, 'Seating Arrangement-Theatre'),
(12, 'Room', 'Class room 1', '200', 2, 'Class room with student desk '),
(13, 'Room', 'Class room 2', '100', 2, 'Class room with student desk'),
(14, 'Room', 'Class room 3', '50', 2, 'Class room with student desk'),
(15, 'Room', 'Board room 1', '70', 7, 'Seating Arrangement - u-shape '),
(16, 'Room', 'Board room 2', '40', 7, 'Seating Arrangement - u-shape'),
(17, 'Room', 'Board room 3', '150', 7, 'Seating Arrangement - Hollow square '),
(18, 'Room', 'Board room 4', '100', 7, 'Seating Arrangement - Hollow square'),
(19, 'Multimedia', 'Laptop 1', '', 0, 'Microsoft Windows '),
(20, 'Multimedia', 'Laptop 2', '', 0, 'Microsoft Windows '),
(21, 'Multimedia', 'Laptop 3', '', 0, 'Microsoft Windows '),
(22, 'Multimedia', 'Laptop 4', '', 0, 'Microsoft Windows '),
(23, 'Multimedia', 'Multimedia projector with screen 1', '', 0, '1024*768'),
(24, 'Multimedia', ' Multimedia projector with screen 2', '', 0, '1024*768'),
(25, 'Multimedia', 'Multimedia projector with screen 3', '', 0, '1366*768'),
(26, 'Multimedia', 'Multimedia projector with screen 4', '', 0, '1366*768'),
(27, 'Multimedia', 'wireless mike 1', '', 0, 'wireless mike'),
(28, 'Multimedia', 'wireless mike 2', '', 0, 'wireless mike'),
(29, 'Multimedia', 'wireless mike 3', '', 0, 'wireless mike'),
(30, 'Multimedia', 'wireless mike 4', '', 0, 'wireless mike'),
(31, 'Multimedia', 'Podium with mike 1', '', 0, 'Podium with wired mike'),
(32, 'Multimedia', 'Podium with mike 2', '', 0, 'Podium with wired mike'),
(33, 'Room', 'Humanities 1', '50', 7, 'Room with multimedia facilities.'),
(34, 'Room', 'Humanities 1', '50', 7, 'Room with multimedia facilities'),
(35, 'Room', 'Humanities 1', '50', 7, 'Room with multimedia facilities');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE IF NOT EXISTS `slides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slide_full_img` varchar(500) NOT NULL,
  `slide_thumb_img` varchar(500) NOT NULL,
  `description` varchar(200) NOT NULL,
  `rdate` datetime NOT NULL,
  `title` varchar(100) NOT NULL,
  `order_no` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `slide_full_img`, `slide_thumb_img`, `description`, `rdate`, `title`, `order_no`) VALUES
(1, 'uploads/slides/652835153.jpg', 'uploads/slides/thumb_652835153.jpg', 'Lorem Ipsum is simply dummy.', '2014-04-07 15:18:11', 'Lorem Ipsum is simply dummy text of the printing.', '1'),
(2, 'uploads/slides/944633662.jpg', 'uploads/slides/thumb_944633662.jpg', '', '2014-04-07 15:16:21', '', ''),
(3, 'uploads/slides/561521713.jpg', 'uploads/slides/thumb_561521713.jpg', '', '2014-04-07 15:16:21', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`) VALUES
(1, 'Information Technology'),
(2, 'Account & Finance'),
(4, 'HR'),
(5, 'Art'),
(6, 'Law'),
(7, 'Business Management'),
(8, 'Engineering'),
(9, 'Health'),
(12, 'Politics');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `password` varchar(50) CHARACTER SET big5 COLLATE big5_bin NOT NULL,
  `role` varchar(20) NOT NULL,
  `rdate` datetime NOT NULL,
  `activation` varchar(300) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `full_img` varchar(100) NOT NULL,
  `thumb_img` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `fname`, `lname`, `password`, `role`, `rdate`, `activation`, `status`, `full_img`, `thumb_img`) VALUES
(2, 'manager1@tks.com', 'Nishan', 'Randika', 'e10adc3949ba59abbe56e057f20f883e', 'Organizer', '2014-03-08 00:00:00', '', '1', '', ''),
(5, 'admin@tks.com', 'Chinthana', 'Wijekoon', 'e10adc3949ba59abbe56e057f20f883e', 'Administrator', '2014-03-09 00:00:00', '', '1', '333-9027913236.jpg', 'thumb_333-9027913236.jpg'),
(6, 'chinthana@tks.com', 'chinthana', 'wijekoon', 'e10adc3949ba59abbe56e057f20f883e', 'Administrator', '2014-03-12 10:11:00', '', '1', '', ''),
(7, 'kasun@tks.com', 'kasun', 'sameera', 'e10adc3949ba59abbe56e057f20f883e', 'Support', '2014-04-02 07:48:55', '', '1', '', ''),
(10, 'jeewanthe@cis.lk', 'thushara', 'Jeewantha', '2ab7c4eac803b4dc2360e996ff403b85', 'Organizer', '2014-04-25 04:39:32', '', '1', '', ''),
(11, 'jeewanthe@cis.lk', 'Thushara', 'Jeewantha', 'ad4a77170d86096b9d6f6d420a01c094', 'Organizer', '2014-04-28 03:06:06', '', '1', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `name`) VALUES
(1, 'Administrator'),
(2, 'Organizer'),
(3, 'Lecturer'),
(4, 'Deleget'),
(5, 'Support');

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE IF NOT EXISTS `user_sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `login` datetime NOT NULL,
  `logout` datetime NOT NULL,
  `session_id` varchar(50) NOT NULL,
  `autologout` tinyint(1) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_sessions`
--

INSERT INTO `user_sessions` (`id`, `uid`, `lid`, `did`, `login`, `logout`, `session_id`, `autologout`, `status`) VALUES
(1, 2, 0, 0, '2014-04-30 12:39:04', '2014-04-30 12:40:11', 'r1dm4k2nok84jtj1k514nn7pi1', 0, ''),
(2, 11, 0, 0, '2014-04-30 12:41:42', '2014-04-30 12:41:59', 'r1dm4k2nok84jtj1k514nn7pi1', 0, ''),
(3, 2, 0, 0, '2014-04-30 16:08:58', '2014-04-30 16:12:02', 'ip65038f6n9a2clh747ml2r9r6', 0, ''),
(4, 5, 0, 0, '2014-04-30 16:20:32', '0000-00-00 00:00:00', 'h59al7nj9gr465vnpd4lns61j7', 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
