<?php
session_start();
require_once 'konfiguration.inc.php';
require_once 'funktionen.inc.php';
if (empty($_REQUEST['erstellt_am'])) {
    redirect('index.php');
}
$s = $_REQUEST['erstellt_am'];
$sql = 'SELECT * FROM log WHERE DATE(erstellt_am) = ?';
$statement = $db->prepare($sql);
$statement->execute(
    [$s]
);
$result = $statement->fetchAll();
//unset($statement)
//print_r($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gaestebuch-Projekt</title>
    <link rel="stylesheet" type="text/css" href="styles.css">

</head>
<body>

<header class="textcenter">
    <div class="textcenter mt10">
        <img src="twitter-circle-icon-png-13.png" alt="Beispiel" class="imglogo"><br>
    </div>
    <h1>Deteils vom :   <?=
        formatiereDatum($s) ;
        ?> </h1>

</header>
<section>
    <?php require 'hauptmenu.tpl.php'; ?>

</section>
<br><br>
<aside class="formbreite divcenter">
    <div class="textcenter ">
        <div class="eintragtabelle "><br>
            <?php
            error_reporting(E_ALL & ~E_NOTICE);

            echo 'Anzal der Ergebnisse : ' . sizeof($result);
            $countwindows = array_count_values(array_column($result, 'browser'))['Windows'];
            $resultat = ($countwindows == true ? $countwindows : 'keine Windows-Nutzer');
            echo '<br><br>';
            echo "---------------------------------";
            echo '<br><br>';
            echo 'Windows-Nutzer : ' . $resultat;

            $countmac = array_count_values(array_column($result, 'browser'))['Mac'];
            $resultat1 = ($countmac == true ? $countmac : 'keine Mac-Nutzer');

            echo '<br><br>';
            echo "---------------------------------";
            echo '<br><br>';
            echo 'Mac-Nutzer : ' . $resultat1;
            $countDE = array_count_values(array_column($result, 'sprache'))['de'];
            echo '<br><br>';
            echo "---------------------------------";
            echo '<br><br>';
            echo 'Nutzer, die Deutsch als bevorzugte Sprache eingestellt hatten : ' . $countDE;
            echo '<br><br>';

            echo "---------------------------------";

            $arrayZitaze = [];
            foreach ($result as $r) {
                $arrayZitaze[] .= $r['zitat_id'];
            }
            $arrayZitaze1 = array_unique($arrayZitaze);
            foreach ($arrayZitaze1 as $z) {
                $countZitate = array_count_values($arrayZitaze)[$z];
                echo '<br><br>';

                echo 'Zitat ' . $z . ' Anzahl = ' . $countZitate;


            }
            ?>
        </div>
    </div>
</aside>
</body>
</html>