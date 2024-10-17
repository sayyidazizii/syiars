<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemMenu extends Model
{
    /** @use HasFactory<\Database\Factories\SystemMenuFactory> */
    use HasFactory;
    protected $table = 'system_menu';

    protected $primaryKey = 'id_menu';
}

  

