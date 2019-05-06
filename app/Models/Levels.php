<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Personal;

class Levels extends Model
{
    protected $fillable = [
        'NAME', 'NOTE'
    ];

    public $timestamps = false;

    public function personal()
    {
<<<<<<< HEAD
        return $this->hasMany(Personal::class);
=======
        return $this->belongsToMany(Personal::class);
>>>>>>> origin/master
    }
}
