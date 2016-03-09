-- Database: db_maps

-- DROP DATABASE db_maps;

CREATE TABLE reg
(
  id serial NOT NULL,
  lat character varying(50) NOT NULL,
  "long" character varying(50) NOT NULL,
  pos character varying(256) NOT NULL,
  CONSTRAINT reg_pkey PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE reg
  OWNER TO postgres;