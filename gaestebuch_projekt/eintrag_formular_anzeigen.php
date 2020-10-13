<?php
require_once 'funktionen.inc.php';
require_once 'konfiguration.inc.php';

if (!empty($_GET)){
    $sql = 'INSERT INTO besucher(name,email,homepage,titel,inhalt)'.
        'VALUES (:name,:email,:homepage,:titel,:inhalt)';
    $statement = $db->prepare($sql);
    $statement->execute($_GET);

    redirect('eintrag_danke.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gaestebuch-Projekt</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="stylout.css">

</head>
<body>
<header class="textcenter">
    <h1>Eintrag anlegen</h1>
    <div class="textcenter mt10">
        <img src="img/index.png" alt="Beispiel" class="imglogo"><br>
    </div>

</header>
<section>
    <?php require 'hauptmenu.tpl.php'; ?>
</section>


<div class="formbreite divcenter">
    <form method="get" action="<?php bereinige($_SERVER['PHP_SELF']) ?>">
        <div class="labelbreite eingabefelder ">Name:*</div>
        <div class="inputbreite">
            <input type="text" maxlength="40" name="name" id="name" required="required"
                   value="<?php (!empty($_GET['name']))? bereinige($_GET['name']):'' ?>" class="">
        </div>

        <div class="clearfix mb10"></div>
        <div class="labelbreite eingabefelder">Email:</div>
        <div class="inputbreite">
            <input type="email" maxlength="255" name="email" id="email" value="" >
        </div>

        <div class="clearfix mb10"></div>
        <div class="labelbreite eingabefelder ">Hompage:</div>
        <div class="inputbreite">
            <input type="text" maxlength="40" name="homepage" id="homepage" value="http://" class="">
        </div>
        <div class="clearfix mb10"></div>
        <div class="labelbreite eingabefelder ">Titel:*</div>
        <div class="inputbreite">
            <input type="text" maxlength="40" name="titel" value="" required="required" class="">
        </div>

        <div class="clearfix mb10"></div>
        <div class="labelbreite eingabefelder ">Nachricht:</div>
        <div>
            <textarea name="inhalt" id="inhalt" rows="5" cols="34" class="textarea_nachricht" required="required">*</textarea>
        </div>

        <div class="textcenter">
            <input type="submit"  value="eintragen">
        </div>


    </form>
</div>
</div>
</div>



</body>
</html>