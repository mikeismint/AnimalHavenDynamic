<?php

class AnimalType {

  /**** PROPERTIES ****/
  public $id          = null;
  public $description = null;


  public function __construct( $data=array() ) {
    if (isset($data['id']))          $this->id          = (int)$data['id'];
    if (isset($data['description'])) $this->description = $data['description'];
  } // function __construct


  public function insert() {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );

    $sql = "INSERT INTO AnimalTypes (description) VALUES (:description)";
    $st = $conn->prepare($sql);

    $st->bindValue(':description', $this->description, PDO::PARAM_STR);

    $st->execute();
    $this->id = $conn->lastInsertId();
    $conn = null;
  } // function insert


  public function update( $id ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );

    $sql = "UPDATE AnimalTypes SET description=:description WHERE id=:id";
    $st = $conn->prepare($sql);

    $st->bindValue(':id', $this->id, PDO::PARAM_INT);
    $st->bindValue(':description', $this->description, PDO::PARAM_STR);

    $st->execute();
    $conn = null;
  } // function update


  public function delete( $id ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );

    $sql = "DELETE FROM AnimalTypes WHERE id=:id";
    $st = $conn->prepare($sql);

    $st->bindValue(':id', $this->id, PDO::PARAM_INT);
    $st->execute();

    $conn = null;
  } // function delete


  public static function getById( $id ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );

    $sql = "SELECT * FROM AnimalTypes WHERE id = :id";
    $st = $conn->prepare($sql);
    $st->bindValue(':id', $id, PDO::PARAM_INT);
    $st->execute();

    $row = $st->fetch();
    $conn = null;

    if ( $row ) {
      return new AnimalType( $row );
    }
  } // function getById


  public static function getList() {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );

    $sql = "SELECT * FROM AnimalTypes";
    $st = $conn->prepare($sql);
    $st->execute();

    $result = array();
    while( $row = $st->fetch() ) {
      $AnimalType = new AnimalType($row);
      $result[] = $AnimalType;
    }

    $conn = null;

    return $result;
  } // function getList

} // END CLASS

?>
