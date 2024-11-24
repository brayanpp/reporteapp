<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    // Atributos rellenables
    protected $fillable = [
        'title',
        'description',
        'location',
        'latitude',
        'longitude',
        'priority',
        'type',
        'status',
        'photo_path',
    ];
}
