<?php

namespace App\Models;
use App\Models\CoreCity;
use App\Models\CoreDusun;
use App\Models\CoreKecamatan;
use App\Models\CoreKelurahan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class CoreMember extends Model
{
    /** @use HasFactory<\Database\Factories\CoreMemberFactory> */
    use HasFactory, SoftDeletes;
    use Notifiable;
    protected $table = 'core_member';
    protected $primaryKey = 'member_id';
    protected $fillable = [
            'member_id',
            'branch_id',
            'province_id',
            'city_id',
            'kecamatan_id',
            'kelurahan_id',
            'dusun_id',
            'member_no',
            'member_name',
            'member_gender',
            'member_place_of_birth',
            'member_date_of_birth',
            'member_address',
            'member_postal_code',
            'member_phone',
            'member_job',
            'identity_id',
            'member_identity',
            'member_identity_no',
            'member_character',
            'member_mother',
            'member_heir',
            'member_family_relationship',
            'member_status',
            'member_register_date',
            'member_principal_savings',
            'member_special_savings',
            'member_mandatory_savings',
            'member_principal_savings_last_balance',
            'member_special_savings_last_balance',
            'member_mandatory_savings_last_balance',
            'saldo_pokok_old',
            'saldo_wajib_old',
            'saldo_khusus_old',
            'member_token',
            'member_token_edit',
            'member_last_number',
            'member_password_default',
            'member_password',
            'savings_account_id',
            'member_no_old',
            'member_no_status',
            'data_state',
    ];
    protected $dates = [
        'created_on',
        'deleted_at',
    ];
    public $timestamps = true;
    protected static function booted() {
        $userid = auth()->id();

        static::creating(function ($model) use ($userid) {
            $model->created_id = $userid;
        });
        static::updating(function ($model) use ($userid) {
            $model->updated_id = $userid;
        });
        static::deleting(function ($model) use ($userid) {
            $model->deleted_id = $userid;
        });
    }
    public function dusun(): Belongsto
    {
        return $this->belongsto(CoreDusun::class, 'dusun_id');
    }
    public function kelurahan(): Belongsto
    {
        return $this->belongsto(CoreKelurahan::class, 'kelurahan_id');
    }
    public function kecamatan(): Belongsto
    {
        return $this->belongsto(CoreKecamatan::class, 'kecamatan_id');
    }
    public function city(): Belongsto
    {
        return $this->belongsto(CoreCity::class, 'city_id');
    }
    public function province(): BelongsTo
    {
        return $this->belongsTo(CoreProvince::class, 'province_id');
    }
}
