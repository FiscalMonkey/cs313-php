DROP TABLE IF EXISTS model_tbl;
DROP SEQUENCE IF EXISTS model_s1;

CREATE TABLE model_tbl 
( model_id  SERIAL PRIMARY KEY
, model     VARCHAR(30) UNIQUE NOT NULL
, make_id   INTEGER REFERENCES make_tbl(make_id)
);

INSERT INTO model_tbl (model, make_id)
VALUES 
('Outback'
,(SELECT make_id FROM make_tbl WHERE make = 'Subaru'));

INSERT INTO model_tbl (model, make_id)
VALUES 
('Crown Victoria'
,(SELECT make_id FROM make_tbl WHERE make = 'Ford'));

SELECT * FROM model_tbl;

/* Display models with make and order by make */
SELECT b.make, a.model 
FROM model_tbl as a
INNER JOIN make_tbl AS b ON (a.make_id = b.make_id)
ORDER BY make, model;