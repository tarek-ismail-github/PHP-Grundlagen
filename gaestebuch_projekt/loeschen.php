<?php
require_once 'konfiguration.inc.php';
require_once 'funktionen.inc.php';
if (!empty($_GET['id'])){
    $sql='DELETE FROM besucher WHERE id=?';
    $statement = $db->prepare($sql);
    $statement->execute([$_GET['id']]);

}
redirect('index.php');