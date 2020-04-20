<?php

class Character extends Core{
  public static $bdd;
  public $max_stat_points_allowed;
  public $min_stat_value_allowed;
  public $max_stat_value_allowed;
  public $error_message;

  public $char_name;
  public $char_class;
  public $strength;
  public $agility;
  public $endurance;
  public $perception;
  public $intelligence;
  public $PV;
  public $moral;
  public $close_combat;
  public $distance_combat;
  public $defend;


public function check_character(){
  if (empty(trim($_POST["char_name"]))){
    $this->error_message = "Choisissez un nom !";
    return FALSE;
  }
  else {
    $this->char_name = $_POST["char_name"];
    $this->char_class = $_POST["char_class"];

    $strength=$this->strength = $_POST["Force"];
    $agility=$this->agility = $_POST["Agilité"];
    $endurance=$this->endurance = $_POST["Endurance"];
    $perception=$this->perception = $_POST["Perception"];
    $intelligence=$this->intelligence = $_POST["Intelligence"];
    $total_stat_points = $strength+$agility+$endurance+$perception+$intelligence;

  //Vérification des valeurs chiffrées
    if ($total_stat_points>$this->max_stat_points_allowed){
      $this->error_message = "Vous avez attribué trop de points ! Le maximum autorisé est de ".$this->max_stat_points_allowed." !<br>";
      return FALSE;
    }
    //ça ne marche pas pour une raison inconnue .... 
    elseif (($strength||$agility||$endurance||$perception||$intelligence)< $this->min_stat_value_allowed){
      $this->error_message = "L'une de vos statistiques est inférieure à la valeur minimum demandée (".$this->min_stat_value_allowed.").";
      return FALSE;
    }
    elseif (($strength||$agility||$endurance||$perception||$intelligence)> $this->max_stat_value_allowed){
      $this->error_message = "L'une de vos statistiques est supérieure à la valeur maximum demandée (".$this->max_stat_value_allowed.").";
      return FALSE;
    }
    else {
      return TRUE;
      $PV = $strength+$endurance;
      $moral = $endurance+$intelligence;
      $close_combat = $strength+$agility;
      $distance_combat = $intelligence+$perception;
      $defend = $agility+$perception;

    }
  }
}


}
?>
