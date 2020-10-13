<?php
require_once 'konfiguration.inc.php';
require_once 'funktionen.inc.php';

$sql = 'SELECT f.*, g.titel AS genre_titel FROM filme f' .
    ' LEFT JOIN genres g ON f.genre_id = g.id' .
    ' ORDER BY f.titel ASC';
$statement =$db->query($sql);
$filme = $statement->fetchAll();
unset($statement);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PDO-Projekt</title>

</head>
<body>
    <header>
        <h1>Startseite</h1>
    </header>
    <section>
        <?php require 'hauptmenu.tpl.php'; ?>
    </section>
    <section>
        <?php foreach ($filme as $film): ?>
            <?php require 'eintrag.tpl.php'; ?>
        <?php endforeach; ?>
    </section>
</body>
</html>

