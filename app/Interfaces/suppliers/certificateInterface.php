<?php
namespace App\Interfaces\suppliers;

interface certificateInterface{
  public function getCertificate($company,$uuid);
}