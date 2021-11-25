<?php

class Files extends MotherCell implements MotherCellInterface{

  protected $fileType ;
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
  public function renderFile()
  {
    return;
  }
  public function editFile()
  {
    return;
  }
}

