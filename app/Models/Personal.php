<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use App\Models\Levels;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Personal extends Authenticatable implements JWTSubject
{
    use Notifiable;


    protected $table = 'PERSONAL';
    protected $primaryKey = 'PERSONAL_ID';


    protected $fillable = [
        'FAM', 'PASS', 'email', 'LEVELS_ID'
    ];

    protected $hidden = [
        'PASS', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'DATETIME'
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function getAuthPassword()
    {
        return $this->PASS;
    }

    public function getJWTAuthPassword()
    {
        return $this->PASS;
    }

    public function levels()
    {
        return $this->belongsToMany(Levels::class);
    }

    public function isSuperAdmin()
    {
        return (boolean)$this->levels()->where('LEVELS_ID', '=', 100)->count();
        //return console.log()
        //return (boolean)$this->levels->where('NAME', 'Supervisor')->count();
    }
}
