<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InetAcc extends Model
{
    protected $table = 'ACCPREDOPL1';
    protected $primaryKey = 'ACCPREDOPL1_ID';
    protected $fillable = ['NUM', 'BUYER_NAME', 'FSTATE', 'ORG_ID', 'MOVE1_ID', 'S_US1', 'S_US2', 'S_US3', 'S_DELIV',
        'S_ASSEMB', 'S_WARP', 'S_GOOD', 'S_OPL', 'EMAIL'];

    const CREATED_AT = 'DAT';
    const UPDATED_AT = 'DATA_MODIFY';

    public function org()
    {
        return $this->belongsTo('App\Models\Organisations', 'ORG_ID', 'ORG_ID');
    }

}
