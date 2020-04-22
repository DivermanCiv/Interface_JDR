<?php
require_once("core.class.php");
class Game_Rule extends Core {

  public static $bdd;

  public int $min_stat_value_allowed;
  public int $max_stat_value_allowed;
  public int $max_stat_points_allowed;
  public int $number_of_skills_to_pick;


  public function __construct(){
    $this->min_stat_value_allowed = 3;
    $this->max_stat_value_allowed = 17;
    $this->max_stat_points_allowed = 55;
    $this->number_of_skills_to_pick=2;
  }


}

 ?>
