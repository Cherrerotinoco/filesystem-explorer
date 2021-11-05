<?php


class VideoFile extends Files{

  protected $heigth;
  protected $width;
  protected $controls;
  protected $fileType="video";
  protected $extArray=["mp4", "ogg"];

  public function __construct($id, $name, $dirName, $size, $heigth, $width, bool $controls=true){

    $this->heigth=$heigth;
    $this->width=$width;
    $this->controls=$controls;

    parent :: __construct($id, $name, $dirName, $size, $this->fileType, $this->extArray);

  }

  public function getVideoHeight(){
    return $this->heigth;
  }
  public function setVideoHeight($newHeight){
    $this->heigth= $newHeight;
  }

  public function getVideoWidth(){
    return $this->width;
  }
  public function setVideoWidth($newWidth){
    $this->width= $newWidth;
  }

  public function getVideoControls(){
    return $this->controls;
  }
  public function setVideoControls(bool $newValue){
    $this->controls=$newValue;
  }

}