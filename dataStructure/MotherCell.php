<?php

class MotherCell {

  protected $id; #unico y requerido
  protected $name;
  protected $dirName;
  protected $creationDate;
  protected $modificationDate;
  protected $size;


  public function __construct($name, $dirName, $size)
  {
      $this->id=
      $this->name = $name;
      $this->dirName = $dirName;
      $this->creationDate= time();
      $this->size= $size;
  }

  public function getId(){

    return $this->id;
  }
  public function getName(){

    return $this->name;
  }

  public function getDirName(){

    return $this->dirName;
  }


  public function deleteFromDrive(){
    #to delete its to delete files
  }

  public function rename($newName){
    #rename file name
    $this->name=$newName;
  }

  public function storeInBdd(){


    #guarda el id en la bdd en el json

  }


}





