CREATE TABLE grade1_tbl 
( grade1_id  SERIAL
, grade1     VARCHAR(3) UNIQUE NOT NULL
, PRIMARY KEY (grade1_id)
);

INSERT INTO grade1_tbl(grade1) VALUES ('0W');
INSERT INTO grade1_tbl(grade1) VALUES ('5W');
INSERT INTO grade1_tbl(grade1) VALUES ('10W');
INSERT INTO grade1_tbl(grade1) VALUES ('15W');
INSERT INTO grade1_tbl(grade1) VALUES ('20W');
INSERT INTO grade1_tbl(grade1) VALUES ('25W');

SELECT * FROM grade1_tbl;

CREATE TABLE grade2_tbl 
( grade2_id  SERIAL
, grade2     VARCHAR(2) UNIQUE NOT NULL
, PRIMARY KEY (grade2_id)
);

INSERT INTO grade2_tbl(grade2) VALUES ('8');
INSERT INTO grade2_tbl(grade2) VALUES ('12');
INSERT INTO grade2_tbl(grade2) VALUES ('16');
INSERT INTO grade2_tbl(grade2) VALUES ('20');
INSERT INTO grade2_tbl(grade2) VALUES ('30');
INSERT INTO grade2_tbl(grade2) VALUES ('40');
INSERT INTO grade2_tbl(grade2) VALUES ('50');
INSERT INTO grade2_tbl(grade2) VALUES ('60');

SELECT * FROM grade2_tbl;