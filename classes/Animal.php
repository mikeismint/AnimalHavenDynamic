<?php

class Animal {

  /**** PROPERTIES ****/
  public $id      = null;
  public $name    = null;
  public $type    = null;
  public $age     = null;
  public $breed   = null;
  public $sex     = null;
  public $about   = null;
  public $status  = null;
  public $image   = null;
  public $video   = null;


  public function __construct( $data=array() ) {
    if (isset($data['id']))     $this->id     = (int)$data['id'];
    if (isset($data['name']))   $this->name   = $data['name'];
    if (isset($data['type']))   $this->type   = (int)$data['type'];
    if (isset($data['age']))    $this->age    = (int)$data['age'];
    if (isset($data['breed']))  $this->breed  = $data['breed'];
    if (isset($data['sex']))    $this->sex    = $data['sex'];
    if (isset($data['about']))  $this->about  = $data['about'];
    if (isset($data['status'])) $this->status = $data['status'];
    if (isset($data['image']))  $this->image  = $data['image'];
    if (isset($data['video']))  $this->video  = $data['video'];
  } //function __construct


  public function insert () {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    
    $sql = "INSERT INTO Animals (name, type, age, breed, sex, about, status, image, video)
            VALUES (:name, :type, :age, :breed, :sex, :about, :status, :image, :video)";
    $st = $conn->prepare($sql);

    $st->bindValue(':name',   $this->name,    PDO::PARAM_STR);
    $st->bindValue(':type',   $this->type,    PDO::PARAM_INT);
    $st->bindValue(':age',    $this->age,     PDO::PARAM_INT);
    $st->bindValue(':breed',  $this->breed,   PDO::PARAM_STR);
    $st->bindValue(':sex',    $this->sex,     PDO::PARAM_STR);
    $st->bindValue(':about',  $this->about,   PDO::PARAM_STR);
    $st->bindValue(':status', $this->status,  PDO::PARAM_STR);
    $st->bindValue(':image',  $this->image,   PDO::PARAM_STR);
    $st->bindValue(':video',  $this->video,   PDO::PARAM_STR);

    $st->execute();
    $this->id = $conn->lastInsertId();
    $conn = null;
  } // function insert


  public function update() {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );

    $sql= "UPDATE Animals 
          SET name=:name, type=:type, age=:age, breed=:breed, sex=:sex, 
              about=:about, status=:status, image=:image, video=:video
          WHERE id=:id";
    $st = $conn->prepare($sql);

    $st->bindValue(':id',     $this->id,      PDO::PARAM_INT);
    $st->bindValue(':name',   $this->name,    PDO::PARAM_STR);
    $st->bindValue(':type',   $this->type,    PDO::PARAM_INT);
    $st->bindValue(':age',    $this->age,     PDO::PARAM_INT);
    $st->bindValue(':breed',  $this->breed,   PDO::PARAM_STR);
    $st->bindValue(':sex',    $this->sex,     PDO::PARAM_STR);
    $st->bindValue(':about',  $this->about,   PDO::PARAM_STR);
    $st->bindValue(':status', $this->status,  PDO::PARAM_INT);
    $st->bindValue(':image',  $this->image,   PDO::PARAM_INT);
    $st->bindValue(':video',  $this->video,   PDO::PARAM_STR);

    $st->execute();
    $conn = null;
  } // function update


  public function delete( $id ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );

    $sql = "DELETE FROM Animals WHERE id = :id";
    $st = $conn->prepare($sql);
    $st->bindValue(':id', $id, PDO::PARAM_INT );
    $st->execute();
    $conn=null;
  } // function delete


  public static function getById( $id ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );

    $sql = "SELECT * FROM Animals WHERE id = :id";
    $st = $conn->prepare($sql);
    $st->bindValue(':id', $id, PDO::PARAM_INT);
    $st->execute();
    $row = $st->fetch();
    $conn = null;
    if ( $row ) {
      return new Animal( $row );
    }
  } // function getById


  public static function getList( $type=0 ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );

    $sql = "SELECT * FROM Animals";
    if( ($type = 0) ) {
      $sql .= " WHERE type = :type";
    }
    $st = $conn->prepare($sql);
    $st->bindValue( ':type', $type, PDO::PARAM_INT);
    $st->execute();

    $result = array();
    while( $row = $st->fetch() ) {
      $Animal = new Animal($row);
      $result[] = $Animal;
    }

    $conn = null;

    return $result;
  } // function getList

} // END CLASS

?>
