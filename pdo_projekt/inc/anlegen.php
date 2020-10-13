<?php
require_once 'konfiguration.inc.php';
require_once 'funktionen.inc.php';

// Vorhandene Genres ermitteln.
$statement = $db->query('SELECT * FROM genres');
$genres = $statement->fetchAll();
unset($statement);
// Es sind Formulardaten vorhanden.

if (!empty($_GET)){
    $sql = 'INSERT INTO filme (titel, veroeffentlichung, dauer, genre_id)' .
        ' VALUES (:titel, :veroeffentlichung, :dauer, :genre_id)';
    $statement = $db -> prepare($sql);


    $_GET['titel'] = bereinige($_GET['titel']);

    $statement-> execute($_GET);

    // Leite zur Startseite weiter.
    //redirect('index.php');
}

$patternDatum = '[0-9]{4}' . // vierstelliges Jahr
     '-(0[1-9]|1[012])' . // zweistelliger Monat
    '-(0[1-9]|1[0-9]|2[0-9]|3[01])'; // zweistelliger Tag
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PDO-Projekt</title>
    <link href="stylesheet.css" type="text/css" rel="stylesheet" />
</head>

<body>
    <header>
        <h1>Film anlegen</h1>
    </header>
    <?php require 'hauptmenu.tpl.php';?>

    <section>
        <h2>Schreiben Sie hier einen neuen Eintrag:</h2>
        <form method="get"
              action=" <?php bereinige($_SERVER['PHP_SELF']) ?> ">
            <input
            type="text" required="required" name="titel" id="titel" placeholder="Filmtitel"
            value="<?php (!empty($_GET['titel'])) ? bereinige($_GET['titel']) : '' ?>"
            >
            <input type="text" required="required"
                    name="veroeffentlichung" id="veroeffentlichung"
                    pattern="<?= $patternDatum ?>"
                    placeholder="Veröffentlichungsdatum"
            >
            Format JJJJ-MM-TT
            <input
                type="text" required="required"
                 name="dauer" id="dauer"
                 pattern="[0-9]+"
                 placeholder="Dauer"
            >
            Minuten
            <select required="required" name="genre_id" id="genre_id">
                <option
                    value="" selected="selected" disabled="disabled">
                    -- Genre wählen --
                </option>
                <?php foreach ($genres as $genre): ?>
                <option value="<?= bereinige($genre['titel']) ?>"><?= bereinige($genre['titel']) ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Eintragen">

        </form>

    </section>




</body>
</html>
