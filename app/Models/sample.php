<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sample extends Model
{
    use HasFactory;

    public function bloodtype(){
        return $this->hasOne(blood_type::class, 'id', 'blood_type_id');
    }

}
