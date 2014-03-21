Insert into Kayttaja (KayttajaNimi, Etunimi, Sukunimi, Salasana) 
values ('Testi1', 'Testaaja', 'Testinen', 'salasana');

insert into Luokka (LuokkaNimi, LuokkaKuvaus) 
values ('duuni', 'duunin tekoa');

insert into Askare (Askareid, Askarenimi, KayttajaNimi, LuokkaNimi)
values (131,'tekeminen','Testi1','duuni');
