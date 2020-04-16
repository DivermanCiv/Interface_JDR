<?php
require("../core.class.php");

class Character extends Core{
  protected $bdd;

  public function read_text($value_name, $which_value, $what_to_read, $table){
    $req = $this->bdd -> prepare("SELECT $what_to_read FROM $table WHERE $value_name = :x");
    $req -> execute(array('x'=> $which_value));
    $result = $req-> fetch();
    return $result[0];
  }

  public function list_skills($skill_type){
    $req =$this->bdd-> prepare("SELECT * FROM skill WHERE skill_type = :x");
    $req-> execute(array("x"=>$skill_type));
    foreach ($req as $value) {
      echo "<br>";
      echo "<input type='checkbox' name=".$value['skill_id'].">";
      echo "<label for=".$value['skill_id'].">".$value['skill_name']. " : " . $value['skill_description'].". ". $value['skill_bonus']."</label>";
    }
  }
}

 ?>
