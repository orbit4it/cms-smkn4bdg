<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'meta_key',
        'meta_value',
        'meta_type',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($setting) {
            $setting->meta_type = gettype($setting->meta_value);
            if (is_array($setting->meta_value) || is_object($setting->meta_value)) {
                $setting->meta_value = json_encode($setting->meta_value);
            }
        });

        static::updating(function ($setting) {
            $setting->meta_type = gettype($setting->meta_value);
            if (is_array($setting->meta_value) || is_object($setting->meta_value)) {
                $setting->meta_value = json_encode($setting->meta_value);
            }
        });
    }

    public function getValueAttribute()
    {
        if (in_array($this->meta_type, ['array', 'object'])) {
            $this->meta_value = json_decode($this->meta_value);
        }

        return $this->meta_value;
    }

}
