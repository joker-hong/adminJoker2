<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UserService;

class LoginController extends Controller
{
    protected $userService;


    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    //登陆页面
    public function index()
    {
        return view('admin.login.index');
    }

    //登陆提交
    public function submit(Request $request)
    {
        //验证登陆信息
        $result = $this->userService->login($request);
        if(!$result){
            return view('admin.login.index');
        }

        return view('admin.index.index');
    }
}
