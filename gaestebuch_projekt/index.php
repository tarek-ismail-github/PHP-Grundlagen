<?php
require_once 'konfiguration.inc.php';
require_once 'funktionen.inc.php';

$sql = 'SELECT * FROM besucher';
$statement =$db->query($sql);
$besucher = $statement->fetchAll();
unset($statement);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gaestebuch-Projekt</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="stylout.css">

</head>
<body>
<header class="textcenter">
    <h1>Startseite</h1>
    <div class="textcenter mt10">
        <img src="img/index.png" alt="Beispiel" class="imglogo"><br>
    </div>
</header>
<section>
    <?php require 'hauptmenu.tpl.php'; ?>
</section>
<div class="formbreite divcenter">
    <h1>Zeige die Einträge im Gästebuch:  </h1>

    <form>  <?php foreach ($besucher as $besucherer): ?>
        <?php  require 'eintrag.php'?>
    <?php endforeach; ?></form>
</div>
</body>
</html>

