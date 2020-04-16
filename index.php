<?php
session_start();
include("header.php");

if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]===TRUE){
  header ("location: welcome.php");
  exit();
}
require_once "config.class.php";
include("register.php");
