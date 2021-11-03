<?php

class Files extends MotherCell{

  protected $fileType = "";
  protected $extArray = array();

  public function getFileType(){
    return $this->fileType;
  }

  public function setFileType($newFileType){
    $this->fileType=$newFileType;
  }
  public function getExtArray(){
    return $this->extArray;
  }

  public function setExtArray($newExtArray){
    $this->extArray=$newExtArray;
  }

  public function __construct($id, $name, $dirName, $size, $newFileType, $newExtArray){
    parent :: __construct($id, $name, $dirName, $size);
    $this->getFileType();
    $this->getExtArray();
    $this->setFileType($newFileType);
    $this->setExtArray($newExtArray);
  }

}

class ImageFile extends Files{

  protected $altString="";

  public function __construct($id, $name, $dirName, $size, $newFileType, $newExtArray, $stringAlt){
    parent :: __construct($id, $name, $dirName, $size,$newFileType, $newExtArray);
    $this->setAltAttr($stringAlt);
  }

  public function getAltAttr(){
    return $this->altString;
  }

  public function setAltAttr($string){
    $this->altString=$string;
  }

}