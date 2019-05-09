<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    /**
     * 首页
     * @access public
     * @return array   $ret_arr        视图
     */
    public function index()
    {
        return view('admin.index.index');
    }

    /**
     * 首页详情
     * @access public
     * @return array   $ret_arr        视图
     */
    public function main()
    {
        return view('admin.index.main');
    }
}
