<?php

namespace App\Models\Tpm;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class VendorUser extends BaseModel
{
    protected $table = 'public.vendor_users';
    protected $primaryKey = 'vendor_user_id';

    protected $guarded = [];

    const UPDATED_AT = null;
    const CREATED_AT = null;

    public function saveModel(array $data)
    {
        try {
            $this->fill($data);

            $this->vendor_user_uuid = $this->generateUuid();
            $this->vendor_user_last_password = $this->vendor_user_password = Hash::make($this->vendor_user_password);
            $this->vendor_user_name = $this->generateUserName();

            return $this->save();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    protected function generateUserName()
    {
        $pattern = 'DRM-JP-{YEAR}-{SEQ}';
        $initial_code_length = 6;
        $sequence = Str::padLeft((static::count() + 1), $initial_code_length, 0);

        return Str::replace('{SEQ}', $sequence, Str::replace('{YEAR}', date('y'), $pattern));
    }
}
