<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merchandises extends Model
{
    protected $table = 'FSALER';
    protected $primaryKey = 'FSALER_ID';

    protected $fillable = ['FSALER_NAME'];

    public function suppliers()
    {
        return $this->hasManyThrough('App\Models\Suppliers', 'FSALER_ID', 'FSALER_ID');
    }

    public function customers()
    {
        return $this->hasManyThrough('App\Models\Customers', 'FSALER_ID', 'FSALER_ID');
    }
}
