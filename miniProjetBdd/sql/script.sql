drop table if exists CLASSEMENT;
drop table if exists COMPETITION;
drop table if exists ESTSPECIALISTE;
drop table if exists DISCIPLINE;
drop table if exists ATHLETE;
drop table if exists CLUB;
drop table if exists VILLE;

create table VILLE (
	noVille int not null auto_increment,
	nomVille varchar(40),
	PRIMARY KEY(noVille))type=InnoDB;

create table CLUB (
	noClub int not null auto_increment,
	nomClub varchar(40),
	noVille int,
	PRIMARY KEY (noClub),
	CONSTRAINT fc FOREIGN KEY(noVille) REFERENCES VILLE(noVille) ON DELETE CASCADE)type=InnoDB;

create table ATHLETE (
	noAthlete int not null auto_increment,
	nomAthlete char(30),
	noClub int,
	PRIMARY KEY(noAthlete),
	CONSTRAINT fa FOREIGN KEY(noClub) REFERENCES CLUB(noClub) ON DELETE CASCADE)type=InnoDB;


create table DISCIPLINE (
	noDiscipline int not null auto_increment,
	libelleDiscipline char(30),
	PRIMARY KEY(noDiscipline))type=InnoDB;
	
create table ESTSPECIALISTE(
	noAthlete int,
	noDiscipline int,
	PRIMARY KEY(noAthlete, noDiscipline),
	CONSTRAINT fes1 FOREIGN KEY(noAthlete) REFERENCES ATHLETE(noAthlete) ON DELETE CASCADE,
	CONSTRAINT fes2 FOREIGN KEY(noDiscipline) REFERENCES DISCIPLINE(noDiscipline) ON DELETE CASCADE)type=InnoDB;

create table COMPETITION (
	noCompet int not null auto_increment,
	nomCompet char(30),
	dateCompet date,
	noClub int,
	PRIMARY KEY(noCompet),
	CONSTRAINT fc FOREIGN KEY(noClub) REFERENCES CLUB(noClub) ON DELETE CASCADE)type=InnoDB;

create table CLASSEMENT(
	noAthlete int,
	noCompet int,
	noDiscipline int,
	classement int,
	PRIMARY KEY(noAthlete, noCompet, noDiscipline),
	CONSTRAINT fcl1 FOREIGN KEY(noAthlete) REFERENCES ATHLETE(noAthlete) ON DELETE CASCADE,
	CONSTRAINT fcl2 FOREIGN KEY(noCompet) REFERENCES COMPETITION(noCompet) ON DELETE CASCADE,
	CONSTRAINT fcl3 FOREIGN KEY(noDiscipline) REFERENCES DISCIPLINE(noDiscipline) ON DELETE CASCADE)type=InnoDB;

