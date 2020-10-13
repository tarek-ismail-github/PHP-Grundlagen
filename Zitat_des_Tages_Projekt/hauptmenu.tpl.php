<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gaestebuch-Projekt</title>
    <link rel="stylesheet" type="text/css" href="styles.css">

</head>
<body>

    <ul>
        <li><a href="index.php">Startseite</a></li>
        <li><a href="anlegen.php">Zitat anlegen</a></li>
        <?php if (isset($_SESSION['login']) && $_SESSION['login'] == 'ok') { ?>
            <li><a href="auswertungen.php?a=1">Auswertungen</a></li>
            <li><a href="logout.php">Ausloggen </a></li>
        <?php } else { ?>
            <li><a href="auswertungen.php">Auswertungen</a></li>
        <?php } ?>
    </ul>


</body>