<?php
//das Datum passend umformatiert
function formatiereDatum($dbDatum, $format = '%d.%m.%Y'){

    return strftime($format, strtotime($dbDatum));
}

function bereinige($benutzerEingabe, $encoding = 'UTF-8'){
    //var_dump($benutzerEingabe);
    return htmlspecialchars(
        strip_tags($benutzerEingabe),
        ENT_QUOTES | ENT_HTML5,
        $encoding
    );
}
//realisiert einen HTTP-Redirect über die PHP-Funktion
function redirect($url){
    header('Location: ' . $url);
    exit;
}
