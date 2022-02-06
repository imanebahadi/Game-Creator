CREATE TABLE CARTE(
   nomC VARCHAR(50),
   description VARCHAR(50),
   dateC DATE,
   PRIMARY KEY(nomC)
)DEFAULT CHARSET=utf8;

CREATE TABLE PARAMETRE(
   nomP VARCHAR(50),
   valeur float(53),
   PRIMARY KEY (nomP)
)DEFAULT CHARSET=utf8;

CREATE TABLE CONTRIBUTRICES(
   nomCo VARCHAR(50),  
   prénomCo VARCHAR(50),
   dateInscription DATE,
   nomC varchar(50),
   PRIMARY KEY(nomCo),
   FOREIGN KEY(nomC) REFERENCES CARTE(nomC)
)DEFAULT CHARSET=utf8;

CREATE TABLE ZONE(
   idZ int,
   descriptionZ VARCHAR(50),
   dimension VARCHAR(50),
   environnement VARCHAR(50),
   nomC varchar(50),
   PRIMARY KEY(idZ),
   idM int,
   FOREIGN KEY(nomC) REFERENCES CARTE(nomC)
) DEFAULT CHARSET=utf8;

CREATE TABLE ELEMENT(
   nomE VARCHAR(50),
   cheminImage VARCHAR(50),
   PRIMARY KEY(nomE)
) DEFAULT CHARSET=utf8;

CREATE TABLE MOBILIER(
   idM int,
   nom varchar(50),
   deplaçable VARCHAR(50),
   difficulté VARCHAR(50),
   nbcases int,
   nomE VARCHAR(50),
   FOREIGN KEY(nomE) REFERENCES ELEMENT(nomE),
   PRIMARY KEY(idM)
) DEFAULT CHARSET=utf8;

CREATE TABLE PIEGE(
   idP int,
   nomP varchar(50), 
   catégorie VARCHAR(50),
   zoneEffet VARCHAR(50),
   difficulte VARCHAR(50),
   nomE varchar(50),
   FOREIGN KEY(nomE) REFERENCES ELEMENT(nomE),
   PRIMARY KEY(idP)
) DEFAULT CHARSET=utf8;

CREATE TABLE EQUIPEMENT(
   idE int,
   valeurMonétaire decimal,
   nomE varchar(50),
   FOREIGN KEY(nomE) REFERENCES ELEMENT(nomE),
   PRIMARY KEY(idE)
) DEFAULT CHARSET=utf8;

CREATE TABLE PNJ(
   nomP VARCHAR(50),
   catégorieP VARCHAR(50),
   pièces int,
   attaque int,
   vie int,
   métier VARCHAR(50),
   traitCaractère VARCHAR(50),
   phrase VARCHAR(50),
   PRIMARY KEY(nomP)
)DEFAULT CHARSET=utf8;

CREATE TABLE ENVIRONNEMENT(
   nomEnv VARCHAR(50),
   descriptionEnv VARCHAR(50),
   PRIMARY KEY(nomEnv)
)DEFAULT CHARSET=utf8;

CREATE TABLE CREATURE(
   idC int,
   nomC VARCHAR(50),
   catégorieP VARCHAR(50),
   pièces int,
   attaque int,
   vie int,
   climat VARCHAR(50),
   difficulté VARCHAR(50),
   nomEnv VARCHAR(50),
   
   PRIMARY KEY(nomC),
   FOREIGN KEY(nomEnv) REFERENCES ENVIRONNEMENT(nomEnv)
)DEFAULT CHARSET=utf8;



CREATE TABLE atteindreZone(
   nomC VARCHAR(50),
   idZ int,
   ObjectifRéaliser VARCHAR(10),
   FOREIGN KEY(nomC) REFERENCES CARTE(nomC),
   FOREIGN KEY(idZ) REFERENCES ZONE(idZ)
) DEFAULT CHARSET=utf8;

CREATE TABLE trouverEquipement(
   nomC VARCHAR(50),
   idE int,
   ObjectifRéaliser VARCHAR(10),
   FOREIGN KEY(nomC) REFERENCES CARTE(nomC),
   FOREIGN KEY(idE) REFERENCES EQUIPEMENT(idE)
) DEFAULT CHARSET=utf8;

CREATE TABLE modifier(
   valeurAvant VARCHAR(50),
   nomP VARCHAR(50),
   nomCo VARCHAR(50),
   FOREIGN KEY (nomCo) REFERENCES CONTRIBUTRICES(nomCo),
   FOREIGN KEY (nomP) REFERENCES PARAMETRE(nomP)
) DEFAULT CHARSET=utf8;

CREATE TABLE créer(
   nomC VARCHAR(50),
   nomCo VARCHAR(50),
   dateCreation DATE,
   type VARCHAR(50),
   PRIMARY KEY(nomC,nomCo)
) DEFAULT CHARSET=utf8;

CREATE TABLE setrouver(
   idZ int,
   nomE VARCHAR(50),
   positionZ VARCHAR(50),
   FOREIGN KEY (idZ) REFERENCES ZONE(idZ),
   FOREIGN KEY (nomE) REFERENCES ELEMENT(nomE)  
) DEFAULT CHARSET=utf8;

CREATE TABLE PassageSecret(
   idZ1 int,
   idZ2 int,
   idM int,
   FOREIGN KEY (idZ1) REFERENCES ZONE(idZ),
   FOREIGN KEY (idZ2) REFERENCES ZONE(idZ),
   FOREIGN KEY (idM) REFERENCES MOBILIER(idM)
) DEFAULT CHARSET=utf8;

CREATE TABLE Proche(
   idZ1 int,
   idZ2 int,
   directionSalleVoisine VARCHAR(10),
   FOREIGN KEY (idZ1) REFERENCES ZONE(idZ),
   FOREIGN KEY (idZ2) REFERENCES ZONE(idZ)
) DEFAULT CHARSET=utf8;
