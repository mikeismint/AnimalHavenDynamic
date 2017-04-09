<?php

require_once('define.php');

$action = isset($_GET['action']) ? $_GET['action'] : "";

switch ($action) {
  case 'viewAnimal' :
    viewAnimal();
    break;
  case 'listAnimals' :
    listAnimals();
    break;
  default :
    homepage();
} // END switch


function viewAnimal () {
  if ( !(isset($_GET['animalId'])) || !$_GET['animalId'] ) {
    homepage();
    return;
  } // END if

  $assets = array();
  $assets['Animal'] = Animal::getById($_GET["animalId"]);
  $assets['AnimalType'] = AnimalType::getList();
  $assets['pageTitle'] = $assets['Animal']->name . " | Otterspool";
  $assets['sidebar'] = array( "animalTable.php", "adoptInfo.php" ); 
  require( VIEW_PATH . '/viewAnimal.php');
} // END function viewAnimal


function listAnimals() {
  $assets = array();
  $assets['Animals'] = Animal::getList($_GET['type']);
  $assets['AnimalType'] = AnimalType::getList();
  $assets['pageTitle'] = "Our Animals | Otterspool";
  $assets['sidebar'] = array( "adoptInfo.php" ); 
  require( VIEW_PATH . '/listAnimals.php');
} // END function listAnimals


function homepage() {
  $assets = array();
  $assets['AnimalType'] = AnimalType::getList();
  $assets['pageTitle'] = "Otterspool";
  require( VIEW_PATH . '/homepage.php');
} // END function homepage

?>
