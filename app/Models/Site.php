<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $casts = [
        'process_status' => 'boolean'
    ];

    public function license()
    {
        return $this->belongsTo(License::class);
    }

    public function mail()
    {
        return $this->belongsTo(Mail::class);
    }

    /**
     * 以逗号分割的id字符串获取关联的数据集合
     * @param $strIds
     * @return array
     */
    public function dataModel(Model $model, string $strIds)
    {
        if (!is_null($strIds)) {
            $arrIds = explode(',', $strIds);
            return $model::whereIn('id', $arrIds);
        }
        return [];
    }
}
