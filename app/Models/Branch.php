<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Branch extends Model
{
    use HasFactory;

    protected $guarded =[];
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->branch_slug = (string) Str::slug($model->branch_name);
            $model->branch_code = substr(str_pad(rand(0,'11'.round(microtime(true))), 17 , "0", STR_PAD_LEFT), 9);
        });
    }
}
