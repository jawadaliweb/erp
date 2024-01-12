<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    protected $guarded =[];
    use HasFactory;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->country_slug = (string) Str::slug($model->country_name);
            $model->country_code = substr(str_pad(rand(0,'11'.round(microtime(true))), 17 , "0", STR_PAD_LEFT), 9);
        });
    }
}
