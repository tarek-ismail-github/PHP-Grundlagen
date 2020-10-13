<?php
session_start();
require_once 'funktionen.inc.php';
require_once 'konfiguration.inc.php';

if (!empty($_POST)) {
    $sql = 'INSERT INTO zitate (autor,inhalt)' .
        'VALUES (:autor,:inhalt)';

    $statement = $db->prepare($sql);
    $statement->execute($_POST);

    redirect('index.php');
}
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
    <h1>Eintrag anlegen</h1>
</header>
<section>
    <?php require 'hauptmenu.tpl.php'; ?>
</section>
<br><br>
<div class="textcenter">
    <h2>Legen Sie Ihren Eintrag an </h2>
</div>
<div class="formbreite divcenter">
    <form method="post" action="<?php bereinige($_SERVER['PHP_SELF']) ?>" class="form1">
        <div class="labelbreite eingabefelder ">Autor:*</div>
        <div class="inputbreite">
            <input type="text" maxlength="40" name="autor" id="autor" required="required"
                   value="<?php (!empty($_POST['autor'])) ? bereinige($_POST['autor']) : '' ?>">
        </div>
        <div class="clearfix mb10"></div>
        <div class="labelbreite eingabefelder ">Zitat:*</div>
        <br>
        <div>
            <textarea name="inhalt" id="inhalt" rows="5" cols="34" class="textarea_nachricht" required="required">
                <?php (!empty($_POST['inhalt'])) ? bereinige($_POST['inhalt']) : '' ?>
            </textarea>
        </div>

        <div class="textcenter">
            <input type="submit" value="eintragen" class="button1">
        </div>


    </form>
</div>
</div>
</div>


</body>
</html>