<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UserService;

class UserController extends Controller
{
    //
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        $condition=[];
        $get='';
        if(isset($request->username)){
            $condition[]= ['username', 'like', '%'.$request->username.'%'];
            $get=$request->username;
        }

        $lists = $this->userService->lists($condition);

        return view('admin.users.index', compact('lists','get'));
    }
}
