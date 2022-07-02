<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class License extends Model
{
    public function getImageUrlAttribute()
    {
        // 如果 logo 字段本身就已经是完整的 url 就直接返回
        if (Str::startsWith($this->attributes['logo'], ['http://', 'https://'])) {
            return $this->attributes['logo'];
        }
        return \Storage::disk('public')->url($this->attributes['logo']);
    }
}
