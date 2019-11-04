<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warehouses extends Model
{
    protected $table = 'WAREHOUSE';
    protected $primaryKey = 'WAREHOUSE_ID';
    protected $fillable = ['WAREHOUSE_NAME', 'FHALL', 'FWHD', 'FDEL', 'NUM', 'WAREHOUSER_NAME'];

    public $timestamps = false;
}
