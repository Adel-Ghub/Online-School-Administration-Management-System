<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'grade', 'subject', 'school_id'
    ];

    public function school(){
        return $this->belongsTo(School::class);
    }
}
