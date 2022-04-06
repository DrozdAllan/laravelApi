<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $primaryKey = 'slug';
    public $incrementing = false;
    protected $keyType = 'string';
    //    protected $fillable = ['original_title', 'synopsis', 'release_date', 'poster'];
    //    or
    protected $guarded = [];
}
