-- Active: 1677862050103@@127.0.0.1@3306@form_in_php

use form_in_php;
CREATE TABLE regioni (
    regione_id int NOT NULL AUTO_INCREMENT,
    nome varchar(255) NOT NULL,
    PRIMARY KEY (regione_id)
);

CREATE TABLE province (
    province_id int NOT NULL AUTO_INCREMENT,
    nome varchar(255) NOT NULL,
    sigla char(2) NOT NULL,
    regione_id int,
    PRIMARY KEY (province_id),
    FOREIGN KEY (regione_id) REFERENCES regioni (regione_id)
);
--drop table regioni;

--drop table province;

insert INTO regioni (nome) VALUES ('Abruzzo');

SELECT * FROM regioni;

SELECT * FROM province;

INSERT INTO regioni (nome) VALUES ('Valle d\'Aosta/Vallée d\'Aoste');

SELECT regione_id FROM regioni WHERE nome= 'Piemonte';

-- svuota tabella lasciando struttura intatta 
TRUNCATE TABLE regioni;

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `birth_city` varchar(255) NOT NULL,
  `regione_id` int(11) NOT NULL,
  `provincia_id` int(11) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `user` (`first_name`, `last_name`, `birthday`, `birth_city`, `regione_id`, `provincia_id`, `gender`, `username`, `password`) 
                    VALUES ('Mario', 'Rossi', '2023-03-15', 'Torino', '12', '96', 'M', 'Mariorossi@email.com', MD5('password'));