<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
   protected $table = 'KLIENT';
   protected $primaryKey = 'KLIENT_ID';

    protected $fillable =
        [
            'KLIENT_KOD', 'NAME', 'KL_CITY', 'KL_ADR', 'KL_REPRESENT', 'KL_TEL', 'KL_FAX', 'KL_EMAIL', 'KL_BANK', 'KL_KS',
            'KL_RS', 'KL_BIK', 'KL_INN', 'KL_KPP', 'KL_OKPO', 'KL_OKNH', 'KL_NOTE', 'PREMIUM', 'KOMPENS', 'TRANSP'
        ];

    public function org()
    {
        return $this->belongsTo('App\Models\Organisations', 'ORG_ID', 'ORG_ID');
    }

    public function merchandises()
    {
        //
    }
}
