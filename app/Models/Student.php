<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'lastname',
        'school_id',
        'birthdate',
        'hometown'
    ];

    // Un estudiante pertenece a una escuela
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }
}
