<?php
session_start();
$host = $_SERVER['HTTP_HOST'];
$uri = rtrim(dirname($_SERVER['PHP_SELF']));

$benutzer = [
    'marta' => '12345',
    'manu' => '6789',
    'merlin' => 'asdfg'
];

$name = isset($_POST['name']) ? $_POST['name'] : '';
$passwort_aktuell = isset($_POST['passwort']) ? $_POST['passwort'] : '';

if (array_key_exists($name, $benutzer) && $benutzer[$name] == $passwort_aktuell ) {
    $extra = 'auswertungen.php?a=1';
    $_SESSION['login'] = 'ok';
    $_SESSION['name'] = $name;}


/*}elseif ($benutzer[$name] = $passwort_aktuell){
    $extra = 'auswertungen.php?a=1';}
*/
else{
    $extra = 'auswertungen.php?a=2';

}



header("Location: http://$host$uri/$extra");
