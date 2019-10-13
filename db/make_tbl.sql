DROP TABLE IF EXISTS make_tbl;
DROP SEQUENCE IF EXISTS make_s1;

CREATE TABLE make_tbl 
( make_id        INTEGER NOT NULL
, make      VARCHAR(30) UNIQUE NOT NULL
, PRIMARY KEY (make_id)
);

CREATE SEQUENCE make_s1 INCREMENT BY 1 START WITH 1;

INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'Buick');
INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'Cadillac');
INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'Callaway');
INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'Chevrolet');
INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'Honda');
INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'Toyota');
INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'Subaru');
INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'Chrysler');
INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'Detroit Electric');
INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'Dodge');
INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'E-Z-GO');
INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'Faraday');
INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'FCA');
INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'Fisker');
INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'Ford');
INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'Freightliner');
INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'GEM');
INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'GMC');
INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'Hennessey');
INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'International Harvester');
INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'Jeep');
INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'Karma');
INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'Kenworth');
INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'Lincoln');
INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'Local');
INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'Mack');
INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'Navistar');
INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'Oshkosh');
INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'Panoz');
INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'Peterbilt');
INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'Polaris');
INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'Ram');
INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'Rivian');
INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'Rossion');
INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'Saleen');
INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'SSC');
INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'Tesla');
INSERT INTO make_tbl VALUES ( NEXTVAL('make_s1'), 'Western Star');

SELECT * FROM make_tbl;