<?php


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