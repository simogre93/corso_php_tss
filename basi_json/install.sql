-- Active: 1677862050103@@127.0.0.1@3306@form_in_php

use form_in_php;
CREATE TABLE regioni (
    regione_id int NOT NULL AUTO_INCREMENT,
    nome varchar(255) NOT NULL,
    PRIMARY KEY (regione_id)
);

--drop table regioni;

insert INTO regioni (nome) VALUES ('Abruzzo');

SELECT * FROM regioni;

INSERT INTO regioni (nome) VALUES ('Valle d\'Aosta/Vallée d\'Aoste');

-- svuota tabella lasciando struttura intatta 
TRUNCATE TABLE regioni;