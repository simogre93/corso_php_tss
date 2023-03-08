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

SELECT regione_id FROM regioni WHERE nome= 'Sicilia';

-- svuota tabella lasciando struttura intatta 
TRUNCATE TABLE regioni;