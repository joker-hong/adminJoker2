<?php
/**
 * Created by PhpStorm.
 * User: masswise
 * Date: 2019/5/9
 * Time: 10:43
 */

namespace App\Services;

use App\Models\User;
use Auth;
use App\Services\LogService;

class UserService
{
    protected $logService;

    public function __construct(LogService $logService)
    {
        $this->logService = $logService;
    }

    /**
     * 验证用户登陆信息
     * @access public
     * @param  string  $request        登陆信息
     * @return array   $ret_arr        状态数据
     */
    public function login($request)
    {
        //登陆失败，添加日志记录
        if(!Auth::guard('web')->attempt([
            'username' => $request->username,
            'password' => $request->password,
            'status'   => 1
        ])){
            $this->logService->create($request,flase,2);
            return false;
        }

        $admin = Auth::guard('web')->user();
        $admin->increment('login_count');//登陆成功的次数自增

        //添加成功日志记录
        $this->logService->create($request,true,2);

        return true;
    }

    public function lists($condition)
    {
        return User::with('roles')->where($condition)->latest()->paginate(10);
    }
}