<?php

namespace Aquaponics\data;

class Growbed {
  public $time;
  public $timestamp;
  public $baropres;
  public $barotemp;

  public function setData($property, $value) {
    $property = strtolower($property);
    if (is_numeric($property)) {
      return;
    }
    $this->$property = $value;
  }

  public function getValues() {
    return [$this->timestamp, (float) $this->baropres, (float) $this->barotemp];
  }
}
