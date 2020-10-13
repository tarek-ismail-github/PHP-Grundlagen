<div class="eintragtabelle textcenter">
    <div class="pr10  eintragkopf">
        <div class="">
            <div class=" tabellenkopf  "> Eintrag vom <?= explode(" ",formatiereDatum($zitat['erstellt_am']))[0];
                echo '<br>'.' um '.explode(" ",$zitat['erstellt_am'])[1]?></div>
            <div class="tabellenkopf">Autor:<br><span class="tabellenkopflink"> <?=$zitat['autor'] ?> </span></div>

            <div class="clearfix"></div>

        </div>
        <div class="tabelleninhalt"><?= $zitat['inhalt'] ?> </div>


    </div>
    <div>
        <button class="button1"> <a
                href="bearbeiten.php?id=<?= (int)$zitat['id'] ?>" class="tabellenkopflink"
        >Bearbeiten</a> </button>
        <button class="button1"><a
                href="loeschen.php?id=<?= (int)$zitat['id'] ?>" class="tabellenkopflink"
        >Löschen</a></button>
    </div>
</div>
