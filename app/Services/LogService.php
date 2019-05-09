<?php
/**
 * Created by PhpStorm.
 * User: masswise
 * Date: 2019/5/9
 * Time: 10:54
 */

namespace App\Services;

use App\Models\Log;
use Auth;

class LogService
{
    //创建用户日志记录
    public function create($request,$status = false,$type)
    {
        //登陆记录
        if($type == 2){
            //具体信息
            $admin = Auth::guard('web')->user();
            $ip = $request->getClientIp();
            $action = $status ? "管理员：{{$admin->username}}登陆成功" : "管理员：{{$request->useranme}}登陆失败，密码为{{$request->password}}";
            $data = [
                'ip' => $ip,
                'action' => $action
            ];
            $datas['userid'] = $admin->id;
            $datas['data']   = json_encode($data);
            $datas['type']   = 2;

            return Log::create($datas);
        }
    }
}