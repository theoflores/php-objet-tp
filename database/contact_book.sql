SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+01:00";

DROP DATABASE IF EXISTS user_book;
CREATE DATABASE user_book CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE user_book;


-- Stucture of table "utilisateur"
CREATE TABLE utilisateur (

    id_utilisateur     INT            NOT NULL AUTO_INCREMENT,
    email       VARCHAR(50)    NOT NULL,
    mdp      VARCHAR(50)    NOT NULL,

    PRIMARY KEY (id_utilisateur)
);

-- Content of table "utilisateur"
INSERT INTO utilisateur (email, mdp) VALUES ('e.gigondan@gmail.com', 'fee8346a5a401a9c314846811346613d2ddf998c');

-- Stucture of table "contact"
CREATE TABLE contact (
    
    id_contact  INT            NOT NULL AUTO_INCREMENT,
    prenom   VARCHAR(50)    NOT NULL,
    nom    VARCHAR(50)    NOT NULL,
    email       VARCHAR(50)    NOT NULL,
    mobile      VARCHAR(10)    NOT NULL,

    PRIMARY KEY (id_contact)
);

-- Content of table "contact"
-- INSERT INTO contact (prenom, nom, email, mobile) VALUES ('', '', '', '');

-- Stucture of table "book"
CREATE TABLE book (

    id_book     INT            NOT NULL,
    id_utilisateur     INT            NOT NULL,
    book_name   VARCHAR(50)    NOT NULL,

    PRIMARY KEY (id_book),
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur)
);

-- Stucture of table "list_contact"
CREATE TABLE list_contact (

    id_book     INT            NOT NULL,
    id_contact  INT            NOT NULL,

    FOREIGN KEY (id_book) REFERENCES book(id_book),
    FOREIGN KEY (id_contact) REFERENCES contact(id_contact)
);