

DROP TABLE IF EXISTS `taglines`;

CREATE TABLE `taglines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text` varchar(155) DEFAULT NULL,
  PRIMARY KEY (`id`)
);


INSERT INTO `taglines` (`text`) VALUES 
  ("Get yr log on."),
  ("Shit. Share. Be Happy."),
  ("Embrace your rectalmasculinity."),
  ("Tweet about your poopy. Duh."),
  ("At work. On the throne. Five days a week."),
  ("Everybody poops.");