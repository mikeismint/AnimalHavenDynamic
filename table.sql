CREATE TABLE IF NOT EXISTS (
  id        int unsigned NOT NULL auto_increment,
  name      varchar(255) NOT NULL,
  type      smallint NOT NULL,
  age       smallint NOT NULL,
  breed     varchar(32) NOT NULL,
  sex       varchar(8) NOT NULL,
  about     text NOT NULL,
  status    varchar 
