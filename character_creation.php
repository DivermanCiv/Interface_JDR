<?php
include("class/core.class.php");
$check_login = new Core;
$check_if_logged= $check_login->check_login();
include("header.php");
include("class/character_creation_page.class.php");
include("class/character.class.php");

//L'udéal serait de mettre les infos suivantes dans une classe 'Game' (par exemple) qui serait intermédiaire entre Core et Character pour pouvoir changer les minimums/maximums de caracs
$this_game = new Game_Rule;
$list = new Character_Creation_Page;
$character = new Character;
$valeur_min = $this_game->min_stat_value_allowed;
$valeur_max=$this_game->max_stat_value_allowed;
$somme_points_max=$this_game->max_stat_points_allowed;


?>

<script src="js/jquery-3.5.0.min.js"></script>

<body>
  <h1>Création de personnage</h1>
  <h2>Informations de base</h2>
  <form action="character_creation.php#create_button" method="post">
    <label  for="char_name">Nom :</label>
    <input type="text" name="char_name" value="<?php if(isset($_POST["char_name"])){echo $_POST["char_name"];}?>">

    <?php $list_classes = $list -> list_of_classes(); ?>
    <p id="class_desc"></p>
    <p id="class_comp"></p>


    <!-- Liste des statistiques à choisir  -->
    <h2>Statistiques</h2>
    <p> Valeur minimum autorisée : <?= $valeur_min;?></p>
    <p> Valeur maximum autorisée : <?=$valeur_max;?></p>
    <p> Points à répartir : <span id="total_points"></span></p>
    <p style="color:red" id="too_much_points_error">Attention ! Vous avez attribué trop de points !</p>
    <p style="color:red" id="non_valid_stat_value">Attention ! Une valeur rentrée est non valide !</p>
    <?php $list_stat = $list -> list_of_stats($valeur_min, $valeur_max); ?>

    <!-- Liste des compétences à choisir -->
    <h2>Compétences</h2>
    <p>Choisissez deux compétences :  </p>
    <h3>Compétences de Combat : </h3>
    <?php $list_combat = $list -> display_list_of_skills_by_type("Combat"); ?>
    <h3>Compétences de Déplacement : </h3>
    <?php $list_move = $list -> display_list_of_skills_by_type("Déplacement"); ?>
    <h3>Compétences de Survie : </h3>
    <?php  $list_survie = $list -> display_list_of_skills_by_type("Survie");    ?>
    <br>




    <button name="check_character" id="create_button">Créer le personnage</button>
  </form>

<?php
    if (isset($_POST["check_character"])){
      $check = $character->check_character();

      if ($check===FALSE) {
        $character->message_color = "red";
        ?>
        <p style='color:<?= $character->message_color; ?>;'><?= $character->error_message; ?></p>
        <?php
      }
      else{
        ?>
        <p style='color:<?= $character->message_color; ?>;'><?= $character->valid_message; ?></p>

        <form method="post" action="character_creation.php#save_button">
          <button id="save_button" name="save_character">Enregistrer personnage</button>
        </form>
         <?php

         //$display = $character->display_character();
      }
    }


    if (isset($_POST["save_character"]))
    {
      //$save = $character -> save_character();
      echo "Personnage sauvegardé !";
    }



?>

  <a href="welcome.php">Retour</a>

<script src="js/character_creation.js"></script>
</body>
