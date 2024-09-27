<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        "type",
        "make",
        "model",
        "year",
        "fuel-type",
        "body-type",
        "variant-t",
        "imagePath"
    ];
}
