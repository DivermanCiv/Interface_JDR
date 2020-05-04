
<?php
require_once("config.class.php");
require_once("mygame_rule.class.php");

class Character extends Game_Rule{

  public static $bdd;
  public $max_stat_points_allowed;
  public $min_stat_value_allowed;
  public $max_stat_value_allowed;
  public $error_message;
  public $valid_message;
  public $message_color;

  private $char_name;
  private $background;
  private $char_class;
  private $strength;
  private $agility;
  private $endurance;
  private $perception;
  private $intelligence;
  private $PV;
  private $moral;
  private $close_combat;
  private $distance_combat;
  private $defend;

  private $char_skills;

  public function __construct(){
    Core::__construct();
    Game_Rule::__construct();
  }

  public function check_character(){
    if (empty(trim($_POST["char_name"]))){
      $this->error_message = "Choisissez un nom !";
      return FALSE;
    }
    else
    {
      if(empty(trim($_POST["background"]))){$this->background="";}
      else{$this->background = $_POST["background"];}
      $this->char_name = $_POST["char_name"];
      $this->char_class = $_POST["char_class"];
      $strength=$this->strength = $_POST["Force"];
      $agility=$this->agility = $_POST["Agilité"];
      $endurance=$this->endurance = $_POST["Endurance"];
      $perception=$this->perception = $_POST["Perception"];
      $intelligence=$this->intelligence = $_POST["Intelligence"];
      $total_stat_points = $strength+$agility+$endurance+$perception+$intelligence;

    //Vérification des valeurs chiffrées
      if ($total_stat_points>$this->max_stat_points_allowed)
      {
        $this->error_message = "Vous avez attribué trop de points ! Le maximum autorisé est de ".$this->max_stat_points_allowed." !<br>";
        return FALSE;
      }

      else
      {
        //vérification que le nombre de compétences choisi est valide
        $list = new Character_Creation_Page;
        $list_of_skills = $list -> list_of_skills_by("skill_name");
        $skills_picked_count=0;
        foreach ($list_of_skills as $key=>$value)
        {
          if(isset($_POST[$key]))
          {
            $skills_picked_count++;
            $this->char_skills[$skills_picked_count]=$value;
          }
        }


        if ($skills_picked_count > $this->number_of_skills_to_pick)
        {
          $this->error_message = "Vous avez selectionné trop de compétences ! Vous devez en sélectionner ".$this->number_of_skills_to_pick.".";
          return FALSE;
        }
        elseif ($skills_picked_count < $this->number_of_skills_to_pick)
        {
          $this->error_message = "Vous n'avez pas selectionné assez de compétences ! Vous devez en sélectionner ".$this->number_of_skills_to_pick.".";
          return FALSE;
        }

        elseif ($total_stat_points < $this->max_stat_points_allowed)
        {
          $this->valid_message = "Vous n'avez pas distribué tous vos points, êtes vous sûr de vouloir faire cela ?";
          $this->message_color = "orange";
          $this->calculate_secondary_stats();
          return TRUE;
        }
        else {
          $this->valid_message = "Personnage validé ! ";
          $this->message_color = "green";
          $this->calculate_secondary_stats();
          return TRUE;
        }

      }
    }
  }


  public function calculate_secondary_stats(){
    $this->PV=$this->strength+$this->endurance;
    $this->moral=$this->endurance+$this->intelligence;
    $this->close_combat = round(($this->strength+$this->agility)/2);
    $this->distance_combat = round(($this->intelligence+$this->perception)/2);
    $this->defend = round(($this->agility+$this->perception)/2);
  }



  public function display_character(){
    $req = Core::$bdd->prepare("SELECT * FROM skill WHERE skill_type = :x");
    $req-> execute(array("x"=>$this->char_class));
    echo "<p><strong>Nom : </strong>".$this->char_name."</p>";
    echo "<p><strong>Classe : </strong>".$this->char_class."</p>";
    echo "<h3>Statistiques</h3>";
    echo "<p><strong>Force : </strong>".$this->strength."</p>";
    echo "<p><strong>Agilité : </strong>".$this->agility."</p>";
    echo "<p><strong>Endurance : </strong>".$this->endurance."</p>";
    echo "<p><strong>Perception : </strong>".$this->perception."</p>";
    echo "<p><strong>Intelligence : </strong>".$this->intelligence."</p>";
    echo "<p><strong>PV : </strong>".$this->PV."</p>";
    echo "<p><strong>Moral : </strong>".$this->moral."</p>";
    echo "<p><strong>Combat Rapproché : </strong>".$this->close_combat."</p>";
    echo "<p><strong>Tir et Lancer : </strong>".$this->distance_combat."</p>";
    echo "<p><strong>Esquiver & Contrer : </strong>".$this->defend."</p>";
    echo "<h3>Compétences</h3>";
    echo "<ul>";
    foreach($req as $value){
    echo "<li>".$value["skill_name"]."</li>";
    }
    foreach ($this->char_skills as $value){
      echo "<li>".$value."</li>";
    }
    echo "</ul><h3>Background</h3><p>".$this->background."</p><br><br>";
  }


  public function save_character(){
    $config = new Config;
    //récuperer l'info de l'id de la classe utilisée
    $user_id = $config->give_me_id("user", "user_username", $_SESSION["username"]);
    $class_id = $config->give_me_id("class", "class_name", $this->char_class);

    $req = Core::$bdd->prepare("INSERT INTO `character` (character_name, character_background, user_id, class_id) VALUES (:char_name, :char_bg, :user, :class)");
    $req->execute(array(
      'char_name' => $this->char_name,
      'char_bg' => $this->background,
      'user' => $user_id,
      'class'=> $class_id
    ));

    //récupérer les infos des id de stat et de character
    $last_id = Core::$bdd->lastInsertId();

    $array_of_stats = array(
      $config->give_me_id("stat", "stat_name", "Force") => $this->strength,
        $config->give_me_id("stat", "stat_name", "Agilité") => $this->agility,
      $config->give_me_id("stat", "stat_name", "Endurance") => $this->endurance,
      $config->give_me_id("stat", "stat_name", "Perception") => $this->perception,
      $config->give_me_id("stat", "stat_name", "Intelligence") => $this->intelligence,
      $config->give_me_id("stat", "stat_name", "Tir et Lancer") => $this->distance_combat,
      $config->give_me_id("stat", "stat_name", "Combat Rapproché") => $this->close_combat,
      $config->give_me_id("stat", "stat_name", "Contrer et Esquiver") => $this->defend,
      $config->give_me_id("stat", "stat_name", "PV") => $this->PV,
      $config->give_me_id("stat", "stat_name", "Moral") => $this->moral,
    );

    $req2 = Core::$bdd->prepare("INSERT INTO `character_stat`(character_id, stat_id, character_stat_max_value, character_stat_current_value) VALUES (:char_id, :stat_id, :char_stat_max, :char_stat_max)");

    foreach ($array_of_stats as $key => $value) {
      $req2->execute(array(
        'char_id' =>  $last_id,
        'stat_id' => $key,
        'char_stat_max' => $value
      ));
    };

    //récupérer les skills et les id
    foreach ($this->char_skills as $value){
      $array_of_skills[]= $config->give_me_id("skill", "skill_name", $value);
    }

    //récupérer le skill de classe de perso
    $array_of_skills[] = $config->give_me_id("skill", "skill_type", $this->char_class);


    $req3 = Core::$bdd->prepare("INSERT INTO master (character_id, skill_id) VALUES (:char_id, :skill_id)");

    foreach ($array_of_skills as $value) {
      $req3->execute(array(
        'char_id' => $last_id,
        'skill_id' => $value
      ));
    };
  }

  

}
  ?>
