<?php
namespace App\Repositories\administrator;

use App\Models\suspense;

class suspenseRepository{

    public function get_positive_balances($account){

    }

    public function get_by_account_user($user_id){

    }

    public function get_suspnse_entry($id){

        return suspense::whereid($id)->first();
    }
}