<?php

namespace App\Http\Controllers\v1\Tpm;

use App\Http\Controllers\v1\ApiController;
use App\Models\Tpm\PreVendor;
use Illuminate\Http\Request;

class CandidateController extends ApiController
{
    public function postPreregisterVendor(Request $request)
    {
        $rules = [
            'pre_vendor_name' => 'required',
            'pre_vendor_area' => 'required',
            'pre_vendor_tax_number' => 'required',
            'pre_vendor_company_type' => 'required',
            'pre_vendor_suppliers_category' => 'required',
            'pre_vendor_province' => 'required',
            'pre_vendor_city' => 'required',
            'pre_vendor_email' => 'required',
            'pre_vendor_username' => 'required',
            'pre_vendor_password' => 'required'
        ];

        $this->startProcess($request, 'POST', $rules);

        try {
            $model = new PreVendor();
            $model->saveModel($this->param);

            return $this->output(true, 'Berhasil melakukan registrasi Pre vendor');

        } catch (\Exception $e) {
            return $this->output(false, 'Gagal melakukan registrasi Pre vendor', null, 500);
        }
    }
}