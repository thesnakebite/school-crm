<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class School extends Model
{
    /** @use HasFactory<\Database\Factories\SchoolFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'logo',
        'email',
        'phone',
        'website'
    ];

    // Una escuela tiene muchos estudiantes
    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
