<?php

namespace App\Models\Configuration;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    protected $guarded =[];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->city_slug = (string) Str::slug($model->city_name);
            $model->city_code = substr(str_pad(rand(0,'11'.round(microtime(true))), 17 , "0", STR_PAD_LEFT), 9);
        });
    }
}
