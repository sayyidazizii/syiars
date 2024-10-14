<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SystemUserGroup extends Model
{
    /** @use HasFactory<\Database\Factories\SystemUserGroupFactory> */
    use HasFactory;
    use Notifiable;

    // Menentukan tabel yang digunakan
    protected $table = 'system_user_group';

    // Jika primary key bukan id, tentukan di sini (misalnya 'user_id')
    protected $primaryKey = 'user_group_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_group_id',
        'company_id',
        'user_group_level',
        'user_group_level',
        'user_group_name',
        'user_group_token',
        'date_state',
        'branch_id',
    ];

}
