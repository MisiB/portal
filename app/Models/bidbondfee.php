<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class bidbondfee extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    protected $guarded=[];

    public function currency(){
        return $this->hasOne(currency::class,'id','currency_id');
    }

    public function user(){
        return $this->hasOne(administrator::class,'id','user_id');
    }
}
