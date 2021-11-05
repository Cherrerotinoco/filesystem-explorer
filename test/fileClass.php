<?php

class Folder {
  
  function __construct($name) {
    $this->name = $name;
  }

  function create($destination) {
    
    $pathName = $destination.$this->name; 

    # Checks if directory already exists
    if (is_dir($pathName)) {
      die('Folder already created');
    }
    
    # Create file
    //mkdir("D:\\Usuario\\Escritorio\\dev-assembler\\filesystem-explorer\\test\"$pathName");
    
  }


}