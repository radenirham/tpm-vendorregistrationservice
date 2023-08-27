<?php

namespace App\Models\MasterReference;

use App\Models\BaseModel;

class City extends BaseModel
{
    protected $table = 'master.ref_city';
    protected $primaryKey = 'city_id';

    public static function getModels()
    {
        return static::get();
        // return static::whereNotNull('city_province_code')->orderBy('city_name', 'ASC')->get()
        //     ->map(function ($model) {
        //         $model->childs = static::where('city_province_code', $model->city_province_code)->orderBy('city_name', 'ASC')->get();
        //         return $model;
        //     })->all();
    }
}