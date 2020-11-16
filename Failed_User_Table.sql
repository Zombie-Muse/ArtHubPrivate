CREATE TABLE fail (
  userID            VARCHAR(100)  NOT NULL PRIMARY KEY,
  count     INT                   DEFAULT NULL,
  lastTime  TIME
);