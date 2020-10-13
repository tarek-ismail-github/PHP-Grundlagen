<?php
require 'konfiguration.inc.php';
require 'funktionen.inc.php';

if (empty($_REQUEST['id'])){
    redirect('index.php');
}

$sql = 'SELECT * FROM besucher WHERE id=?';
$statement= $db ->prepare($sql);
$statement->execute(
    [$_REQUEST['id']]
);
$result = $statement->fetch();
unset($statement);


if (!empty($_POST)){
$sql ='UPDATE besucher SET
    name =:name,
    email=:email,
    homepage=:homepage,
    titel=:titel,
    inhalt=:inhalt
    WHERE id=:id
';
$statement=$db->prepare($sql);
$statement->execute($_POST);

redirect('index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gaestebuch-Projekt</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="stylout.css">
</head>

<body>

<header class="textcenter">
    <h1>Eintrag Bearbeiten</h1>
        <div class="textcenter mt10">
            <img src="img/index.png" alt="Beispiel" class="imglogo"><br>
        </div>

</header>
    <section>
        <?php require 'hauptmenu.tpl.php'; ?>
    </section>

<div class="formbreite divcenter ">
        <h2>Schreiben Sie hier einen neuen Eintrag:</h2>

        <form method="post"
              action=" <?php bereinige($_SERVER['PHP_SELF']) ?> ">
            <div class="clearfix mb10"></div>
            <div class="labelbreite eingabefelder ">ID:</div>
            <div class="inputbreite">
            <input
                required="required" name="id" value="<?= (int)$result['id'] ?>"
            >
            </div>
            <div class="clearfix mb10"></div>
            <div class="labelbreite eingabefelder ">Name:*</div>
            <div class="inputbreite">
                <input type="text" required="required"
                           name="name" id="name"
                           placeholder="name"
                           value="<?= bereinige($result['name']) ?>"
                    >
            </div>
            <div class="clearfix mb10"></div>
            <div class="labelbreite eingabefelder">Email:</div>

            <div class="inputbreite">

                <input
                    type="email"
                    name="email" id="email"
                    value="<?= $result['email'] ?>"
                >
            </div>
            <div class="clearfix mb10"></div>
             <div class="labelbreite eingabefelder ">Hompage:</div>
            <div class="inputbreite">
                 <input
                    type="text"
                    name="homepage" id="homepage"
                    placeholder="homepage"
                    value="<?= bereinige($result['homepage']) ?>"
                >
            </div>
            <div class="clearfix mb10"></div>
            <div class="labelbreite eingabefelder ">Titel:*</div>
            <div class="inputbreite">
                 <input
                 type="text" required="required"
                 name="titel" id="titel"
                 placeholder="titel"
                 value="<?= bereinige($result['titel']) ?>"
                 >
            </div>
            <div class="clearfix mb10"></div>
            <div class="labelbreite eingabefelder ">Nachricht:</div>
            <div  >
                <textarea

                     required="required"
                    name="inhalt" id="inhalt"
                    rows="5" cols="35" class="textarea_nachricht">
               <?= $result['inhalt'] ?> </textarea>
            </div>

            <input type="submit" value="Aktualisieren">

        </form>
</div>


</body>
</html>
