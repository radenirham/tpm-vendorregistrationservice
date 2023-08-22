<?php

namespace App\Models\MasterReference;

use App\Models\BaseModel;

class CompanyType extends BaseModel
{
    protected $table = 'master.ref_company_types';
    protected $primaryKey = 'company_type_id';

    public static function getModels()
    {
        return static::whereNull('company_type_parent_uuid')->orderBy('company_type_name', 'ASC')->get()
            ->map(function ($model) {
                $model->childs = static::where('company_type_parent_uuid', $model->company_type_uuid)->orderBy('company_type_name', 'ASC')->get();
                return $model;
            })->all();
    }
}