<?php
require_once 'konfiguration.inc.php';
require_once 'funktionen.inc.php';

if (!empty($_GET['id'])){
    $sql = ' DELETE FROM filme WHERE id =?';
    $statement=$db ->prepare($sql);
    $statement ->execute([$_GET['id']]);
}

// Leite zur Startseite weiter.
redirect('index.php');