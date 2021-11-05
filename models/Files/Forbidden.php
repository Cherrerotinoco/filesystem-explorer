<?php


class ForbiddenFile extends Files{

  protected $fileType="denied";
  protected $extArray=["exe", "ogg"];

  public function __construct($id, $name, $dirName, $size){

    parent :: __construct($id, $name, $dirName, $size, $this->fileType, $this->extArray);

  }

  public function errorFileForbidden(){
    # what we do in this case?
  }

}