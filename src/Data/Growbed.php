<?php

namespace Aquaponics\data;

class Growbed {
  public $time;
  public $timestamp;
  public $baropres;
  public $barotemp;
  public $barohumi;
  public $gasoxid;
  public $gasredu;
  public $gasnh3;
  public $lux;
  public $uva;
  public $uvb;
  public $uvi;

  public function setData($property, $value) {
    $property = strtolower($property);
    if (is_numeric($property)) {
      return;
    }
    $this->$property = $value;
  }

  public function getValues() {
    return [$this->timestamp, (float) $this->barotemp, (float) $this->barohumi, (float) $this->gasoxid, (float) $this->gasnh3];
  }
}
