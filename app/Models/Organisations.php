<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organisations extends Model
{
    protected $table = 'ORG';
    protected $primaryKey = 'ORG_ID';

    protected $fillable =
        [
          'ORG_NAME', 'ORG_FULL_NAME', 'SHORT_NAME', 'ORG_ADDRESS', 'ORG_INN', 'ORG_KPP', 'BIK', 'R_ACC', 'K_ACC', 'BANK',
            'OKPO', 'OKNH', 'F_NDS', 'NDSPROC', 'F_KASSA', 'F_OPT', 'GENDIR', 'GLAVBUH', 'ORG_PHONE'
        ];

    public function suppliers()
    {
        return $this->hasManyThrough('App\Models\Suppliers', 'ORG_ID', 'KLIENT_ID');
    }

    public function customers()
    {
        return $this->hasManyThrough('App\Models\Customers', 'ORG_ID', 'KLIENT_ID');
    }

    public function inetAccounts()
    {
        return $this->hasManyThrough('App\Models\InetAcc', 'ORG_ID', 'ACCPREDOPL1_ID');
    }
}
