<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'birthday',
        'university_name',
        'major',
        'graduating_year',
        'cv_path'
    ];
    
}
