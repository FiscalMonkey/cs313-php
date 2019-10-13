DROP TABLE IF EXISTS motor_tbl;
DROP SEQUENCE IF EXISTS motor_s1;

CREATE TABLE motor_tbl 
( motor_id        INTEGER NOT NULL
, motor     VARCHAR(30) NOT NULL
, year      INTEGER NOT NULL
, model_id  INTEGER NOT NULL
, make_id   INTEGER NOT NULL
, oil_id    INTEGER NOT NULL
, oil_cap   NUMERIC NOT NULL
, PRIMARY KEY (motor_id)
, FOREIGN KEY (model_id) REFERENCES model_tbl(model_id)
, FOREIGN KEY (make_id) REFERENCES make_tbl(make_id)
, FOREIGN KEY (oil_id) REFERENCES oil_tbl(oil_id)
);

CREATE SEQUENCE motor_s1 INCREMENT BY 1 START WITH 1001;

INSERT INTO motor_tbl
VALUES 
( NEXTVAL('motor_s1')
, 'i 4-Cyl 2.5'
, 2005
, (SELECT model_id FROM model_tbl WHERE model = 'Outback')
, (SELECT make_id FROM make_tbl WHERE make = 'Subaru')
, (SELECT oil_id FROM oil_tbl WHERE oil = '5W-30')
, 4.4);

INSERT INTO motor_tbl
VALUES 
( NEXTVAL('motor_s1')
, 'Police Interceptor 8-Cyl 4.6'
, 2008
, (SELECT model_id FROM model_tbl WHERE model = 'Crown Victoria')
, (SELECT make_id FROM make_tbl WHERE make = 'Ford')
, (SELECT oil_id FROM oil_tbl WHERE oil = '5W-20')
, 6);

SELECT * FROM motor_tbl;