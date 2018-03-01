-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 01, 2018 at 09:57 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_members`
--

DROP TABLE IF EXISTS `blog_members`;
CREATE TABLE IF NOT EXISTS `blog_members` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password_digest` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_members`
--

INSERT INTO `blog_members` (`id`, `username`, `password_digest`, `email`) VALUES
(1, 'Demo', 'password', 'demo@demo.com');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

DROP TABLE IF EXISTS `blog_posts`;
CREATE TABLE IF NOT EXISTS `blog_posts` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `author` tinytext NOT NULL,
  `postTitle` varchar(255) DEFAULT NULL,
  `postDesc` text,
  `postCont` text,
  `postDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `author`, `postTitle`, `postDesc`, `postCont`, `postDate`) VALUES
(1, 'Demo', 'Bendless Love', '&lt;p&gt;That&#039;s right, baby. I ain&#039;t your loverboy Flexo, the guy you love so much. You even love anyone pretending to be him! Interesting. No, wait, the other thing: tedious. Hey, guess what you&#039;re accessories to. The alien mothership is in orbit here. If we can hit that bullseye, the rest of the dominoes will fall like a house of cards. Checkmate.&lt;/p&gt;', '&lt;h2&gt;The Mutants Are Revolting&lt;/h2&gt;\r\n&lt;p&gt;We don&#039;t have a brig. And until then, I can never die? We need rest. The spirit is willing, but the flesh is spongy and bruised. And yet you haven&#039;t said what I told you to say! How can any of us trust you?&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Oh, but you can. But you may have to metaphorically make a deal with the devil. And by &quot;devil&quot;, I mean Robot Devil. And by &quot;metaphorically&quot;, I mean get your coat.&lt;/li&gt;\r\n&lt;li&gt;Bender?! You stole the atom.&lt;/li&gt;\r\n&lt;li&gt;I was having the most wonderful dream. Except you were there, and you were there, and you were there!&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;h3&gt;The Series Has Landed&lt;/h3&gt;\r\n&lt;p&gt;Fry! Stay back! He&#039;s too powerful! No. We&#039;re on the top. Fry, you can&#039;t just sit here in the dark listening to classical music.&lt;/p&gt;\r\n&lt;h4&gt;Future Stock&lt;/h4&gt;\r\n&lt;p&gt;Does anybody else feel jealous and aroused and worried? We&#039;re also Santa Claus! You&#039;re going back for the Countess, aren&#039;t you? Well, let&#039;s just dump it in the sewer and say we delivered it.&lt;/p&gt;\r\n&lt;ol&gt;\r\n&lt;li&gt;Spare me your space age technobabble, Attila the Hun!&lt;/li&gt;\r\n&lt;li&gt;You guys realize you live in a sewer, right?&lt;/li&gt;\r\n&lt;li&gt;I guess if you want children beaten, you have to do it yourself.&lt;/li&gt;\r\n&lt;li&gt;Yeah. Give a little credit to our public schools.&lt;/li&gt;\r\n&lt;/ol&gt;\r\n&lt;h5&gt;The Why of Fry&lt;/h5&gt;\r\n&lt;p&gt;Who are you, my warranty?! Shinier than yours, meatbag. Dr. Zoidberg, that doesn&#039;t make sense. But, okay! Yes, except the Dave Matthews Band doesn&#039;t rock.&lt;/p&gt;', '2013-05-29 00:00:00'),
(2, '', 'That Darn Katz!', '<p>Wow! A superpowers drug you can just rub onto your skin? You\'d think it would be something you\'d have to freebase. Fry, you can\'t just sit here in the dark listening to classical music. And yet you haven\'t said what I told you to say! How can any of us trust you?</p>', '<h2>Xmas Story</h2>\r\n<p>It must be wonderful. Does anybody else feel jealous and aroused and worried? Is today\'s hectic lifestyle making you tense and impatient? Soothe us with sweet lies. That\'s right, baby. I ain\'t your loverboy Flexo, the guy you love so much. You even love anyone pretending to be him!</p>\r\n<ul>\r\n<li>Goodbye, friends. I never thought I\'d die like this. But I always really hoped.</li>\r\n<li>They\'re like sex, except I\'m having them!</li>\r\n<li>Come, Comrade Bender! We must take to the streets!</li>\r\n</ul>\r\n<h3>Anthology of Interest I</h3>\r\n<p>Hey, whatcha watching? They\'re like sex, except I\'m having them! Well I\'da done better, but it\'s plum hard pleading a case while awaiting trial for that there incompetence. Yes, except the Dave Matthews Band doesn\'t rock. I suppose I could part with \'one\' and still be feared&hellip;</p>\r\n<h4>Teenage Mutant Leela\'s Hurdles</h4>\r\n<p>Oh, but you can. But you may have to metaphorically make a deal with the devil. And by \"devil\", I mean Robot Devil. And by \"metaphorically\", I mean get your coat. Please, Don-Bot&hellip; look into your hard drive, and open your mercy file! It\'s a T. It goes \"tuh\". I guess if you want children beaten, you have to do it yourself.</p>\r\n<ol>\r\n<li>Spare me your space age technobabble, Attila the Hun!</li>\r\n<li>Well, thanks to the Internet, I\'m now bored with sex. Is there a place on the web that panders to my lust for violence?</li>\r\n</ol>\r\n<h5>The Farnsworth Parabox</h5>\r\n<p>Wow! A superpowers drug you can just rub onto your skin? You\'d think it would be something you\'d have to freebase. We need rest. The spirit is willing, but the flesh is spongy and bruised. It must be wonderful.</p>', '2013-06-05 23:10:35'),
(3, 'Demo', 'How Hermes Requisitioned His Groove Back', '&lt;p&gt;Are you going back for the Countess? Wow! A superpowers drug you can just rub onto your skin? You&#039;d think it would be something you&#039;d have to freebase. Now Fry, it&#039;s been a few years since medical school, so remind me. Disemboweling in your species: fatal or non-fatal? I don&#039;t want to be rescued. Leela, are you alright? You got wanged on the head.&lt;/p&gt;', '&lt;h2&gt;The Luck of the Fryrish&lt;/h2&gt;\r\n&lt;p&gt;Professor, make a woman out of me. I am the man with no name, Zapp Brannigan! Good man. Nixon&#039;s pro-war and pro-family. The alien mothership is in orbit here. If we can hit that bullseye, the rest of the dominoes will fall like a house of cards. Checkmate. Fry, you can&#039;t just sit here in the dark listening to classical music.&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Who are those horrible orange men?&lt;/li&gt;\r\n&lt;li&gt;Is today&#039;s hectic lifestyle making you tense and impatient?&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;h3&gt;Lethal Inspection&lt;/h3&gt;\r\n&lt;p&gt;Oh, but you can. But you may have to metaphorically make a deal with the devil. And by &quot;devil&quot;, I mean Robot Devil. And by &quot;metaphorically&quot;, I mean get your coat. No. We&#039;re on the top. Does anybody else feel jealous and aroused and worried? Well I&#039;da done better, but it&#039;s plum hard pleading a case while awaiting trial for that there incompetence. It must be wonderful.&lt;/p&gt;\r\n&lt;h4&gt;Where No Fan Has Gone Before&lt;/h4&gt;\r\n&lt;p&gt;Who are those horrible orange men? Bender, we&#039;re trying our best. Please, Don-Bot&amp;hellip; look into your hard drive, and open your mercy file! Wow! A superpowers drug you can just rub onto your skin? You&#039;d think it would be something you&#039;d have to freebase. WINDMILLS DO NOT WORK THAT WAY! GOOD NIGHT! Look, last night was a mistake.&lt;/p&gt;\r\n&lt;ol&gt;\r\n&lt;li&gt;I&#039;m sorry, guys. I never meant to hurt you. Just to destroy everything you ever believed in.&lt;/li&gt;\r\n&lt;li&gt;Stop it, stop it. It&#039;s fine. I will &#039;destroy&#039; you!&lt;/li&gt;\r\n&lt;li&gt;You guys realize you live in a sewer, right?&lt;/li&gt;\r\n&lt;/ol&gt;\r\n&lt;h5&gt;Fear of a Bot Planet&lt;/h5&gt;\r\n&lt;p&gt;Why yes! Thanks for noticing. Hey, guess what you&#039;re accessories to. Yes, except the Dave Matthews Band doesn&#039;t rock. Take me to your leader! Daddy Bender, we&#039;re hungry.&lt;/p&gt;', '2013-06-05 23:20:24'),
(6, '', 'The Cyber House Rules', '<p>You guys realize you live in a sewer, right? Uh, is the puppy mechanical in any way? Come, Comrade Bender! We must take to the streets! I daresay that Fry has discovered the smelliest object in the known universe! Good news, everyone! There\'s a report on TV with some very bad news!</p>', '<h2>The Luck of the Fryrish</h2>\r\n<p>Professor, make a woman out of me. I am the man with no name, Zapp Brannigan! Good man. Nixon\'s pro-war and pro-family. The alien mothership is in orbit here. If we can hit that bullseye, the rest of the dominoes will fall like a house of cards. Checkmate. Fry, you can\'t just sit here in the dark listening to classical music.</p>\r\n<ul>\r\n<li>Who are those horrible orange men?</li>\r\n<li>Is today\'s hectic lifestyle making you tense and impatient?</li>\r\n</ul>\r\n<h3>Lethal Inspection</h3>\r\n<p>Oh, but you can. But you may have to metaphorically make a deal with the devil. And by \"devil\", I mean Robot Devil. And by \"metaphorically\", I mean get your coat. No. We\'re on the top. Does anybody else feel jealous and aroused and worried? Well I\'da done better, but it\'s plum hard pleading a case while awaiting trial for that there incompetence. It must be wonderful.</p>\r\n<h4>Where No Fan Has Gone Before</h4>\r\n<p>Who are those horrible orange men? Bender, we\'re trying our best. Please, Don-Bot&hellip; look into your hard drive, and open your mercy file! Wow! A superpowers drug you can just rub onto your skin? You\'d think it would be something you\'d have to freebase. WINDMILLS DO NOT WORK THAT WAY! GOOD NIGHT! Look, last night was a mistake.</p>\r\n<ol>\r\n<li>I\'m sorry, guys. I never meant to hurt you. Just to destroy everything you ever believed in.</li>\r\n<li>Stop it, stop it. It\'s fine. I will \'destroy\' you!</li>\r\n<li>You guys realize you live in a sewer, right?</li>\r\n</ol>\r\n<h5>Fear of a Bot Planet</h5>\r\n<p>Why yes! Thanks for noticing. Hey, guess what you\'re accessories to. Yes, except the Dave Matthews Band doesn\'t rock. Take me to your leader! Daddy Bender, we\'re hungry.</p>', '2013-06-06 08:28:35');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
