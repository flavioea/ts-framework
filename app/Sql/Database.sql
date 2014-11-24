CREATE TABLE `users` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(45) DEFAULT NULL,
	`last_name` varchar(100) DEFAULT NULL,
	`login` varchar(45) NOT NULL,
	`pass` varchar(60) NOT NULL,
	`created` datetime DEFAULT NULL,
	`updated` datetime DEFAULT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

INSERT INTO `users`
	(name, last_name, login, pass, created)
VALUES
('Eduardo', 'dos Santos', 'eduardo', '123456', NOW()),
('Marcos', 'Silva', 'marcos', '789456', NOW()),
('Renata', 'Guimarães', 'renata', '321654', NOW()),
('Fabiana', 'Guedes', 'fabiana', '01234', NOW());

