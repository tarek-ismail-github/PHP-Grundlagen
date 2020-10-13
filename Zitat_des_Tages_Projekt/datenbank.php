<?php
$optionen = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // nur zur Entwicklung!
 PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
 ];

$db = new PDO(
    'mysql:host=localhost;dbname=zitat_des_tages_projekt', // neue DB!
 'root',
 '',
$optionen
);

/*$db->query('SET NAMES utf8');
$db->query('DROP TABLE IF EXISTS genres');
 $db->query('DROP TABLE IF EXISTS filme');

$db->query(
     'CREATE TABLE genres (
 id INTEGER PRIMARY KEY AUTO_INCREMENT,
 titel VARCHAR(255) UNIQUE KEY
 ) DEFAULT CHARSET = utf8'
 );

 $db->query(
     'CREATE TABLE log (
     id INTEGER PRIMARY KEY AUTO_INCREMENT,
     zitat_id INTEGER,
     ip VARCHAR(32),
     browser VARCHAR(255),
     sprache VARCHAR(5),
     erstellt_am DATETIME,
     FOREIGN KEY (zitat_id) REFERENCES zitate(id)

 ) DEFAULT CHARSET = utf8'
 );*/
/*$db->query('INSERT INTO genres (titel) VALUES
 ("Action"),
 ("Drama"),
 ("Komödie")
 '
 );
$db->query('INSERT INTO genres (titel) VALUES ("Sci-Fi")');
$id = $db->lastInsertId();
$db->query(
     'INSERT INTO zitate (autor, inhalt) VALUES
 ("Galtung 1975, zit. n. Tillmann 1999, S. 8f.", "Gewalt liegt dann vor, wenn Menschen so beeinflußtwerden, daß ihre aktuelle somatische und geistige Verwirklichung geringer ist als ihre potentielle Verwirklichung")'
);*/