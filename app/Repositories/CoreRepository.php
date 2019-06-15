<?php


namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;


class CoreRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
}