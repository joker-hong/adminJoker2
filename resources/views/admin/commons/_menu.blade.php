@php
    $admin = Auth::guard('web')->user();
@endphp
<div class="main-layout-side">
    <div class="m-logo">
    </div>
    <ul class="layui-nav layui-nav-tree" lay-filter="leftNav">
        @foreach($admin->getMenus() as $key=>$rule)
        <li class="layui-nav-item ">
            <a href="javascript:;" data-url="" data-id='{{$rule['id']}}' data-text="{{$rule['name']}}"><span class="iconfont"><i class="fa fa-{{$rule['fonts']}}"></i></span>{{$rule['name']}}</a>
            @if(isset($rule['children']))
            <dl class="layui-nav-child">
                @foreach($rule['children'] as $k=>$item)
                <dd><a href="javascript:;" data-url="{{route('user')}}" data-id='{{$item['id']}}' data-text="{{$item['name']}}"><span class="l-line"></span>{{$item['name']}}</a></dd>
                @endforeach
            </dl>
            @endif
        </li>
        @endforeach

    </ul>
</div>
