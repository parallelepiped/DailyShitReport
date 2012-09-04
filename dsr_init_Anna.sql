#CREATE DATABASE dsr_content;

#USE dsr_content;
DROP TABLE shweets;
DROP TABLE votes;

CREATE TABLE `shweets` (
  `id` INT AUTO_INCREMENT,
  `date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `text` VARCHAR(155),
  `upvotes` INT NOT NULL DEFAULT 0,
  `approved` TINYINT(1) DEFAULT 0,
  `vote_time` INT DEFAULT 0,
  `raw_score` DEC(7,3) DEFAULT 0.0,
  # hotness_score
  PRIMARY KEY (`id`)
);

# upvotes = number of upvotes => max = WORST
# vote_time = number of days since most recent vote => min = FRESHEST
# raw_score = sum_allvotes(.5 ^ (number of days since vote)) => max = HOTTEST

CREATE TABLE `votes` (
	`id` INT AUTO_INCREMENT,
	`date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	`shweet_id` INT,
	PRIMARY KEY (`id`)
);