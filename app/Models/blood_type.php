<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blood_type extends Model
{
    use HasFactory;

    public function giveto(){
        return $this->hasMany(blood_type_relation::class, 'blood_type_id', 'id');
    }

}
