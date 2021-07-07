CREATE SEQUENCE clients_id_seq;
CREATE TABLE clients (
  id int DEFAULT nextval('clients_id_seq'),
  name varchar(255),
  token varchar(100) NOT NULL DEFAULT md5(random()::text),
  data jsonb,
  inserted_at timestamp DEFAULT NOW(),
  updated_at timestamp DEFAULT NOW(),
  PRIMARY KEY (id),
  UNIQUE (token)
);

INSERT INTO schema_migrations (migration, migrated_at)
VALUES ('20200322173700-create-clients.sql', NOW()::timestamp);
