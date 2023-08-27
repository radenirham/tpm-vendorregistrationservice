<?php

namespace App\Http\Controllers\v1\Tpm;

use App\Http\Controllers\v1\ApiController;
use App\Models\MasterReference\CompanyType;
use App\Models\MasterReference\Province;
use App\Models\MasterReference\City;
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

        return $this->output(true, 'Data berhasil ditampilkan', SupplierCategory::OPTIONS_SUPPLIER_CATEGORIES);
    }

    public function getCompanyType(Request $request)
    {
        $this->startProcess($request, 'GET');

        return $this->output(true, 'Data berhasil ditampilkan', CompanyType::OPTIONS_COMPANYTYPE);
    }

    
    public function getProvince(Request $request)
    {
        $this->startProcess($request, 'GET');
        $province = Province::getModels();
    
        $transformedProvince = $province->map(function ($category) {
            return [
                'value' => $category->province_id,
                'label' => $category->province_name,
            ];
        });
    
        $response = [
            "status" => true,
            "message" => "Data berhasil ditampilkan",
            "response" => $transformedProvince,
            "generated"=> 0.3527,
            "tokenExpire"=> 1723914219,
            "serverTime"=> 1692954219,
            "version"=> "v1"
        ];
    
        return response()->json($response);
    }

    public function getCity(Request $request)
    {
        $this->startProcess($request, 'GET');
        $City = City::getModels();
    
        $transformedCity = $City->map(function ($category) {
            return [
                'value' => $category->city_id,
                'label' => $category->city_name,
            ];
        });
    
        $response = [
            "status" => true,
            "message" => "Data berhasil ditampilkan",
            "response" => $transformedCity,
            "generated" => 32.3332,
            "tokenExpire" => 1723914557,
            "serverTime" => 1692954588,
            "version" => "v1"
        ];
    
        return response()->json($response);
    }


}