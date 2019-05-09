<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //软删除
    protected $dates = ['deleted_at'];

    //允许填充的字段
    protected $fillable = [
        'name', 'remark', 'order', 'status'
    ];

    //关联用户表
    public function users()
    {
        return $this->belongsToMany('App\Models\User','user_role')->withTimestamps();//多对多，自动更新时间
    }
}
