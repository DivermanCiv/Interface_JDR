<?php

class Character extends Game_Rule{
  public static $bdd;
  public int $max_stat_points_allowed;
  public int $min_stat_value_allowed;
  public int $max_stat_value_allowed;
  public $error_message;

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

  public function __construct(){
    $this->min_stat_value_allowed=3;
    $this->max_stat_value_allowed=17;
    $this->max_stat_points_allowed=55;
    $this->number_of_skills_to_pick=2;
  }


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

      elseif ($strength < $this->min_stat_value_allowed
      || $agility < $this->min_stat_value_allowed
      || $endurance < $this->min_stat_value_allowed
      || $perception < $this->min_stat_value_allowed
      || $intelligence < $this->min_stat_value_allowed)
      {
        $this->error_message = "L'une de vos statistiques est inférieure à la valeur minimum demandée (".$this->min_stat_value_allowed.").";
        return FALSE;
      }
      elseif ($strength > $this->max_stat_value_allowed
      ||$agility > $this->max_stat_value_allowed
      ||$endurance > $this->max_stat_value_allowed
      ||$perception > $this->max_stat_value_allowed
      ||$intelligence > $this->max_stat_value_allowed)
      {
        $this->error_message = "L'une de vos statistiques est supérieure à la valeur maximum demandée (".$this->max_stat_value_allowed.").";
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
        else
        {
        return TRUE;
        $this->PV=$strength+$endurance;
        $this->moral=$endurance+$intelligence;
        $this->close_combat = $strength+$agility;
        $this->distance_combat = $intelligence+$perception;
        $this->defend = $agility+$perception;

        }
      }
    }
  }


  }
  ?>
