<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CoreProvince extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'core_province'; // Nama tabel yang digunakan

    protected $primaryKey = 'province_id'; // Menentukan primary key

    protected $fillable = [
        'province_code',
        'province_name',
        'province_no',
        'data_state',
        'branch_id',
        'created_id',
        'updated_id',
        'uuid',
        'deleted_id'
    ]; // Kolom yang dapat diisi massal

    public function branch()
    {
        return $this->belongsTo(CoreBranch::class, 'branch_id');
    }
}
