<?php
namespace App\Interfaces;

use Illuminate\Http\Request;

interface banktransactionsInterface{
    public function receive(Request $request);

    public function claim($referencenumber,$company);

    public function getList($company);
}