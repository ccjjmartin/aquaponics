<?php

namespace Aquaponics\data;

class Monitor {
  public $time;
  public $timestamp;
  public $temptank;
  public $tempbed;
  public $tempsump;
  public $lvlsump;

  public function setData($property, $value) {
    $property = strtolower($property);
    if (is_numeric($property)) {
      return;
    }
    $this->$property = $value;
  }

  public function getValues() {
    return [$this->timestamp, (float) $this->temptank];
  }
}
