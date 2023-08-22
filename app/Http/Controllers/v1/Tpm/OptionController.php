<?php

namespace App\Http\Controllers\v1\Tpm;

use App\Http\Controllers\v1\ApiController;
use App\Models\MasterReference\CompanyType;
use App\Models\MasterReference\SupplierCategory;
use App\Models\Tpm\PreVendor;
use Illuminate\Http\Request;

class OptionController extends ApiController
{
    public function getVendorAreas(Request $request)
    {
        $this->startProcess($request, 'GET');

        return $this->output(true, 'Data berhasil ditampilkan', PreVendor::OPTIONS_VENDOR_AREA);
    }

    public function getSupplierCategories(Request $request)
    {
        $this->startProcess($request, 'GET');

        return $this->output(true, 'Data berhasil ditampilkan', SupplierCategory::getModels());
    }

    public function getCompanyType(Request $request)
    {
        $this->startProcess($request, 'GET');

        return $this->output(true, 'Data berhasil ditampilkan', CompanyType::getModels());
    }


}