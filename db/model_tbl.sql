DROP TABLE IF EXISTS model_tbl;
DROP SEQUENCE IF EXISTS model_s1;

CREATE TABLE model_tbl 
( model_id        INTEGER NOT NULL
, model     VARCHAR(30) UNIQUE NOT NULL
, make_id   INTEGER NOT NULL
, PRIMARY KEY (model_id)
, FOREIGN KEY (make_id) REFERENCES make_tbl(make_id)
);

CREATE SEQUENCE model_s1 INCREMENT BY 1 START WITH 101;

INSERT INTO model_tbl
VALUES 
( NEXTVAL('model_s1')
, 'Outback'
, (SELECT make_id FROM make_tbl WHERE make = 'Subaru'));

INSERT INTO model_tbl
VALUES 
( NEXTVAL('model_s1')
, 'Crown Victoria'
, (SELECT make_id FROM make_tbl WHERE make = 'Ford'));

SELECT * FROM model_tbl;

/* Display models with make and order by make */
SELECT b.make, a.model 
FROM model_tbl as a
INNER JOIN make_tbl AS b ON (a.make_id = b.make_id)
ORDER BY make, model;