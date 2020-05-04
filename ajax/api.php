<?php
require_once("../class/core.class.php");
header("Content-Type: application/json; charset=UTF-8");
$api = new Core;
$data = array();

$req = Core::$bdd->prepare("SELECT user_id, user_username FROM user");
$req->execute(array());
$data["user"] = $req->fetchAll(PDO::FETCH_ASSOC);

function add_to_api_data($table){
  $req = Core::$bdd->prepare("SELECT * FROM $table");
  $req->execute(array());

  $data[$table] = $req->fetchAll(PDO::FETCH_ASSOC);
  return $data[$table];
};

$data["skill"]=add_to_api_data('skill');
$data["class"]=add_to_api_data('class');
$data["character"]=add_to_api_data("character");
$data["character_stat"]=add_to_api_data("character_stat");
$data["master"]=add_to_api_data("master");


$myJSON = json_encode($data);

echo $myJSON;
 
 ?>
