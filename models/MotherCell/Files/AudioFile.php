<?php


class AudioFile extends Files{

  protected $autoplay;
  protected $controls;
  protected $fileType="audio";
  protected $extArray=["mp3", "ogg"];

  public function __construct($id, $name, $dirName, $size, bool $controls=true, bool $autoplay=false){

    $this->autoplay=$autoplay;
    $this->controls=$controls;

    parent :: __construct($id, $name, $dirName, $size, $this->fileType, $this->extArray);

  }

  public function getAudioAutoplay(){
    return $this->autoplay;
  }
  public function setAudioAutoplay(bool $newValue){
    $this->autoplay=$newValue;
  }

  public function getAudioControls(){
    return $this->controls;
  }
  public function setAudioControls(bool $newValue){
    $this->controls=$newValue;
  }

}