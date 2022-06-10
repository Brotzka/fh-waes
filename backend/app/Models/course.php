<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;

    public function teacher(){

        return $this->belongsTo(App\Models\User::class, 'teacher_id');
    }
}

   
