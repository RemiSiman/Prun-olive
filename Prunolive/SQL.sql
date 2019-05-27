Create table Categorie (
idcategorie integer auto_increment Primary key,
libelle varchar(50),
description varchar(100)
);

create table Produit (
idproduit integer auto_increment Primary key,
nom_produit varchar(50),
prix float,
description varchar(100),
idcatego integer,
Foreign key(idcatego) references Categorie(idcategorie)
);

create table Marche(
idmarche integer auto_increment Primary key,
libelle varchar(100)
);

create table Type_stand(
idtype integer auto_increment Primary key,
libelle varchar(50)
);

create table Situer(
idmarche int,
idtype int,
PRIMARY key(idmarche, idtype),
Foreign key (idmarche) references Marche(idmarche),
Foreign key (idtype) references Type_stand(idtype)
);

create table Vente(
idmarche int,
idproduit int,
PRIMARY key(idmarche, idproduit),
Foreign key (idmarche) references Marche(idmarche),
Foreign key (idproduit) references Produit(idproduit)
);



