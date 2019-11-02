CREATE TABLE user_tbl
( user_id         SERIAL PRIMARY KEY UNIQUE
, username        VARCHAR(20) UNIQUE CONSTRAINT nn_user_1 NOT NULL
, pswrd           VARCHAR(64) CONSTRAINT nn_user_2 NOT NULL
, creation_date   TIMESTAMPTZ NOT NULL
);