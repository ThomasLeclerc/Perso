drop table if exists CLASSEMENT;
drop table if exists COMPETITION;
drop table if exists ESTSPECIALISTE;
drop table if exists DISCIPLINE;
drop table if exists ATHLETE;
drop table if exists CLUB;
drop table if exists VILLE;

create table VILLE(

	noVille INT NOT NULL AUTO_INCREMENT,
	nomVille VARCHAR(25),
	PRIMARY KEY(noVille))
	TYPE=InnoDB;

create table CLUB(

	noClub INT NOT NULL AUTO_INCREMENT,
	nomClub VARCHAR(20),
	noVille INT,
	PRIMARY KEY(noClub),
	CONSTRAINT fkCLUB FOREIGN KEY(noVille) REFERENCES VILLE(noVille))
	TYPE=InnoDB;


create table DISCIPLINE(

	noDiscipline INT NOT NULL AUTO_INCREMENT,
	libelleDiscipline VARCHAR(20),
	PRIMARY KEY(noDiscipline))
	TYPE = InnoDB;


create table ATHLETE(

	noAthlete INT NOT NULL AUTO_INCREMENT,
	nomAthlete VARCHAR(20),
	noClub INT,
	PRIMARY KEY(noAthlete),
	CONSTRAINT fkATHLETE FOREIGN KEY(noClub) REFERENCES CLUB(noClub))
	TYPE = InnoDB;


create table ESTSPECIALISTE(

	noAthlete INT,
	noDiscipline INT,
	CONSTRAINT fkESTSPECIALISTE0 FOREIGN KEY(noAthlete) REFERENCES ATHLETE(noAthlete),
	CONSTRAINT fkESTSPECIALISTE1 FOREIGN KEY(noDiscipline) REFERENCES DISCIPLINE(noDiscipline))
	TYPE=InnoDB;


create table COMPETITION(

	noCompet INT NOT NULL AUTO_INCREMENT,
	nomCompet VARCHAR(25),
	dateCompet DATE,
	noClub INT,
	PRIMARY KEY(noCompet),
	CONSTRAINT fkCOMPETITION FOREIGN KEY(noClub) REFERENCES CLUB(noClub))
	TYPE=InnoDB;

create table CLASSEMENT(

	noAthlete INT,
	noCompet INT,
	noDiscipline INT,
	classement VARCHAR(7),
	CONSTRAINT fkCLASSEMENT0 FOREIGN KEY(noAthlete) REFERENCES ATHLETE(noAthlete),
	CONSTRAINT fkCLASSEMENT1 FOREIGN KEY(noCompet) REFERENCES COMPETITION(noCompet),
	CONSTRAINT fkCLASSEMENT2 FOREIGN KEY(noDiscipline) REFERENCES CLASSEMENT(noDiscipline))
	TYPE=InnoDB;  
