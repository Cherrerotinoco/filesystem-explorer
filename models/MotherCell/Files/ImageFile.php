<?php


class ImageFile extends Files{

  protected $altString="";
  protected $imageType="img";
  protected $extArray=["jpg", "png"];

  public function __construct(int $id, $name, $dirName, $size, string $altString=""){

    parent :: __construct($id, $name, $dirName, $size, $this->imageType, $this->extArray);
    $this->altString=$altString;
  }

  public function getAltAttr(){
    return $this->altString;
  }
  public function setAltAttr($string){
    $this->altString=$string;
  }

}