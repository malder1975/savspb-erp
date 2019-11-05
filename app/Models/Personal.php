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
        return $this->belongsToMany(Levels::class)->withTimestamps();
    }

    public function hasLevel($level)
    {
        if ($this->levels()->where('LEVELS_ID', '=', $level)->first()) {
            return true;
        }
        return false;
    }

    public function authorizeLevels($levels)
    {
        if ($this->hasAnyLevels($levels)) {
            return true;
        }
        abort(401, 'Отсутствуют необходимые права для доступа');
    }

    public function hasAnyLevels($levels)
    {
        if (is_array($levels)) {
            foreach ($levels as $level) {
                if ($this->hasLevel($level)) {
                    return true;
                }
            }
        } else {
            if ($this->hasLevel($levels)) {
                return true;
            }
        }
        return false;
    }

    public function isSuperAdmin()
    {
        return (boolean)$this->levels()->where('LEVELS_ID', '=', 100)->count();
        //return (boolean)$this->levels()->where('NAME', '=', 'Supervisor')->count();
    }
}
