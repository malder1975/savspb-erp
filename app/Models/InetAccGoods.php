<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InetAccGoods extends Model
{
    protected $table = 'ACCPREDOPL2';
    protected $primaryKey = 'ACCPREDOPL2_ID';
    protected $fillable = ['ACCPREDOPL1_ID', 'KARTA_ID', 'WH_ID', 'SUMMA', 'USERID', 'KOL', 'MOVE2_ID', 'SALER_ID'];

    const CREATED_AT = 'DATA_MODIFY';
    const UPDATED_AT = 'DATA_MODIFY';

    public function kard()
    {
        return $this->belongsTo('App\Models\Karta', 'KARTA_ID', 'KARTA_ID');
    }

    public function warehouse()
    {
        return $this->belongsTo('App\Models\Warehouses', 'WH_ID', 'WAREHOUSE_ID');
    }
}
