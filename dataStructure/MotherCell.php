<?php

class MotherCell implements bdd {

  protected $id; #unico y requerido
  protected $name;
  protected $dirName;
  protected $creationDate;
  protected $modificationDate;
  protected $size;

  // id from bdd controller. GetNextId
  public function __construct($id, $name, $dirName, $size)
  {
      $this->id= $id;
      $this->name = $name;
      $this->dirName = $dirName;
      $this->creationDate= time();
      $this->size= $size;
  }

  public function getId(){
    return $this->id;
  }
  public function setId($id){
    $this->id=$id;
  }

  public function getName(){
    return $this->name;
  }
  public function setName($name){
    $this->name=$name;
  }

  public function getDirName(){
    return $this->dirName;
  }
  public function setDirName($dirName){
    $this->dirName=$dirName;
    $this->modificationDate=time();
  }

  public function getCreationDate(){
    return $this->creationDate;
  }
  public function setCreationDate($newCreationDate){
    $this->creationDate=$newCreationDate;
  }

  public function getModificationDate(){
    return $this->modificationDate;
  }
  public function setModificationDate($newModificationDate){
    $this->modificationDate=$newModificationDate;
  }

  public function getSize(){
    return $this->size;
  }
  public function setSize($newSize){
    $this->size=$newSize;
  }




  public function deleteFromDrive(){
    #to delete its to delete files, call de dbb controller
  }

  public function renameItem($newName){
    #rename file name
    $this->name=$newName;
    $this->modificationDate=time();
  }




}





