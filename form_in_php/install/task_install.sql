-- Active: 1677862050103@@127.0.0.1@3306@form_in_php

DROP TABLE IF EXISTS `tasks`;

CREATE TABLE `tasks` (
    `task_id` int NOT NULL AUTO_INCREMENT,
    `user_id` int,
    `name` varchar(255) NOT NULL, 
    `due_date` DATE,
    `done` BOOLEAN,
    PRIMARY KEY (`task_id`),
    -- FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
);


-- INSERT INTO `tasks` (`task_id`, `user_id`, `name`, `due_date`, `done`) VALUES (NULL, '2', 'fare la spesa', '2023-04-07', '1');