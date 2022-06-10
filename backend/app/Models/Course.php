<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['teacher_id','name', 'description', 'start_date', 'end_date'];

    public function teacher()
    {
        return $this->belongsTo(App\Models\User::class, 'teacher_id');
    }
}

   
