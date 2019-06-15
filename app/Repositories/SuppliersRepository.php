<?php


namespace App\Repositories;

use App\Repositories\Interfaces\SuppliersInterface as SuppliersInterface;
use Illuminate\Database\Eloquent\Model;
use App\Models\Suppliers;


class SuppliersRepository implements SuppliersInterface
{
    protected $model;
    public  $suppliers;



}