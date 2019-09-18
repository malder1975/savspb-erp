<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
   protected $table = 'KLIENT';
   protected $primaryKey = 'KLIENT_ID';

    protected $fillable =
        [
            'KLIENT_KOD', 'NAME', 'ORG_ID', 'GRAPH', 'FSALER_ID', 'KL_CITY', 'KL_ADR', 'KL_REPRESENT', 'KL_TEL', 'KL_FAX', 'KL_EMAIL', 'KL_BANK', 'KL_KS',
            'KL_RS', 'KL_BIK', 'KL_INN', 'KL_KPP', 'KL_OKPO', 'KL_OKNH', 'KL_NOTE', 'PREMIUM', 'KOMPENS', 'TRANSP'
        ];

    public function org()
    {
        return $this->belongsTo('App\Models\Organisations', 'ORG_ID', 'ORG_ID');
    }

    public function merchandises()
    {
        return $this->belongsTo('App\Models\Merchandises', 'FSALER_ID', 'FSALER_ID');
    }

    public function supprlist()
    {
        return $this->hasManyThrough('App\Models\SupPricelist', 'KLIENT_ID', 'KLIENT_ID');
    }

    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }

    public function getSuppliers()
    {
        /*$suppliers = Suppliers::where(['KLIENT.POST' => 1, 'KLIENT.FDEL' => 0])->
       join('ORG', 'KLIENT.ORG_ID', '=', 'ORG.ORG_ID')->
       join('FSALER', 'KLIENT.FSALER_ID', '=', 'FSALER.FSALER_ID')->
       select('KLIENT.*', 'ORG.ORG_NAME')->
       orderBy('KLIENT.NAME', 'ASC')->selectRaw('KLIENT_ID, KLIENT_KOD, NAME, ORG.ORG_ID AS ORG_ID, ORG.ORG_NAME,
                                                 GRAPH, FSALER.FSALER_ID AS FSALER_ID, FSALER.FSALER_NAME,
                                                 KL_CITY, KL_ADR, KL_REPRESENT, KL_TEL, KL_FAX, KL_EMAIL,
                                                 KL_BANK, KL_KS, KL_RS, KL_BIK, KL_INN, KL_KPP, KL_OKPO,
                                                 KL_OKONH, KL_NOTE, PREMIUM')->get();
        /*$suppliers = $this::where([['KLIENT.KLIENT_ID', '>', 1], ['KLIENT.FDEL', '=', 0]])->
        join('ORG', 'KLIENT.ORG_ID', '=', 'ORG.ORG_ID')->
        join('FSALER', 'KLIENT.FSALER_ID', '=', 'FSALER.FSALER_ID')->
        select('KLIENT.*', 'ORG.ORG_NAME', 'FSALER.FSALER_NAME')->
        orderBy('KLIENT.NAME', 'ASC')->selectRaw('KLIENT_KOD, NAME, ORG.ORG_ID AS ORG_ID, ORG.ORG_NAME,
                                                 GRAPH, FSALER.FSALER_ID AS FSALER_ID, FSALER.FSALER_NAME,
                                                 KL_CITY, KL_ADR, KL_REPRESENT, KL_TEL, KL_FAX, KL_EMAIL,
                                                 KL_BANK, KL_KS, KL_RS, KL_BIK, KL_INN, KL_KPP, KL_OKPO,
                                                 KL_OKONH, KL_NOTE, PREMIUM')->get();*/

        //return $this->$suppliers; //response()->json($suppliers, 200);
    }
}
