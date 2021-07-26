<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documents extends Model
{
    use HasFactory;

    protected  $guarded=[];

    public function company(){
        return $this->hasOne(company_documents::class,'document_id','id');
    }
}
