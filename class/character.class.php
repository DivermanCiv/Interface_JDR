
<?php
require_once("mygame_rule.class.php");

class Character extends Game_Rule{
  public static $bdd;
  public int $max_stat_points_allowed;
  public int $min_stat_value_allowed;
  public int $max_stat_value_allowed;
  public $error_message;
  public $valid_message;
  public $message_color;

  private string $char_name;
  private string $char_class;
  private int $strength;
  private int $agility;
  private int $endurance;
  private int $perception;
  private int $intelligence;
  private int $PV;
  private int $moral;
  private int $close_combat;
  private int $distance_combat;
  private int $defend;

  private $char_skills;


  public function check_character(){
    if (empty(trim($_POST["char_name"]))){
      $this->error_message = "Choisissez un nom !";
      return FALSE;
    }
    else
    {
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
    $this->close_combat = $this->strength+$this->agility;
    $this->distance_combat = $this->intelligence+$this->perception;
    $this->defend = $this->agility+$this->perception;
  }



  }
  ?>
