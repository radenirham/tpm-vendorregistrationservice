<?php

namespace App\Models\Tpm;

use App\Models\BaseModel;
use App\Models\MasterReference\CompanyType;
use App\Models\MasterReference\SupplierCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class PreVendor extends BaseModel
{
    protected $table = 'public.pre_vendors';
    protected $primaryKey = 'pre_vendor_id';

    protected $guarded = [
        'pre_vendor_id',
        'pre_vendor_uuid',
        'pre_vendor_create_date',
        'pre_vendor_status',
        'pre_vendor_activation_date',
        'pre_vendor_activation_code'
    ];

    const CREATED_AT = 'pre_vendor_create_date';

    const OPTIONS_VENDOR_AREA = [
        ['value' => 1, 'label' => 'Dalam Negeri'],
        ['value' => 2, 'label' => 'Luar Negeri']
    ];

    public function saveModel(array $data)
    {
        try {
            DB::beginTransaction();

            $this->fill($data);

            $this->pre_vendor_uuid = $this->generateUuid();

            if ($this->save()) {
                $vendor_user_data = [
                    'vendor_user_vendor_uuid' => $this->pre_vendor_uuid,
                    'vendor_user_fullname' => $this->pre_vendor_name,
                    'vendor_user_password' => $data['pre_vendor_password'],
                ];

                $vendor_user = new VendorUser();
                $vendor_user->saveModel($vendor_user_data);

                DB::commit();
            }

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function supplierCategory(): BelongsTo
    {
        return $this->belongsTo(SupplierCategory::class, 'pre_vendor_suppliers_category', 'supplier_category_uuid');
    }

    public function companyType(): BelongsTo
    {
        return $this->belongsTo(CompanyType::class, 'pre_vendor_company_type', 'company_type_uuid');
    }
}
