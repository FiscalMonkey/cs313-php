DROP TABLE IF EXISTS make_tbl;

CREATE TABLE make_tbl 
( make_id         SERIAL UNIQUE
, make            VARCHAR(30) UNIQUE NOT NULL
, created_by      INTEGER NOT NULL REFERENCES user_tbl(user_id)
, creation_date   TIMESTAMPTZ NOT NULL
);

INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'Buick');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'Cadillac');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'Callaway');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'Chevrolet');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'Honda');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'Toyota');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'Chrysler');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'Detroit Electric');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'Dodge');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'E-Z-GO');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'Faraday');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'FCA');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'Fisker');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'Ford');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'Freightliner');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'GEM');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'GMC');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'Hennessey');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'International Harvester');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'Jeep');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'Karma');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'Kenworth');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'Lincoln');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'Local');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'Mack');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'Navistar');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'Oshkosh');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'Panoz');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'Peterbilt');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'Polaris');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'Ram');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'Rivian');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'Rossion');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'Saleen');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'SSC');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'Subaru');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'Tesla');
INSERT INTO make_tbl(created_by, creation_date, make) VALUES (1, CURRENT_TIMESTAMP, 'Western Star');

SELECT * FROM make_tbl;