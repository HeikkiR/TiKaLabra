CREATE TABLE Kayttaja (KayttajaNimi VARCHAR PRIMARY KEY,
Etunimi VARCHAR(32) NOT NULL,
Sukunimi VARCHAR(64) NOT NULL,
Salasana VARCHAR NOT NULL,
Sysop BOOLEAN DEFAULT 'FALSE'
);
CREATE TABLE Luokka (
LuokkaNimi VARCHAR(64) NOT NULL PRIMARY KEY,
yliluokka VARCHAR(64)  references Luokka(LuokkaNimi),
LuokkaKuvaus TEXT
);


CREATE TABLE  Askare (
Askareid INTEGER NOT NULL PRIMARY KEY
Askerenimi VARCHAR(64) NOT NULL,
KayttajaNimi VARCHAR NOT NULL references Kayttaja(KayttajaNimi),
AskareKuvaus TEXT,
LuokkaNimi VARCHAR(64) references Luokka(LuokkaNimi)
);


