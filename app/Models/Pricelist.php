<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pricelist extends Model
{
    protected $table = 'PR_LIST';
    protected $primaryKey = 'PR_LIST_ID';

    protected $fillable = [
        'ART', 'NAME', 'PRICE1', 'PRICE2', 'PRICE3', 'NOTE', 'UNIT', 'USERID', 'S_ASSEMBLING', 'S_DISMANTLING', 'TARIFF_ASM_ID',
            'S_ASM', 'S_DASM', 'TARIFF_WARP_ID', 'S_WARP', 'R_LENGTH', 'R_DEPTH', 'R_HEIGHT', 'TYPE_SIZE', 'FULL_LENGTH', 'FULL_WIDTH',
        'FASM_HAND', 'CONFIG', 'FLIKV', 'MATR_CLASS_ID'
    ];

    public function kards()
    {
        return $this->hasManyThrough('App\Models\Karta', 'PR_LIST_ID', 'PR_LIST_ID');
    }

    public function suppliers()
    {
        return $this->belongsTo('App\Models\Suppliers', 'KLIENT_ID', 'KLIENT_ID');
    }

    public function tarifAsm()
    {
        return $this->belongsTo('App\Models\DictTarifAsm', 'TARIFF_ASM_ID', 'TARIFF_ASM_Wa');
    }

    public function tarifWarp()
    {
        return $this->belongsTo('App\Models\DictTariffWarp', 'TARIFF_WARP_ID', 'TARIFF_WARP_ID');
    }

}
