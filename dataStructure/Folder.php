<?php
class Folder extends MotherCell{

  protected $fileType = "folder";
  protected $childItemsIds = array();

  public function __construct($id, $name, $dirName, $size){
    parent :: __construct($id, $name, $dirName, $size);
  }

  public function getFileType(){
    return $this->fileType;
  }

  public function getChildItemsIds(){
    return $this->childItemsIds;
  }
  public function setChildItemsIds($newArray){
    $this->childItemsIds=$newArray;
  }

  #metodo que me guarde todos us childs con sus id

  public function setNewChildInFolder($id){
    $updatedChildsArray=$this->getChildItemsIds();
    array_push($updatedChildsArray, $id);
    #CALL BDDD CONTROLLER TO update it in JSON
  }

  public function removeChildFromFolder($id){
    $updatedChildsArray=$this->getChildItemsIds();
    // get the index of the id
    $keyIdToRemove=array_search($updatedChildsArray, $id);

    unset($updatedChildsArray[$keyIdToRemove]);

    $this->setChildItemsIds($updatedChildsArray);

    #CALL BDDD CONTROLLER TO update it in JSON
    #update child

  }

}