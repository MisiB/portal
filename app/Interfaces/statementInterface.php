<?php

namespace App\Interfaces;

interface statementInterface{
    public function getStatement($company);

    public function getBalance($company,$type,$currency);

}