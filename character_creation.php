<?php
if (isset($_POST["username"])){
  echo 'Salut '. $_POST["username"]."<br>";
}
else {
  echo "Tu n'as pas de username, petit polisson <br>";
}
 ?>


 <!DOCTYPE html>
 <html lang='fr'>
    <head>
        <meta charset='UTF-8' name ="AdamDupuis"/>
        <title>My Portfolio</title>
        <link rel='stylesheet' href='styles.css'/>
    </head>
    <body>
      <a href="index.php">Retour à la page précédente</a>
    </body>
