<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karta extends Model
{
    protected $table = 'KARTA';
    protected $primaryKey = 'KARTA_ID';

    protected $fillable = [
        'KLIENT_ID', 'PR_LIST_ID', 'NDOK', 'DATA_DOK', 'KOL', 'PRICE_IN', 'PRICE_OUT', 'UCENKA', 'PRICE_TYPE_ID', 'FLIKV'
    ];

    public function priceList()
    {
        return $this->belongsTo('App\Models\Pricelist', 'PR_LIST_ID', 'PR_LIST_ID');
    }

    public function Suppler()
    {
        return $this->belongsTo('App\Models\Suppliers', 'KLIENT_ID', 'KLIENT_ID');
    }

    public function inetAccGoods()
    {
        return $this->belongsToMany('App\Models\InetAccGoods', 'ACCPREDOPL2', 'KARTA_ID', 'KARTA_ID');
    }
}
