

DROP TABLE IF EXISTS `taglines`;

CREATE TABLE `taglines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text` varchar(155) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1428 DEFAULT CHARSET=latin1;


INSERT INTO `taglines` (`text`) VALUES ("Get yr log on."), ("Shit. Share. Be Happy."), ("Embrace your rectalmasculinity");