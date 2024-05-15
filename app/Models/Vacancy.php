<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $table ='vacancies';
    protected $fillable = [
        'title',
        'requirements',
        'is_publish',
        'start_date',
        'end_date'
    ];

    protected $casts = [
        'is_publish' => 'boolean'
    ];

}
