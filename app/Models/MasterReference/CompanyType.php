<?php

namespace App\Models\MasterReference;

use App\Models\BaseModel;

class CompanyType extends BaseModel
{
    protected $table = 'master.ref_company_types';
    protected $primaryKey = 'company_type_id';

    const OPTIONS_COMPANYTYPE = [
        ['value' => 1, 'label' => 'BUMN'],
        ['value' => 2, 'label' => 'Perseroan Terbatas (PT)'],
        ['value' => 3, 'label' => 'Perum'],
        ['value' => 4, 'label' => 'Swasta'],
        ['value' => 5, 'label' => 'Perseroan Terbatas (PT)'],
        ['value' => 6, 'label' => 'CV'],
        ['value' => 7, 'label' => 'Firma'],
        ['value' => 8, 'label' => 'KJPP'],
        ['value' => 9, 'label' => 'Perseorangan (Profesional)'],
        ['value' => 10, 'label' => 'Perseorangan (Sewa)'],
        ['value' => 11, 'label' => 'UMKM / Koperasi'],
        ['value' => 12, 'label' => 'Lembaga Pendidikan / Universitas'],
        ['value' => 13, 'label' => 'Yayasan'],
        ['value' => 29, 'label' => 'test'],
    ];

    public static function getModels()
    {
        return static::whereNull('company_type_parent_uuid')->orderBy('company_type_name', 'ASC')->get()
            ->map(function ($model) {
                $model->childs = static::where('company_type_parent_uuid', $model->company_type_uuid)->orderBy('company_type_name', 'ASC')->get();
                return $model;
            })->all();
    }
}