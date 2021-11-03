<?php

#controlador bdd

use FFI\Exception;

class Db {
  
  public $jsonUrl = '../data.json';

  protected $entryId;
  
  # Get JSON
  function getEntries() {
    $json = file_get_contents($this->jsonUrl);
    return json_decode($json, false); 
  }

  # Update JSON
  function setEntries($data) {
    $jsonEntry = json_encode($data);
    return file_put_contents($this->jsonUrl, $jsonEntry);
  }

  # Create new entry
  public function createNewEntry(array $entry) {

    if ($entry === null) return new Exception('Expected object'); 

    # Get JSON
    $data = $this->getEntries(); 

    # Generate new unique ID
    $lastKey = array_key_last($data);
    var_dump($lastKey);
    $newKey = $lastKey + 1;

    # Encode JSON with new object
    $data[$newKey] = $entry;
    return $this->setEntries($data);

  }

  # Read entry by ID
  public function getEntryById(int $entryId) {
    $data = $this->getEntries();
    return $data[$entryId];
  }

  # Update entry by ID
  public function updateEntryById(int $entryId, array $entryValues = []) {
    $data = $this->getEntries(); 
    $data[$entryId] = array_replace($data[$entryId], $entryValues);

    return $this->setEntries($data);
  }

  # Delete entry by ID
  public function deleteEntryById(int $entryId) {
    $data = $this->getEntries();
    unset($data[$entryId]);

    return $this->setEntries($data);
  }

}

$db = new Db();
/*
$db->deleteEntryById(1);

$db->updateEntryById(1, array("name" => 'Modified by method'));
$db->getEntryById(2);

*/
$db->createNewEntry(array(
  "type" => "image",
  "extension" => "jpg", 
  "name" => "example",
  "size" => "12kb",
  "dirname" => "root",
  "creationDate" => time(),
  "modificationDate" => time()
));