<?php

class Character_Creation_Page extends Core{
  public static $bdd;

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
      echo "<option value=".$value["class_name"].">".$value["class_name"]."</option>";
    }
    echo "</select>";
    echo "<p id='class_desc'></p>";
  }

  public function list_of_skills($skill_type){
    $req = Core::$bdd->prepare("SELECT * FROM skill WHERE skill_type = :x");
    $req-> execute(array("x"=>$skill_type));
    foreach ($req as $value) {
      echo "<br>";
      echo "<input type='checkbox' name=".$value['skill_name'].">";
      echo "<label for=".$value['skill_name'].">".$value['skill_name']. " : " . $value['skill_description'].". ". $value['skill_bonus']."</label>";
    }
  }

  public function list_of_stats(){
    $req = Core::$bdd->prepare("SELECT * FROM stat WHERE stat_is_primary = 1");
    $req -> execute(array());
    $i = 0;
    foreach ($req as $value){
      $i++;
      echo "<label for=".$value["stat_name"].">".$value["stat_name"]."</label>";
      echo "<input type=\"number\" id=\"stat".$i."\" onchange = \"document.getElementById(\"stat".$i."\").innerHTML = this.value; total_stat_points();\" name=".$value["stat_name"]." value =\"0\"/>";
      echo "<p>".$value["stat_description"]."</p>";
    }
    return $i;
  }
}

 ?>
