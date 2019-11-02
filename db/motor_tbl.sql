DROP TABLE IF EXISTS motor_tbl;
DROP SEQUENCE IF EXISTS motor_s1;

CREATE TABLE motor_tbl 
( motor_id        SERIAL
, motor           VARCHAR(30) NOT NULL
, year            INTEGER NOT NULL
, model_id        INTEGER REFERENCES model_tbl(model_id)
, make_id         INTEGER REFERENCES make_tbl(make_id)
, grade1_id       INTEGER REFERENCES grade1_tbl(grade1_id)
, grade2_id       INTEGER REFERENCES grade2_tbl(grade2_id)
, oil_cap         NUMERIC NOT NULL
, created_by      INTEGER REFERENCES user_tbl(user_id)
, creation_date   TIMESTAMPTZ NOT NULL
, last_updated_by  INTEGER REFERENCES user_tbl(user_id)
, last_update_date TIMESTAMPTZ NOT NULL
);

CREATE UNIQUE INDEX motor_i1 ON motor_tbl (motor, year, make_id, model_id, grade1_id, grade2_id);

INSERT INTO motor_tbl(motor, year, model_id, make_id, grade1_id, grade2_id, oil_cap)
VALUES 
('i 4-Cyl 2.5'
, 2005
,(SELECT model_id FROM model_tbl WHERE model = 'Outback')
,(SELECT make_id FROM make_tbl WHERE make = 'Subaru')
,(SELECT grade1_id FROM grade1_tbl WHERE grade1 = '5W')
,(SELECT grade2_id FROM grade2_tbl WHERE grade2 = '30')
, 4.4
, 1
, current_date
, 1
, current_date);

INSERT INTO motor_tbl(motor, year, model_id, make_id, grade1_id, grade2_id, oil_cap)
VALUES 
('Police Interceptor 8-Cyl 4.6'
, 2008
,(SELECT model_id FROM model_tbl WHERE model = 'Crown Victoria')
,(SELECT make_id FROM make_tbl WHERE make = 'Ford')
,(SELECT grade1_id FROM grade1_tbl WHERE grade1 = '5W')
,(SELECT grade2_id FROM grade2_tbl WHERE grade2 = '20')
, 6
, 1
, current_date
, 1
, current_date);

SELECT * FROM motor_tbl;

/* Correctly display motor information with make, model, and oil */
SELECT mt.year, mk.make, md.model, mt.motor, g1.grade1, g2.grade2, mt.oil_cap 
FROM motor_tbl as mt
INNER JOIN make_tbl AS mk ON (mt.make_id = mk.make_id)
INNER JOIN model_tbl AS md ON (mt.model_id = md.model_id)
INNER JOIN grade1_tbl AS g1 ON (mt.grade1_id = g1.grade1_id)
INNER JOIN grade2_tbl AS g2 ON (mt.grade2_id = g2.grade2_id)
ORDER BY make, year;