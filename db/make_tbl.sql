DROP TABLE IF EXISTS make_tbl;

CREATE TABLE make_tbl 
( make_id         SERIAL
, make            VARCHAR(30) UNIQUE NOT NULL
, created_by      INTEGER REFERENCES user_tbl(user_id)
, creation_date   TIMESTAMPTZ NOT NULL
);

INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'Buick');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'Cadillac');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'Callaway');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'Chevrolet');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'Honda');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'Toyota');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'Chrysler');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'Detroit Electric');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'Dodge');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'E-Z-GO');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'Faraday');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'FCA');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'Fisker');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'Ford');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'Freightliner');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'GEM');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'GMC');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'Hennessey');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'International Harvester');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'Jeep');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'Karma');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'Kenworth');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'Lincoln');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'Local');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'Mack');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'Navistar');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'Oshkosh');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'Panoz');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'Peterbilt');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'Polaris');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'Ram');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'Rivian');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'Rossion');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'Saleen');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'SSC');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'Subaru');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'Tesla');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, current_date, 'Western Star');

SELECT * FROM make_tbl;