@php
    $admin = Auth::guard('web')->user();
@endphp
<div class="main-layout-container">
    <!--头部-->
    <div class="main-layout-header">
        <div class="menu-btn" id="hideBtn">
            <a href="javascript:;">
                <span class="iconfont">&#xe60e;</span>
            </a>
        </div>
        <ul class="layui-nav" lay-filter="rightNav">
            <li class="layui-nav-item"><a href="javascript:;" data-url="email.html" data-id='4' data-text="邮件系统"><i class="iconfont">&#xe603;</i></a></li>
            <li class="layui-nav-item">
                <a href="javascript:;" data-url="admin-info.html" data-id='5' data-text="个人信息">
                    @foreach($admin->roles as $role)
                        {{$role->name}}
                    @endforeach</a>
            </li>
            <li class="layui-nav-item"><a href="javascript:;">退出</a></li>
        </ul>
    </div>
    <!--主体内容-->
    <div class="main-layout-body">
        <!--tab 切换-->
        <div class="layui-tab layui-tab-brief main-layout-tab" lay-filter="tab" lay-allowClose="true">
            <ul class="layui-tab-title">
                <li class="layui-this welcome">后台主页</li>
            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show" style="background: #f5f5f5;">
                    <!--1-->
                    <iframe src="{{route('main')}}" width="100%" height="100%" name="iframe" scrolling="auto" class="iframe" framborder="0"></iframe>
                    <!--1end-->
                </div>
            </div>
        </div>
    </div>
</div>