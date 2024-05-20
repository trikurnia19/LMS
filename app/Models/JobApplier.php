<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Spatie\Permission\Traits\HasRoles;

class JobApplier extends Model
{
    use HasFactory, HasRoles;

    protected $guard_name = 'web';


    protected $fillable = [
        'name',
        'address',
        'birthday',
        'university_name',
        'major',
        'graduating_year',
        'cv_path'
    ];

    public function cv(): MorphOne {
        return $this->morphOne(Upload::class,'upload');
    }
    
}
