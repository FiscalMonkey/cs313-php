CREATE TABLE grade1_tbl 
( grade1_id       SERIAL UNIQUE
, grade1          VARCHAR(3) UNIQUE NOT NULL
, created_by      INTEGER REFERENCES user_tbl(user_id)
, creation_date   TIMESTAMPTZ NOT NULL
);

INSERT INTO grade1_tbl(grade1, created_by, creation_date) VALUES ('0W',  1, CURRENT_TIMESTAMP);
INSERT INTO grade1_tbl(grade1, created_by, creation_date) VALUES ('5W',  1, CURRENT_TIMESTAMP);
INSERT INTO grade1_tbl(grade1, created_by, creation_date) VALUES ('10W', 1, CURRENT_TIMESTAMP);
INSERT INTO grade1_tbl(grade1, created_by, creation_date) VALUES ('15W', 1, CURRENT_TIMESTAMP);
INSERT INTO grade1_tbl(grade1, created_by, creation_date) VALUES ('20W', 1, CURRENT_TIMESTAMP);
INSERT INTO grade1_tbl(grade1, created_by, creation_date) VALUES ('25W', 1, CURRENT_TIMESTAMP);

SELECT * FROM grade1_tbl;

CREATE TABLE grade2_tbl 
( grade2_id       SERIAL UNIQUE
, grade2          VARCHAR(2) UNIQUE NOT NULL
, created_by      INTEGER REFERENCES user_tbl(user_id)
, creation_date   TIMESTAMPTZ NOT NULL
);

INSERT INTO grade2_tbl(grade2, created_by, creation_date) VALUES ('8',  1, CURRENT_TIMESTAMP);
INSERT INTO grade2_tbl(grade2, created_by, creation_date) VALUES ('12', 1, CURRENT_TIMESTAMP);
INSERT INTO grade2_tbl(grade2, created_by, creation_date) VALUES ('16', 1, CURRENT_TIMESTAMP);
INSERT INTO grade2_tbl(grade2, created_by, creation_date) VALUES ('20', 1, CURRENT_TIMESTAMP);
INSERT INTO grade2_tbl(grade2, created_by, creation_date) VALUES ('30', 1, CURRENT_TIMESTAMP);
INSERT INTO grade2_tbl(grade2, created_by, creation_date) VALUES ('40', 1, CURRENT_TIMESTAMP);
INSERT INTO grade2_tbl(grade2, created_by, creation_date) VALUES ('50', 1, CURRENT_TIMESTAMP);
INSERT INTO grade2_tbl(grade2, created_by, creation_date) VALUES ('60', 1, CURRENT_TIMESTAMP);

SELECT * FROM grade2_tbl;