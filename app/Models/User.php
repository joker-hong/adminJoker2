<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Traits\RbacCheck;

class User extends Authenticatable
{
    use Notifiable;
    use RbacCheck;

    //软删除
    protected $dates = ['deleted_at'];

    //允许填充的字段
    protected $fillable = [
        'username', 'password', 'headPortrait', 'status','receiver_name','receiver_mobile','receiver_province','receiver_city','receiver_area','receiver_address'
    ];

    //关联角色表
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role','user_role')->withTimestamps();//多对多，自动更新时间
    }
}
