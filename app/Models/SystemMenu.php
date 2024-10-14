<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemMenu extends Model
{
    /** @use HasFactory<\Database\Factories\SystemMenuFactory> */
    use HasFactory;
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