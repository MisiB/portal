<?php
namespace App\Interfaces;

use Illuminate\Http\Request;
use App\Models\company;

interface paynowInterface{
    public function initiate();

    public function check();

    public function check_by_id($id,company $company);

    public function getList($company);

}