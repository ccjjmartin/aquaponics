<?php

namespace Aquaponics\factory;

use \Aquaponics\Database\Aquaponics;
use \Aquaponics\Data\Monitor;

class MonitorFactory {

  private $dataRaw;
  private $dataProcessed;

  public function getData() {
    $database = new Aquaponics();
    $connection = $database->connection;
    $stmt = $connection->prepare("SELECT TimeStamp, TempTank FROM Monitor ORDER BY TimeStamp DESC LIMIT 100");
    $stmt->execute();

    // set the resulting array to associative
    $this->dataRaw = $stmt->fetchAll();
  }

  public function prepareData() {
    foreach ($this->dataRaw as $row) {
      $monitor = new Monitor;
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
