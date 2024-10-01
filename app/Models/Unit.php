<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unit extends Model
{
    use HasFactory;

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
        //by default laravel uses "snake case" naming conventions, so Eloquent will automatically assume the 
        //foreign key column on the Student model is unit_id.

        //if the foreign key is not unit_id u can use:
        //return $this->hasMany(Student::class, 'foreign_key');
    }

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
