<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pricelist extends Model
{
    protected $table = 'PR_LIST';
    protected $primaryKey = 'PR_LIST_ID';

    protected $fillable = [
        'ART', 'NAME', 'PRICE1', 'PRICE2', 'PRICE3', 'NOTE', 'UNIT'
    ];

    public function kards()
    {
        return $this->hasManyThrough('App\Models\Karta', 'PR_LIST_ID', 'PR_LIST_ID');
    }

    public function suppliers()
    {
        return $this->belongsTo('App\Models\Suppliers', 'KLIENT_ID', 'KLIENT_ID');
    }
}
