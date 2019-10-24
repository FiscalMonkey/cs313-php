DROP TABLE IF EXISTS motor_tbl;
DROP SEQUENCE IF EXISTS motor_s1;

CREATE TABLE motor_tbl 
( motor_id        INTEGER NOT NULL
, motor     VARCHAR(30) NOT NULL
, year      INTEGER NOT NULL
, model_id  INTEGER NOT NULL
, make_id   INTEGER NOT NULL
, grade1_id    INTEGER NOT NULL
, grade2_id    INTEGER NOT NULL
, oil_cap   NUMERIC NOT NULL
, PRIMARY KEY (motor_id)
, FOREIGN KEY (model_id) REFERENCES model_tbl(model_id)
, FOREIGN KEY (make_id) REFERENCES make_tbl(make_id)
, FOREIGN KEY (grade1_id) REFERENCES grade1_tbl(grade1_id)
, FOREIGN KEY (grade2_id) REFERENCES grade2_tbl(grade2_id)
);

CREATE SEQUENCE motor_s1 INCREMENT BY 1 START WITH 1001;

INSERT INTO motor_tbl
VALUES 
( NEXTVAL('motor_s1')
, 'i 4-Cyl 2.5'
, 2005
, (SELECT model_id FROM model_tbl WHERE model = 'Outback')
, (SELECT make_id FROM make_tbl WHERE make = 'Subaru')
, (SELECT grade1_id FROM grade1_tbl WHERE grade1 = '5W')
, (SELECT grade2_id FROM grade2_tbl WHERE grade2 = '30')
, 4.4);

INSERT INTO motor_tbl
VALUES 
( NEXTVAL('motor_s1')
, 'Police Interceptor 8-Cyl 4.6'
, 2008
, (SELECT model_id FROM model_tbl WHERE model = 'Crown Victoria')
, (SELECT make_id FROM make_tbl WHERE make = 'Ford')
, (SELECT grade1_id FROM grade1_tbl WHERE grade1 = '5W')
, (SELECT grade2_id FROM grade2_tbl WHERE grade2 = '20')
, 6);

SELECT * FROM motor_tbl;

/* Correctly display motor information with make, model, and oil */
SELECT mt.year, mk.make, md.model, mt.motor, g1.grade1, g2.grade2, mt.oil_cap 
FROM motor_tbl as mt
INNER JOIN make_tbl AS mk ON (mt.make_id = mk.make_id)
INNER JOIN model_tbl AS md ON (mt.model_id = md.model_id)
INNER JOIN grade1_tbl AS g1 ON (mt.grade1_id = g1.grade1_id)
INNER JOIN grade2_tbl AS g2 ON (mt.grade2_id = g2.grade2_id)
ORDER BY make, year;