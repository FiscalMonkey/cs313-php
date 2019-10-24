DROP TABLE IF EXISTS make_tbl;
DROP SEQUENCE IF EXISTS make_s1;

CREATE TABLE make_tbl 
( make_id        SERIAL
, make      VARCHAR(30) UNIQUE NOT NULL
, PRIMARY KEY (make_id)
);

INSERT INTO make_tbl(make) VALUES ('Buick');
INSERT INTO make_tbl(make) VALUES ('Cadillac');
INSERT INTO make_tbl(make) VALUES ('Callaway');
INSERT INTO make_tbl(make) VALUES ('Chevrolet');
INSERT INTO make_tbl(make) VALUES ('Honda');
INSERT INTO make_tbl(make) VALUES ('Toyota');
INSERT INTO make_tbl(make) VALUES ('Chrysler');
INSERT INTO make_tbl(make) VALUES ('Detroit Electric');
INSERT INTO make_tbl(make) VALUES ('Dodge');
INSERT INTO make_tbl(make) VALUES ('E-Z-GO');
INSERT INTO make_tbl(make) VALUES ('Faraday');
INSERT INTO make_tbl(make) VALUES ('FCA');
INSERT INTO make_tbl(make) VALUES ('Fisker');
INSERT INTO make_tbl(make) VALUES ('Ford');
INSERT INTO make_tbl(make) VALUES ('Freightliner');
INSERT INTO make_tbl(make) VALUES ('GEM');
INSERT INTO make_tbl(make) VALUES ('GMC');
INSERT INTO make_tbl(make) VALUES ('Hennessey');
INSERT INTO make_tbl(make) VALUES ('International Harvester');
INSERT INTO make_tbl(make) VALUES ('Jeep');
INSERT INTO make_tbl(make) VALUES ('Karma');
INSERT INTO make_tbl(make) VALUES ('Kenworth');
INSERT INTO make_tbl(make) VALUES ('Lincoln');
INSERT INTO make_tbl(make) VALUES ('Local');
INSERT INTO make_tbl(make) VALUES ('Mack');
INSERT INTO make_tbl(make) VALUES ('Navistar');
INSERT INTO make_tbl(make) VALUES ('Oshkosh');
INSERT INTO make_tbl(make) VALUES ('Panoz');
INSERT INTO make_tbl(make) VALUES ('Peterbilt');
INSERT INTO make_tbl(make) VALUES ('Polaris');
INSERT INTO make_tbl(make) VALUES ('Ram');
INSERT INTO make_tbl(make) VALUES ('Rivian');
INSERT INTO make_tbl(make) VALUES ('Rossion');
INSERT INTO make_tbl(make) VALUES ('Saleen');
INSERT INTO make_tbl(make) VALUES ('SSC');
INSERT INTO make_tbl(make) VALUES ('Subaru');
INSERT INTO make_tbl(make) VALUES ('Tesla');
INSERT INTO make_tbl(make) VALUES ('Western Star');

SELECT * FROM make_tbl;