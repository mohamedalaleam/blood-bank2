<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blood_type_relation extends Model
{
    use HasFactory;

    public function bloodtype(){
        return $this->hasOne(blood_type::class, 'id', 'giveto_blood_id');
    }

}
