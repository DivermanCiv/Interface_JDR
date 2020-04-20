<?php
session_start();
require("../core.class.php");
include("../header.php");
include("character_creation_page.class.php");
include("character.class.php");

//L'udéal serait de mettre les infos suivantes dans une classe 'Game' (par exemple) qui serait intermédiaire entre Core et Character pour pouvoir changer les minimums/maximums de caracs

$list = new Character_Creation_Page;
$character = new Character;
$valeur_min = $character->min_stat_value_allowed=3;
$valeur_max=$character->max_stat_value_allowed=17;
$somme_points_max=$character->max_stat_points_allowed=55;


?>



<body>
  <h1>Création de personnage</h1>
  <h2>Informations de base</h2>
  <form action="character_creation.php" method="post">
    <label  for="char_name">Nom :</label>
    <input type="text" name="char_name">

    <?php $list_classes = $list -> list_of_classes(); ?>


    <!-- Liste des statistiques à choisir  -->
    <h2>Statistiques</h2>
    <p> Valeur minimum autorisée : <?= $valeur_min;?></p>
    <p> Valeur maximum autorisée : <?=$valeur_max;?></p>
    <p> Points répartis : <span id="total_points">0</span> / <?=$somme_points_max;?></p>
    <?php $list_stat = $list -> list_of_stats(); ?>

    <!-- Liste des compétences à choisir -->
    <h2>Compétences</h2>
    <p>Choisissez deux compétences :  </p>
    <h3>Compétences de Combat : </h3>
    <?php $list_combat = $list -> list_of_skills("Combat"); ?>
    <h3>Compétences de Déplacement : </h3>
    <?php $list_move = $list -> list_of_skills("Déplacement"); ?>
    <h3>Compétences de Survie : </h3>
    <?php  $list_survie = $list -> list_of_skills("Survie");    ?>
    <br>




    <button>Créer le personnage</button>
  </form>

<?php
    $check = $character->check_character();

    if ($check==FALSE) {
      echo "<p style='color:red;'>".$character->error_message."</p>";
    }
    else{
      //$display = $character->display_character();

      ?><p style='color:green;'>Personnage validé !</p>
      <button>Enregistrer personnage</button> <?php
    }



?>

  <a href="../welcome.php">Retour</a>

  <script>
  // améliorer cette fonction en ajoutant un description de la classe (contenue dans la table class, class_description) avec AJAX (XMLHttpRequest)
  //rien ne semble fonctionner, à retravailler...

  //Fonction affichant la classe choisie
    function desc_class(){
      var nom_classe = document.getElementById("char_class").value;
      document.getElementById("class_desc").innerHTML = nom_classe;
    }

//Fonction sensée afficher le total de points dépensés sur les statistiques
    function total_stat_points(){
      var number_of_stats = <?php $list_stat; ?>;
      var total = 0;
      for (var i = 1; i < number_of_stats+1; i++) {
        var id = "stat"+i;
        total += parseInt(document.getElementById(id).value);
      }
      document.getElementById("total_points").innerHTML = total;
    }


  </script>
</body>
