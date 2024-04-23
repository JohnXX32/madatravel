--on database madatravel

create table admins(
    id  serial primary key,
    email   varchar(50),
    password varchar(50)
);

--insert into admins(email,password) values('stevenmahery@gmail.com','2444666666');

create table users(
    id  serial primary key,
    email   varchar(50),
    password varchar(50)
);

--insert into users(email,mdp) values('user@gmail.com','12345678');

create TABLE activites(
    id serial primary key,
    categorie   varchar(50),
    image varchar(100)
);

--insert into activites(categorie,image) values('Bar','bar.jpg'),('Hotel','hotel.jpg'),('Restaurant','restaurant.jpg');

CREATE TABLE regions(
    id  serial primary key,
    nom_region varchar(50),
    image varchar(100)
);

--insert into regions(nom_region) values('DIANA'),('SAVA');

CREATE TABLE ville(
    id serial primary key,
    nom_ville varchar(50),
    regions  int references regions(id),
    image varchar(100)
);

--insert into ville(nom_ville,region) values('Nosy-Be',1);

CREATE TABLE activite_detail(
    id  serial primary key,
    id_activite int references activites(id),
    nom varchar(50),
    id_ville int references ville(id),
    prix    float
);

--insert into activite_detail(id_activite,nom,id_ville,prix) values(2,'HAVRE',1,60000);
ALTER TABLE activite_detail ADD CONSTRAINT chk_activedetail CHECK (prix>=0);

CREATE table reservation(
    id serial primary key,
    id_user int references users(id),
    id_activite_detail  int references activite_detail(id),
    date_debut  timestamp,
    date_fin timestamp
);

--insert into reservation(id_user,id_activite_detail,date_debut,date_fin) values(1,1,'2023-12-25 08:00:00','2023-12-27 08:00:00');

create table produit(
    id serial primary key,
    nom varchar(50),
    prix float,
    image varchar(100)
);

--insert into produit(nom,prix) values('vélo',20000);

CREATE TABLE stock_produit(
    id  serial primary key,
    id_produit int references produit(id),
    quantite    int
);

--insert into stock_produit(id_produit,quantite) values(1,3);

CREATE TABLE locations(
    id serial primary key,
    id_user int references users(id),
    id_produit int references produit(id),
    quantite int,
    date_debut timestamp,
    date_fin timestamp
);

--insert into locations(id_user,id_produit,quantite,date_debut,date_fin) values(1,1,1,'2023-12-25 08:00:00','2023-12-25 17:00:00');

                                --REQUETE POUR AVOIR LES DETAIL D'ACTIVITE AU COMPLET

CREATE or replace VIEW view_activite_detail AS
select 
    activites.categorie, 
    activite_detail.nom, 
    ville.nom_ville,
    regions.nom_region,
    activite_detail.prix
FROM
    activite_detail
JOIN
    activites on activite_detail.id_activite = activites.id
JOIN
    ville on ville.id = activite_detail.id_ville
JOIN
    regions on regions.id = ville.regions;


                                --REQUETE POUR VOIR RESERVATION D'ACTIVITE

SELECT 
    users.email,
    activites.categorie, 
    nom as activite_nom, 
    ville.nom_ville,
    regions.nom_region,
    prix,
    reservations.date_debut,
    reservations.date_fin,
    EXTRACT(DAY FROM reservations.date_fin - reservations.date_debut) as difference_jours,
    CASE
        WHEN (prix * (EXTRACT(DAY FROM reservations.date_fin - reservations.date_debut))) <= 1 
            THEN prix
        ELSE (prix * (EXTRACT(DAY FROM reservations.date_fin - reservations.date_debut))) 
    END as prix_total
FROM
    activite_details
JOIN
    activites ON activite_details.id_activite = activites.id
JOIN
    ville ON ville.id = activite_details.id_ville
JOIN
    regions ON regions.id = ville.region
JOIN
    reservations ON reservations.id_activite_detail = activite_details.id
JOIN
    users ON reservations.id_user = users.id;


                                --REQUETE POUR VOIR LOCATION PRODUIT

SELECT
    users.email,
    produits.nom,
    location.quantite,
    produits.prix,
    date_debut,
    date_fin,
    stock_produits.quantite as quantite_stock,
    (produits.prix * location.quantite) as prix_total
    
FROM
    location
JOIN
    users on users.id = location.id_user
JOIN
    produits on produits.id = location.id_produit
JOIN
    stock_produits on stock_produits.id_produit = location.id_produit;