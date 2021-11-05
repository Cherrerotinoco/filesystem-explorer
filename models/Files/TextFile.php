<?php


class TextFile extends Files{

  protected $fileType="text";
  protected $extArray=["txt"];

  public function __construct($id, $name, $dirName, $size){


    parent :: __construct($id, $name, $dirName, $size, $this->fileType, $this->extArray);

  }

  #edition of txt methods from php


}