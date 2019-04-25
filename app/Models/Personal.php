<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Personal extends Authenticatable implements JWTSubject
{
    use Notifiable;


    protected $table = 'PERSONAL';
    protected $primaryKey = 'PERSONAL_ID';


    protected $fillable = [
        'LOGIN', 'PASS', 'EMAIL',
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
}
