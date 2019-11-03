DROP TABLE IF EXISTS motor_tbl;

CREATE TABLE motor_tbl 
( motor_id        SERIAL UNIQUE
, motor           VARCHAR(30) NOT NULL
, year            INTEGER NOT NULL
, model_id        INTEGER NOT NULL REFERENCES model_tbl(model_id)
, make_id         INTEGER NOT NULL REFERENCES make_tbl(make_id)
, grade1_id       INTEGER NOT NULL REFERENCES grade1_tbl(grade1_id)
, grade2_id       INTEGER NOT NULL REFERENCES grade2_tbl(grade2_id)
, oil_cap         NUMERIC NOT NULL
, created_by      INTEGER NOT NULL REFERENCES user_tbl(user_id)
, creation_date   TIMESTAMPTZ NOT NULL
, last_updated_by  INTEGER NOT NULL REFERENCES user_tbl(user_id)
, last_update_date TIMESTAMPTZ NOT NULL
);

CREATE UNIQUE INDEX motor_i1 ON motor_tbl (motor, year, make_id, model_id, grade1_id, grade2_id);

INSERT INTO motor_tbl
VALUES 
( DEFAULT
,'i 4-Cyl 2.5'
, 2005
,(SELECT model_id FROM model_tbl WHERE model = 'Outback')
,(SELECT make_id FROM make_tbl WHERE make = 'Subaru')
,(SELECT grade1_id FROM grade1_tbl WHERE grade1 = '5W')
,(SELECT grade2_id FROM grade2_tbl WHERE grade2 = '30')
, 4.4
, 1
, CURRENT_TIMESTAMP
, 1
, CURRENT_TIMESTAMP);

INSERT INTO motor_tbl
VALUES 
( DEFAULT
,'Police Interceptor 8-Cyl 4.6'
, 2008
,(SELECT model_id FROM model_tbl WHERE model = 'Crown Victoria')
,(SELECT make_id FROM make_tbl WHERE make = 'Ford')
,(SELECT grade1_id FROM grade1_tbl WHERE grade1 = '5W')
,(SELECT grade2_id FROM grade2_tbl WHERE grade2 = '20')
, 6
, 1
, CURRENT_TIMESTAMP
, 1
, CURRENT_TIMESTAMP);

SELECT * FROM motor_tbl;

/* Correctly display motor information with make, model, and oil */
SELECT mt.year, mk.make, md.model, mt.motor, g1.grade1, g2.grade2, mt.oil_cap 
FROM motor_tbl as mt
INNER JOIN make_tbl AS mk ON (mt.make_id = mk.make_id)
INNER JOIN model_tbl AS md ON (mt.model_id = md.model_id)
INNER JOIN grade1_tbl AS g1 ON (mt.grade1_id = g1.grade1_id)
INNER JOIN grade2_tbl AS g2 ON (mt.grade2_id = g2.grade2_id)
ORDER BY make, year;