<?php

namespace App\Models\MasterReference;

use App\Models\BaseModel;

class SupplierCategory extends BaseModel
{
    protected $table = 'master.ref_supplier_categories';
    protected $primaryKey = 'supplier_category_id';

    const OPTIONS_SUPPLIER_CATEGORIES = [
        ['value' => 1, 'label' => 'Pengadaan Barang'],
        ['value' => 2, 'label' => 'Jasa Konsultan'],
        ['value' => 3, 'label' => 'Pekerjaan Konstruksi'],
        ['value' => 4, 'label' => 'Jasa Lainnya']
    ];

    public static function getModels()
    {
        return static::get();
    }
}