CREATE DATABASE sap;

USE sap;

CREATE TABLE login(
	login VARCHAR (100) NOT NULL UNIQUE,
    senha CHAR (14) NOT NULL
);

CREATE TABLE defeitos(
	codDef CHAR(1) PRIMARY KEY,
    tipoDef VARCHAR (100) NOT NULL
);

CREATE TABLE equipamento(
	codEqui CHAR(1) PRIMARY KEY,
	tipoEqui VARCHAR (100)
);

INSERT INTO defeitos(codDef, tipoDef)
VALUES
(1, 'Quebra ferramenta'),
(2, 'Travamento Eixo H'),
(3, 'Queima motor'),
(4, 'Queima placa rede'),
(5, 'Bomba d''água inoperante'),
(6, 'Disco rígido não iniciou');

INSERT INTO equipamento(codEqui, tipoEqui)
VALUES
(1, 'Torno CNC'),
(2, 'Fresa'),
(3, 'Computador');

CREATE TABLE relatorios_defeito(
	id INT PRIMARY KEY AUTO_INCREMENT,
	datav DATETIME,
    hrIni DATETIME,
    hrFim DATETIME,
    tempoParado DATETIME
);

ALTER TABLE relatorios_defeito ADD COLUMN codRelEqui CHAR(1);
ALTER TABLE relatorios_defeito ADD COLUMN codRelDef CHAR(1);

ALTER TABLE relatorios_defeito ADD CONSTRAINT fk_equipamento FOREIGN KEY (codRelEqui) REFERENCES equipamento(codEqui);
ALTER TABLE relatorios_defeito ADD CONSTRAINT fk_defeitos FOREIGN KEY (codRelDef) REFERENCES defeitos(codDef);  

INSERT INTO login (login, senha) VALUES ('adm@adm', 1501);

SELECT * FROM relatorios_defeito;

DESCRIBE relatorios_defeito;

-- Tabela 'vírtual' de relatorios e defeitos :)
CREATE VIEW view_relatorios AS
SELECT rd.datav, e.tipoEqui, rd.codRelDef, rd.hrIni, rd.hrFim, d.tipoDef
FROM relatorios_defeito rd
INNER JOIN equipamento e ON rd.codRelEqui = e.codEqui
INNER JOIN defeitos d ON rd.codRelDef = d.codDef;