-- Create the database
CREATE DATABASE IF NOT EXISTS your_database_name;
USE your_database_name;

-- Drop foreign key constraints temporarily
SET FOREIGN_KEY_CHECKS = 0;

-- Drop tables in reverse order of creation
DROP TABLE IF EXISTS Laptop;
DROP TABLE IF EXISTS Imprimanta;
DROP TABLE IF EXISTS PC;
DROP TABLE IF EXISTS Produs;

-- Enable foreign key checks again
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE Produs (
    model INT PRIMARY KEY,
    fabricant VARCHAR(50),
    categorie VARCHAR(20) CHECK (categorie IN ('PC', 'LAPTOP', 'IMPRIMANTA')),
    pret DECIMAL(8,2) CHECK (pret BETWEEN 10 AND 100000),
    moneda VARCHAR(3)
);
INSERT INTO Produs (model, fabricant, categorie, pret,moneda) VALUES (123,'HP','LAPTOP',2200,'EUR');
INSERT INTO Produs (model, fabricant, categorie, pret,moneda) VALUES (70,'LENOVO','PC',500,'EUR');
INSERT INTO Produs (model, fabricant, categorie, pret,moneda) VALUES (71,'DELL','LAPTOP',3300,'EUR');
INSERT INTO Produs (model, fabricant, categorie, pret,moneda) VALUES (72,'DELL','IMPRIMANTA',2200,'EUR');
INSERT INTO Produs (model, fabricant, categorie, pret,moneda) VALUES (73,'HP','IMPRIMANTA',2200,'EUR');
INSERT INTO Produs (model, fabricant, categorie, pret,moneda) VALUES (74,'LENOVO','LAPTOP',450,'EUR');
INSERT INTO Produs (model, fabricant, categorie, pret,moneda) VALUES (75,'DELL','IMPRIMANTA',4500,'EUR');
INSERT INTO Produs (model, fabricant, categorie, pret,moneda) VALUES (76,'LENOVO','PC',450,'EUR');
INSERT INTO Produs (model, fabricant, categorie, pret,moneda) VALUES (77,'HP','IMPRIMANTA',4500,'EUR');
INSERT INTO Produs (model, fabricant, categorie, pret,moneda) VALUES (78,'LENOVO','PC',2542,'EUR');

-- Tabela PC
CREATE TABLE PC (
    model INT PRIMARY KEY,
    viteza DECIMAL(4,2),
    ram INT,
    hd INT,
    CHECK ((viteza <= 1.8 AND hd IS NULL) OR (viteza > 1.8 AND hd > 500)),
    FOREIGN KEY (model) REFERENCES Produs(model)
);

INSERT INTO PC (model, viteza, ram, hd) VALUES (123,50,0.5,1000);
INSERT INTO PC (model, viteza, ram, hd) VALUES (70,45,1.1,800);
INSERT INTO PC (model, viteza, ram, hd) VALUES (71,33.33,0.5,700);
INSERT INTO PC (model, viteza, ram, hd) VALUES (72,70,1.2,750);
INSERT INTO PC (model, viteza, ram, hd) VALUES (73,56,0.8,1000);
INSERT INTO PC (model, viteza, ram, hd) VALUES (74,32,1,1500);
INSERT INTO PC (model, viteza, ram, hd) VALUES (75,51,1.3,1200);
INSERT INTO PC (model, viteza, ram, hd) VALUES (76,40,0.8,906);
INSERT INTO PC (model, viteza, ram, hd) VALUES (77,47,0.9,950);
INSERT INTO PC (model, viteza, ram, hd) VALUES (78,53,1.15,1000);

-- Tabela Imprimanta
CREATE TABLE Imprimanta (
    model INT PRIMARY KEY,
    culoare CHAR(1) CHECK (culoare IN ('D', 'N')),
    tip VARCHAR(10) CHECK (tip IN ('ace', 'jet', 'laser')),
    FOREIGN KEY (model) REFERENCES Produs(model)
);

INSERT INTO Imprimanta (model, culoare, tip) VALUES (123,'D','ace');
INSERT INTO Imprimanta (model, culoare, tip) VALUES (70,'N','jet');
INSERT INTO Imprimanta (model, culoare, tip) VALUES (71,'D','laser');
INSERT INTO Imprimanta (model, culoare, tip) VALUES (72,'N','ace');
INSERT INTO Imprimanta (model, culoare, tip) VALUES (73,'N','jet');
INSERT INTO Imprimanta (model, culoare, tip) VALUES (74,'D','jet');
INSERT INTO Imprimanta (model, culoare, tip) VALUES (75,'D','laser');
INSERT INTO Imprimanta (model, culoare, tip) VALUES (76,'N','ace');
INSERT INTO Imprimanta (model, culoare, tip) VALUES (77,'D','jet');
INSERT INTO Imprimanta (model, culoare, tip) VALUES (78,'N','laser');

-- Tabela Laptop
CREATE TABLE Laptop (
    model INT PRIMARY KEY,
    viteza DECIMAL(4,2),
    ram INT,
    hd INT,
    ecran DECIMAL(4,1),
    FOREIGN KEY (model) REFERENCES Produs(model)
);

INSERT INTO Laptop (model, viteza, ram, hd, ecran) VALUES (123,50,0.5,1000,12);
INSERT INTO Laptop (model, viteza, ram, hd, ecran) VALUES (70,45,1.1,800,5.6);
INSERT INTO Laptop (model, viteza, ram, hd, ecran) VALUES (71,33,0.8,700,10);
INSERT INTO Laptop (model, viteza, ram, hd, ecran) VALUES (72,70,1.2,1100,15);
INSERT INTO Laptop (model, viteza, ram, hd, ecran) VALUES (73,56,0.8,1000,5.6);
INSERT INTO Laptop (model, viteza, ram, hd, ecran) VALUES (74,32,1,3000,5.6);
INSERT INTO Laptop (model, viteza, ram, hd, ecran) VALUES (75,51,1.3,1000,22);
INSERT INTO Laptop (model, viteza, ram, hd, ecran) VALUES (76,40,0.8,1500,15);
INSERT INTO Laptop (model, viteza, ram, hd, ecran) VALUES (77,47,0.9,700,5.6);
INSERT INTO Laptop (model, viteza, ram, hd, ecran) VALUES (78,53,0.5,1000,16);

SELECT * FROM laptop;