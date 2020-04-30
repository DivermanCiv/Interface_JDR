<?php
require_once("../class/core.class.php");
header("Content-Type: application/json; charset=UTF-8");
$api = new Core;
$data = array();

$req = Core::$bdd->prepare("SELECT * FROM class, skill");
$req->execute(array());

$data["data"] = $req->fetchAll(PDO::FETCH_ASSOC);

$myJSON = json_encode($data);

echo $myJSON;


 ?>
