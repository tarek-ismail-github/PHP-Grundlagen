<!DOCTYPE HTML>
<html lang="en">
<?php
session_start();
require_once 'konfiguration.inc.php';
require_once 'funktionen.inc.php';

$sql = 'SELECT * FROM zitate ORDER BY rand() LIMIT 1';
$statement = $db->query($sql);
$zitate = $statement->fetchAll();
unset($statement);

$log = [];
$log['ip'] = $_SERVER['REMOTE_ADDR'];
$log1 = $_SERVER['HTTP_USER_AGENT'];
$log['browser'] = explode(' ', explode('(', $log1)[1])[0];;

$log1 = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
$log['sprache'] = explode(',', $log1)[1];
$log['zitat_id'] = $zitate[0]['id'];


if (!empty($log)) {
    $sql = 'INSERT INTO log(zitat_id,ip,browser,sprache)' .
        'VALUES (:zitat_id,:ip,:browser,:sprache)';
    $statement = $db->prepare($sql);
    $statement->execute($log);
}

?>

<head>
    <meta charset="UTF-8">
    <title>Zitate-Projekt</title>
</head>
<body>
<header class="textcenter">

    <div class="textcenter mt10">
        <img src="twitter-circle-icon-png-13.png" alt="Beispiel" class="imglogo"><br>
    </div>
    <h1>Startseite</h1>


</header>
<section>
    <?php require 'hauptmenu.tpl.php'; ?>
</section>
<br><br>
<aside class="formbreite divcenter">

    <br><br>
    <div>
        <h1 style="color: #0c56ea;" class="textcenter">Zeige die Zitaten: </h1>

        <?php foreach ($zitate as $zitat): ?>
            <?php require 'eintrag.php' ?>
        <?php endforeach; ?>
    </div>

</aside>
</body>
</html>

