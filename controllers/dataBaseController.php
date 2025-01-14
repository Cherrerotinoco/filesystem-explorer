<?php

#controlador bdd
require ("./config/constants.php");

use FFI\Exception;

class Db {

  protected $jsonUrl;

  public function __construct($jsonUrl=JSON_FILES)
  {
    $this->jsonUrl=$jsonUrl;
  }

  public function getJsonUrl(){
    return $this->jsonUrl;
  }
  public function setJsonUrl($newUrl){
    $this->jsonUrl=$newUrl;
  }

  # Get JSON
  public function getEntries() {
    $json = file_get_contents($this->jsonUrl);
    return json_decode($json, true);
  }

  # Update JSON
  public function setEntries($data) {
    $jsonEntry = json_encode($data);
    return file_put_contents($this->jsonUrl, $jsonEntry);
  }

  # Generate new unique ID
  public function generateUniqueId() {

    $data = $this->getEntries();

    $lastKey = array_key_last($data);
    return $lastKey + 1;
  }

  # Create new entry
  public function createNewEntry(array|object $entry) {

    if ($entry === null) return new Exception('Expected object');

    if (gettype($entry) === "object") $entry = (array)$entry;

    # Clean entry array
    $cleanEntry = [];
    foreach ($entry as $key => $entryValues) {
      $key = filter_var($key, FILTER_SANITIZE_URL);
      $cleanEntry[$key] = $entryValues;
    }

    # Get JSON
    $data = $this->getEntries();

    # Generate new unique ID
    $newKey = array_key_last($data);

    # Encode JSON with new object
    $data[$newKey] = $cleanEntry;
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
