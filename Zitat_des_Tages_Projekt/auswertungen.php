<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Auswertungren</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        .fehler {
            color: red;
        }

        label {
            display: block;
        }
    </style>
</head>
<body>
<?php //var_dump($_SESSION); ?>
<header class="textcenter">
    <div class="textcenter mt10">
        <img src="twitter-circle-icon-png-13.png" alt="Beispiel" class="imglogo"><br>
    </div>
    <h1>Auswertungen</h1>

</header>
<section>
    <?php require 'hauptmenu.tpl.php'; ?>
</section>
<br><br>

<?php

if (isset($_SESSION['login']) && $_SESSION['login'] == 'ok' && isset($_GET['a']) && $_GET['a'] == 1) {

require_once 'konfiguration.inc.php';
require_once 'funktionen.inc.php';

$sql = 'SELECT *, DATE(erstellt_am) FROM log GROUP BY DATE(erstellt_am)';
$statement = $db->query($sql);
$logs = $statement->fetchAll();
/*$sql1 = 'SELECT * FROM log ';
$statement1 =$db->query($sql1);
$logs= $statement1->fetchAll();*/
unset($statement);

?>
<?php
echo '<h1 class="textcenter">Hallo ' . $_SESSION['name'] . '</h1>';

?>
<aside class="formbreite divcenter">

    <br><br>
    <div class="textcenter">
        <h1 style="color: #0c56ea;">die Datums: </h1>

        <?php foreach ($logs as $l): ?>
            #<a href="details.php?erstellt_am=<?= explode(' ', $l['erstellt_am'])[0] ?>"> Eintrag vom

                <?=
                formatiereDatum(($l['erstellt_am']));
                ?>
            </a><br><br>
        <?php endforeach; ?>
    </div>

    <?php
    } else {
        if (isset($_GET['a']) && $_GET['a'] == 2) {
            echo "<p class='fehler'>Login-Daten nicht korrekt</p>";
        }
        ?>

        <div class="formbreite divcenter">
            <form method="post" action="config.php">
                <p>
                    <label>Ihr Name: </label>
                    <input type="text" name="name" size="20">
                </p>
                <p>
                    <label for="passwort">Passwort:</label>
                    <input type="password" name="passwort" size="20">
                </p>
                <div style="padding-left: 90px"><input type="submit" value="Login"></div>

            </form>
        </div>

    <?php } ?>

</aside>
</body>
</html>

