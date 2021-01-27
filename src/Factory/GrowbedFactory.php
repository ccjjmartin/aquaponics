<?php

namespace Aquaponics\Factory;

use \Aquaponics\Database\Aquaponics;
use \Aquaponics\Data\Growbed;

class GrowbedFactory {
  private $dataRaw;
  private $dataProcessed;

  public function getData() {
    $database = new Aquaponics();
    $connection = $database->connection;
    $stmt = $connection->prepare("SELECT TimeStamp, BaroTemp, BaroHumi, GasOxid, GasNH3 FROM GrowBed ORDER BY TimeStamp DESC LIMIT 6");
    $stmt->execute();

    // set the resulting array to associative
    $this->dataRaw = $stmt->fetchAll();
  }

  public function prepareData() {
    foreach ($this->dataRaw as $row) {
      $monitor = new Growbed;
      foreach ($row as $column => $value) {
        $monitor->setData($column, $value);
      }
      $this->dataProcessed[] = $monitor;
    }
  }

  public function formatData() {
    $output = '';
    foreach ($this->dataProcessed as $monitor) {
      $rows[] = $monitor->getValues();
    }
    $output = json_encode($rows);
    return $output;
  }
}
