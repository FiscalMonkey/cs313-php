CREATE TABLE user_tbl
( user_id   SERIAL
, username  VARCHAR(20) CONSTRAINT nn_user_1 NOT NULL
, pswrd     VARCHAR(64) CONSTRAINT nn_user_2 NOT NULL
);

INSERT INTO user_tbl (username, pswrd)
VALUES
( 'Mimir'
, 'odinSUCKS');