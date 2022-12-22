<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;



class Provinces extends Model
{
    use HasFactory;
    protected $collection = 'provinces';
    protected $fillable = [
        'name', 'image'
    ];
}
