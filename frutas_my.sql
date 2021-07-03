CREATE TABLE `frutas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fruta` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `valor` decimal NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `frutas` (`id`, `fruta`, `data`, `valor`) VALUES
(1,	'banana',	'2020-05-25',	'100.00'),
(2,	'banana',	'2020-05-28',	'150.00'),
(3,	'banana',	'2020-06-15',	'160.00'),
(4,	'manga',	'2020-06-15',	'100.00'),
(5,	'manga',	'2020-06-15',	'150.00'),
(6,	'manga',	'2020-07-16',	'550.00'),
(7,	'laranja',	'2020-07-18',	'520.50'),
(8,	'laranja',	'2020-07-18',	'100.00'),
(9,	'laranja',	'2020-07-21',	'400.00');

