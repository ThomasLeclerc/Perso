drop table if exists ABONNE;

create table ABONNE (
	num int not null auto_increment,
	login varchar(30),
	mdp varchar(15),
	prenom varchar(25),
	nom varchar(25),
	date_naissance date,
	taille float,
	poids float,
	taux_graisse float,
	tour_epaules float,
	tour_taille float,
	tour_biceps float,
	photo char(50),
	PRIMARY KEY(num));

insert into ABONNE values(null, 'tleclerc', '2525', 'Thomas', 'LECLERC', '1992-02-22', 1.72, 75, 10, 27, 60, 25, './img/photo1.jpg');
insert into ABONNE values(null, 'cpertacc', '2929', 'Charlélie', 'PERTRACCA', '1992-01-01', 1.92, 90, 15, 35, 80, 35, './img/photo3.jpg');
insert into ABONNE values(null,'amiller','6969','Anthony','MILLER','1992-05-19',1.72,20,120,30,80,45,'./img/photo2.jpg');	
