<?php

namespace App\Models\MasterReference;

use App\Models\BaseModel;

class Province extends BaseModel
{
    protected $table = 'master.ref_province';
    protected $primaryKey = 'province_id';

    public static function getModels()
    {
        return static::get();
    }
}