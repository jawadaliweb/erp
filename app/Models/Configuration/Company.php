<?php

namespace App\Models\Configuration;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    protected $guarded =[];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->company_slug = (string) Str::slug($model->company_name);
            $model->company_code = substr(str_pad(rand(0,'11'.round(microtime(true))), 17 , "0", STR_PAD_LEFT), 9);
        });
    }
}
