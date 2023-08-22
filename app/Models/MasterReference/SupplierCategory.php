<?php

namespace App\Models\MasterReference;

use App\Models\BaseModel;

class SupplierCategory extends BaseModel
{
    protected $table = 'master.ref_supplier_categories';
    protected $primaryKey = 'supplier_category_id';

    public static function getModels()
    {
        return static::get();
    }
}