<?php
$optionen = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // nur zur Entwicklung!
 PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
 ];

$db = new PDO(
    'mysql:host=localhost;dbname=unicode_test', // neue DB!
 'root',
 '',
$optionen
);

$db->query('SET NAMES utf8');
/*$db->query('DROP TABLE IF EXISTS genres');
 $db->query('DROP TABLE IF EXISTS filme');

$db->query(
     'CREATE TABLE genres (
 id INTEGER PRIMARY KEY AUTO_INCREMENT,
 titel VARCHAR(255) UNIQUE KEY
 ) DEFAULT CHARSET = utf8'
 );

 $db->query(
     'CREATE TABLE filme (
 id INTEGER PRIMARY KEY AUTO_INCREMENT,
 titel VARCHAR(255),
 veroeffentlichung DATE,
 dauer INT(5),
 genre_id INTEGER
 ) DEFAULT CHARSET = utf8'
 );
$db->query('INSERT INTO genres (titel) VALUES
 ("Action"),
 ("Drama"),
 ("Komödie")
 '
 );
$db->query('INSERT INTO genres (titel) VALUES ("Sci-Fi")');
$id = $db->lastInsertId();
$db->query(
     'INSERT INTO filme (titel, veroeffentlichung, dauer, genre_id) VALUES
 ("Dune", "1984-12-14", 137, ' . $id . '),
 ("Total Recall", "1990-07-26", 113, ' . $id . ')
 '
);*/