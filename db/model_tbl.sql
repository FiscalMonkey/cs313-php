DROP TABLE IF EXISTS model_tbl;
DROP SEQUENCE IF EXISTS model_s1;

CREATE TABLE model_tbl 
( model_id        SERIAL
, model           VARCHAR(30) UNIQUE NOT NULL
, make_id         INTEGER REFERENCES make_tbl(make_id)
, created_by      INTEGER REFERENCES user_tbl(user_id)
, creation_date   TIMESTAMPTZ NOT NULL
);

INSERT INTO model_tbl (model, make_id, created_by, creation_date)
VALUES 
('Outback'
,(SELECT make_id FROM make_tbl WHERE make = 'Subaru')
, 1
, current_date);

INSERT INTO model_tbl (model, make_id)
VALUES 
('Crown Victoria'
,(SELECT make_id FROM make_tbl WHERE make = 'Ford')
, 1
, current_date);

SELECT * FROM model_tbl;

/* Display models with make and order by make */
SELECT b.make, a.model 
FROM model_tbl as a
INNER JOIN make_tbl AS b ON (a.make_id = b.make_id)
ORDER BY make, model;