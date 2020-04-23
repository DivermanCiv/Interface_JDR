<?php
require_once("mygame_rule.class.php");
class Character_Creation_Page extends Game_Rule {
  public static $bdd;

  public int $min_stat_value_allowed;

  public function __construct(){
    Core::__construct();
  }

  public function read_text($value_name, $which_value, $what_to_read, $table){
    $req = Core::$bdd->prepare("SELECT $what_to_read FROM $table WHERE $value_name = :x");
    $req -> execute(array('x'=> $which_value));
    $result = $req-> fetch();
    return $result[0];
  }

  public function list_of_classes(){
    $req = Core::$bdd->prepare("SELECT * FROM class");
    $req->execute(array());
    echo "<label for='char_class'>Métier :</label>";
    echo "<select id='char_class' onchange='desc_class()' name='char_class'>";
    foreach ($req as $value){
      if(isset($_POST["char_class"])){
        if ($_POST["char_class"] == $value["class_name"]){
          $selected = "selected";
        }
        else{$selected="";}
      }
      echo "<option value=".$value["class_name"]." $selected>".$value["class_name"]."</option>";
    }
    echo "</select>";
    echo "<p id='class_desc'></p>";
  }

  public function list_of_skills_by($something){
    $req= Core::$bdd->prepare("SELECT skill_id, $something FROM skill");
    $req -> execute(array());
    $skill_table = $req->fetchAll();
    $skills = array();
    foreach ($skill_table as $skill) {
      $skills[$skill["skill_id"]] = $skill[$something];
    }
    return $skills;

  }


  public function display_list_of_skills_by_type($skill_type){
    $req = Core::$bdd->prepare("SELECT * FROM skill WHERE skill_type = :x");
    $req-> execute(array("x"=>$skill_type));
    foreach ($req as $value) {
      if(isset($_POST[$value['skill_id']])){$selected ="checked";}
      else{$selected="";}
      echo "<br>";
      echo "<input type='checkbox' name=".$value['skill_id']." $selected >";
      echo "<label for=".$value['skill_id'].">".$value['skill_name']. " : " . $value['skill_description'].". ". $value['skill_bonus']."</label>";
    }
  }

  public function list_of_stats($min_stat_value_allowed, $max_stat_value_allowed){
    $req = Core::$bdd->prepare("SELECT * FROM stat WHERE stat_is_primary = 1");
    $req -> execute(array());
    $i = 0;
    foreach ($req as $value){
      $i++;
      if (isset($_POST[$value["stat_name"]]))
      {
        $this_value=$_POST[$value["stat_name"]];
      }
      else {$this_value=$min_stat_value_allowed;}
      echo "<label for=".$value["stat_name"].">".$value["stat_name"]."</label>";
      echo "<input type=\"number\" id=\"stat".$i."\" onchange = \"document.getElementById(\"stat".$i."\").innerHTML = this.value; total_stat_points();\" name=".$value["stat_name"]." value=\"".$this_value."\" min = \"".$min_stat_value_allowed."\" max=\"".$max_stat_value_allowed."\"/>";
      echo "<p>".$value["stat_description"]."</p>";
    }
    return $i;
  }
}

 ?>
