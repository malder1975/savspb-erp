<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karta extends Model
{
    protected $table = 'KARTA';
    protected $primaryKey = 'KARTA_ID';

    protected $fillable = [

    ];

    public function priceList()
    {
        return $this->belongsTo('App\Models\Pricelist', 'PR_LIST_ID', 'PR_LIST_ID');
    }

    public function Suppler()
    {
        return $this->belongsTo('App\Models\Suppliers', 'KLIENT_ID', 'KLIENT_ID');
    }
}