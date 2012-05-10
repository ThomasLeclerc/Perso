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
	nomClub VARCHAR(40),
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
	CONSTRAINT fkCLASSEMENT2 FOREIGN KEY(noDiscipline) REFERENCES DISCIPLINE(noDiscipline))
	TYPE=InnoDB;  


insert into VILLE values (null, "Besançon");
insert into VILLE values (null, "Belfort");
insert into VILLE values (null, "Lyon");
insert into VILLE values (null, "Toulouse");

insert into CLUB values (null, "Belfort Athlé", 1);
insert into CLUB values (null, "AS Toulouse", 4);
insert into CLUB values (null, "Lyon sports", 3);

insert into ATHLETE values (null, "toto", 1);
insert into ATHLETE values (null, "Jaques Martin", 1);
insert into ATHLETE values (null, "Jean Delafeuille", 1);
insert into ATHLETE values (null, "Marc Dumont", 1);
insert into ATHLETE values (null, "Jean-guy Miller", 1);
insert into ATHLETE values (null, "Doug Amillton", 2);
insert into ATHLETE values (null, "Arron Durand", 3);

insert into DISCIPLINE values (null, "100 m");
insert into DISCIPLINE values (null, "Marathon");
insert into DISCIPLINE values (null, "Lancer de javelot");
insert into DISCIPLINE values (null, "Lancer de poids");
insert into DISCIPLINE values (null, "400 m");
insert into DISCIPLINE values (null, "800 m");

insert into ESTSPECIALISTE values (1, 1);
insert into ESTSPECIALISTE values (1, 5);
insert into ESTSPECIALISTE values (2, 1);
insert into ESTSPECIALISTE values (3, 1);
insert into ESTSPECIALISTE values (4, 1);
insert into ESTSPECIALISTE values (5, 1);
insert into ESTSPECIALISTE values (5, 3);
insert into ESTSPECIALISTE values (6, 2);

insert into COMPETITION values (null, "meeting Belfort", "1999-05-12", 1);
insert into COMPETITION values (null, "Criterium régionnal", "2001-05-26", 2);
insert into COMPETITION values (null, "Rencontres interdistrict", "2010-02-05", 3);

insert into CLASSEMENT values (1, 1, 1, "1");
insert into CLASSEMENT values (2, 1, 1, "2");
insert into CLASSEMENT values (4, 1, 1, "4");
insert into CLASSEMENT values (1, 1, 5, "1");
insert into CLASSEMENT values (3, 3, 3, "1");