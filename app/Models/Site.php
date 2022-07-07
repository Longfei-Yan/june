<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    const PENDING_STATUS = 0;
    const COMPLETED_STATUS = 1;

    public static $status = [
        self::PENDING_STATUS=>'等待处理',
        self::COMPLETED_STATUS=>'已经提交',
    ];

    public static $dot = [
        self::PENDING_STATUS=>'primary',
        self::COMPLETED_STATUS=>'info',
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
