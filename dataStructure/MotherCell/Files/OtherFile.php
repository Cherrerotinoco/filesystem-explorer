<?php


class OtherFile extends Files{

  protected $fileType="otherFile";
  protected $extArray=["pdf", "doc", "xml"];

  public function __construct($id, $name, $dirName, $size){

    parent :: __construct($id, $name, $dirName, $size, $this->fileType, $this->extArray);

  }

  public function fileOpenInBrowser(){
    # how to open file
  }

}