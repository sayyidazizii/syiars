<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemMenuMapping extends Model
{
    /** @use HasFactory<\Database\Factories\SystemMenuMappingFactory> */
    use HasFactory;
    use Notifiable;

    // Menentukan tabel yang digunakan
    protected $table = 'system_menu_mapping';

    // Jika primary key bukan id, tentukan di sini (misalnya 'user_id')
    protected $primaryKey = 'menu_mapping_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'menu_mapping_id',
        'company_id',
        'user_group_level',
        'id_menu',
        'data_state',
        'branch_id',
    ];
    
    protected static function booted(){
        $userid=auth->id();
        static::creating(function ($model) use($userid) {
            $model->created_id = $userid;
        });
        static::updated(function ($model) use($userid) {
            $model->updated_id = $userid;
        });
        static::deleting(function ($model) use($userid) {
            $model->deleted_id = $userid;
        });
}
}
