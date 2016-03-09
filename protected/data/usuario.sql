-- Table: usuario

-- DROP TABLE usuario;

CREATE TABLE usuario
(
  id serial NOT NULL,
  avatar character varying(50),
  CONSTRAINT usuario_pkey PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE usuario
  OWNER TO postgres;
