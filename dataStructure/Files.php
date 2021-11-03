<?php

class Files extends MotherCell{

  protected $fileType = "";
  protected $extArray = array();

  public function __construct($id, $name, $dirName, $size, $newFileType, $extArray){
    parent :: __construct($id, $name, $dirName, $size);
    $this->fileType=$newFileType;
    $this->extArray=$extArray;
  }

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

}



class ImageFile extends Files{

  protected $altString="";

  public function __construct($id, $name, $dirName, $size, $newFileType, $newExtArray, $altString){
    parent :: __construct($id, $name, $dirName, $size,$newFileType, $newExtArray);
    $this->altString=$altString;
  }

  public function getAltAttr(){
    return $this->altString;
  }
  public function setAltAttr($string){
    $this->altString=$string;
  }

}