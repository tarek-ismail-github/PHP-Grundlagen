<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gaestebuch-Projekt</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="stylout.css">

</head>
<body>

    <br><br><br>

    <div class="eintragtabelle textcenter">
    <div class="pr10  eintragkopf">
        <div class="">
            <div class="fr tabellenkopf"> Eintrag vom <?= explode(" ",formatiereDatum($besucherer['datumzeit']))[0];
                echo ' um '.explode(" ",$besucherer['datumzeit'])[1]?></div>
            <div class="tabellenkopf">Name:<span class="tabellenkopflink"> <?=$besucherer['name'] ?> </span></div>
            <div class="clearfix"></div>
            <div class="fr tabellenkopf">Email:<span class="tabellenkopflink"><?= $besucherer['email']?></span> </div>
            <div class="fr tabellenkopf">URL:<span class="tabellenkopflink"><?= $besucherer['homepage']?></span> </div><br><br>
            <div class=" tabellenkopf">Titel:<span class="tabellenkopflink"><?= $besucherer['titel']?></span> </div>


            <div class="clearfix"></div>

        </div>
        <div class="tabelleninhalt"><?= $besucherer['inhalt'] ?> </div>


    </div>
    <div>
        <button class="button1"> <a
                href="bearbeiten.php?id=<?= (int)$besucherer['id'] ?>" class="tabellenkopflink"
        >Bearbeiten</a> </button>
        <button class="button1"><a
                href="loeschen.php?id=<?= (int)$besucherer['id'] ?>" class="tabellenkopflink"
        >Löschen</a></button>
    </div>
</div>

</body>
</html>