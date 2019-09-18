<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupPriceList extends Model
{
    protected $table = 'SUP_PRLIST';
    protected $primaryKey = 'SUP_PRLIST_ID';

    protected $fillable = [
        'KLIENT_ID', 'DAT', 'PROD_TIME', 'DURATION_UNITS', 'COMENT', 'DAT_END', 'PROD_TYPE', 'SUP_PRLIST_NAME', 'TYPE_PR', 'ZAK_KITCHEN'
    ];

    public function supl()
    {
        return $this->belongsTo('App\Models\Suppliers', 'KLIENT_ID', 'KLIENT_ID');
    }
}
