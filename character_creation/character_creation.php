<?php
session_start();
include("../header.php");
require("character_creation.class.php");

$list = new Character;
?>



<body>

  <form action="character_creation.php" method="post">
    <label  for="char_name">Nom :</label>
    <input type="text" name="char_name">

    <label for="char_class">Métier :</label>
    <select id="char_class" onchange="desc_class()" name="char_class">
      <option value="Explorateur">Explorateur</option>
      <option value="Biologiste">Biologiste</option>
      <option value="Photoreporter">Photoreporter</option>
      <option value="Chasseur">Chasseur</option>
      <option value="Soldat">Soldat</option>
      <option value="Medecin">Médecin militaire</option>
    </select>
    <p id="class_desc"></p>

    <label for="strength">Force :</label>
    <input type="number" name="strength" value=3>
    <label for="agility">Agilité :</label>
    <input type="number" name="agility" value=3>
    <label for="endurance">Endurance :</label>
    <input type="number" name="endurance" value=3>
    <label for="perception">Perception :</label>
    <input type="number" name="perception" value=3>
    <label for="intelligence">Intelligence :</label>
    <input type="number" name="intelligence" value=3>

    <p>Choisissez deux compétences :  </p>
    <p> Nom  /  Description   / Bonus </p>
    <p>Compétences de Combat : </p>
    <?php $list_combat = $list -> list_skills("Combat"); ?>
    <p>Compétences de Déplacement : </p>
    <?php $list_move = $list -> list_skills("Déplacement"); ?>
    <p>Compétences de Survie : </p>
    <?php  $list_survie = $list -> list_skills("Survie");    ?>
    <br>
    <!--

    Caractéristiques :
    Force
    Agilité
    Endurance
    Perception
    Intelligence
    Tir & Lancer
    Combat rapproché
    Contrer / Esquiver
    PV
    Moral

    COMPETENCES
    Compétences de métier
    Compétences de Combat
    Compétences de Déplacement
    Compétences de survie




    -->
    <button>Créer un personnage</button>
  </form>

  <a href="../welcome.php">Retour</a>

  <script>
  // améliorer cette fonction en ajoutant un description de la classe (contenue dans la table class, class_description) avec AJAX (XMLHttpRequest)
    function desc_class(){
      var nom_classe = document.getElementById('char_class').value;
      document.getElementById('class_desc').innerHTML = nom_classe;
    }
  </script>
</body>
