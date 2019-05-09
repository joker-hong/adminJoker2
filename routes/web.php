<?php
//
///*
//|--------------------------------------------------------------------------
//| Web Routes
//|--------------------------------------------------------------------------
//|
//| Here is where you can register web routes for your application. These
//| routes are loaded by the RouteServiceProvider within a group which
//| contains the "web" middleware group. Now create something great!
//|
//*/
//
//Route::group(['namespace'=>'admin'],function(){
//    Route::get('login','LoginController@index')->name('login');
//    Route::post('login/submit','LoginController@submit')->name('submit');
//
//    Route::middleware('auth:web')->group(function(){
//        Route::get('/','IndexController@index')->name('index');
//        Route::get('index','IndexController@index')->name('index');
//        Route::get('main','IndexController@main')->name('main');
//
//        //账号管理
//        Route::get('user/status/{status}/{admin}','UserController@status')->name('user.status');
//        Route::get('user/delete/{admin}','UserController@delete')->name('user.delete');
//        Route::get('user/select','UserController@index')->name('user.select');
//        Route::resource('user','UserController',['only'=>['index','create','store','update','edit']])->names([
//            'index'=>'user'
//        ]);
//
//
//    });
//
//});

Route::group(['namespace' => 'Admin'], function (){
    Route::get('login','LoginController@index')->name('login');
    Route::post('login/submit','LoginController@submit')->name('submit');
    /**需要登录认证模块**/
    Route::middleware(['auth:web'])->group(function (){
        Route::get('/','IndexController@index')->name('index');
        Route::get('index','IndexController@index')->name('index');
        Route::get('info','IndexController@info')->name('myInfo');
        Route::get('password','IndexController@password')->name('password');
        Route::patch('update','indexController@update')->name('update');
        Route::get('logout','LoginController@logout')->name('logout'); //退出登录
        Route::get('main','IndexController@main')->name('main'); //首页数据分析
        Route::get('user/status/{status}/{admin}','UserController@status')->name('user.status');
        Route::get('user/delete/{admin}','UserController@delete')->name('user.delete');
        Route::get('user/select','UserController@index')->name('user.select');

        Route::resource('user', 'UserController',['only' => ['index', 'create', 'store', 'update', 'edit']])->names([
            'index' => 'user',
        ]);
        Route::get('role/access/{role}','RoleController@access')->name('role.access');

        Route::post('role/group-access/{role}','RoleController@groupAccess')->name('role.group-access');

        Route::resource('role','RoleController',['only'=>['index','create','store','update','edit','destroy'] ])->names([
            'index' => 'role',
        ]);
        Route::get('rule/status/{status}/{rules}','RuleController@status')->name('rule.status');

        Route::resource('rule','RuleController',['only'=> ['index','create','store','update','edit','destroy'] ])->names([
            'index' => 'rule',
        ]);
        Route::resource('actions','ActionLogsController',['only'=> ['index','destroy'] ]);  //日志
        Route::resource('order','OrderController',['only'=> ['index','create','store','edit','destroy'] ])->names([
            'index' => 'order',
        ]);
        Route::post('order/update','OrderController@update')->name('order.update');

        Route::get('order/select','OrderController@index')->name('order.select');
        Route::get('order/delete/{status}/{order}','OrderController@delete')->name('order.delete');
        Route::get('order/refuse/{order}','OrderController@refuse')->name('order.refuse');
        Route::PATCH('order/success/{order}','OrderController@success')->name('order.success');
        Route::PATCH('order/balance/{order}','OrderController@balance')->name('order.balance');
        Route::get('order/errors/{order}','OrderController@errors')->name('order.errors');
        Route::PATCH('order/successd/{order}','OrderController@successd')->name('order.successd');
        Route::get('order/delivery/{order}/{index}','OrderController@delivery')->name('order.delivery');
        Route::get('order/derive','OrderController@derive')->name('order.derive');
        Route::patch('order/export','OrderController@export')->name('order.export');

        Route::resource('banner','BannerController',['only'=> ['index','create','store','update','edit','destroy'] ])->names([
            'index' => 'banner',
        ]);
        Route::get('banner/select','BannerController@index')->name('banner.select');
        Route::get('banner/edit/{admin}','BannerController@edit')->name('banner.edit');
        Route::get('banner/detele/{admin}','BannerController@delete')->name('banner.delete');
        Route::get('goods/up/{admin}','GoodsController@up')->name('goods.up');
        Route::resource('goods','GoodsController',['only'=> ['index','create','store','update','edit','destroy'] ])->names([
            'index' => 'goods',
        ]);
        Route::get('goods/detele/{admin}','GoodsController@delete')->name('goods.delete');
        Route::get('goods/recomd/{admin}','GoodsController@recomd')->name('goods.recomd');
        Route::get('goods/down/{admin}','GoodsController@down')->name('goods.down');
        Route::get('goods/select','GoodsController@index')->name('goods.select');
        Route::resource('config','ConfigController',['only'=> ['index','create','store','update','edit','destroy'] ])->names([
            'index' => 'config',
        ]);
        Route::get('config/index','ConfigController@index')->name('config.index');

        Route::resource('category','CategoryController',['only'=> ['index','create','store','update','edit','destroy'] ]);
        Route::get('category/status/{status}/{rules}','CategoryController@status')->name('category.status');

        Route::resource('member', 'MemberController',['only' => ['index', 'create', 'store', 'update', 'edit']]);
        Route::get('member/index','MemberController@index')->name('member.index');
        Route::get('member/select','MemberController@index')->name('member.select');
        Route::get('member/status/{status}/{admin}','MemberController@status')->name('member.status');

        Route::get('reward/index','RewardController@index')->name('reward.index');
        Route::get('reward/select','RewardController@index')->name('reward.select');
        Route::resource('bill', 'BillController',['only' => ['index']]);
        Route::patch('bill/export','BillController@export')->name('bill.export');
        Route::get('bill/search','BillController@index')->name('bill.search');
        Route::get('bill/derive','BillController@derive')->name('bill.derive');
        /*预定的路由，整合时注意其路由*/
        Route::resource('cash','CashController',['only'=> ['index','create','store','update','edit','destroy'] ])->names([
            'index' => 'cash',
        ]);
        Route::get('cash/select','CashController@index')->name('cash.select');
        Route::get('cash/detele/{admin}','CashController@delete')->name('cash.delete');
        Route::get('cash/edit/{admin}','CashController@edit')->name('cash.edit');
        Route::resource('param','ParamController',['only'=> ['index','create','store','update','edit','destroy'] ])->names([
            'index' => 'param',
        ]);
        Route::get('param/select','ParamController@index')->name('param.select');
        Route::get('param/delete/{id}/{goodsid}','ParamController@delete')->name('param.delete');
        Route::get('param/edit/{id}','ParamController@edit')->name('param.edit');
        Route::get('param/create/{admin}','ParamController@create')->name('param.create');
        Route::resource('format','FormatController',['only'=> ['store','update'] ])->names([
            'index' => 'format',
        ]);
        Route::get('format/index','FormatController@index')->name('format.index');
        Route::get('format/create','FormatController@create')->name('format.create');
        Route::get('format/delete/{admin}','FormatController@delete')->name('format.delete');
        Route::get('format/edit/{admin}','FormatController@edit')->name('format.edit');
        Route::get('order/derive','OrderController@derive')->name('order.derive');
        Route::patch('order/export','OrderController@export')->name('order.export');

        Route::resource('question','QuestionController',['only'=> ['index','create','store','update','edit','destroy'] ])->names([
            'index' => 'question',
        ]);
        Route::get('question/index','QuestionController@index')->name('question.index');
        Route::resource('notice','NoticeController',['only'=> ['index','create','store','update','edit','destroy'] ])->names([
            'index' => 'notice',
        ]);
        Route::get('notice/index','NoticeController@index')->name('notice.index');


    });

});
