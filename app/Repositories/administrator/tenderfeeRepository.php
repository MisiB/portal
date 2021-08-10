<?php

namespace App\Repositories\administrator;

use App\Models\tenderfee;

class tenderfeeRepository{

    public function getList(){
        return tenderfee::get();
    }
}