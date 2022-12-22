<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RadioStation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'band',
        'country',
        'genres'
    ];

    public $timestamps = false;
}

