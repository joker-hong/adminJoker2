@extends('admin.layouts.layout')

@section('content')
    <div class="page-content-wrap">
        <form class="layui-form" action="">
            <div class="layui-form-item">
                <div class="layui-inline tool-btn">
                    <button class="layui-btn layui-btn-small layui-btn-normal go-btn hidden-xs" data-url="danye-detail.html"><i class="layui-icon">&#xe654;</i></button>
                    <button class="layui-btn layui-btn-small layui-btn-warm listOrderBtn hidden-xs" data-url="/admin/category/listorderall.html"><i class="iconfont">&#xe656;</i></button>
                </div>
                <div class="layui-inline">
                    <input type="text" name="title" placeholder="请输入标题" autocomplete="off" class="layui-input">
                </div>
                <button class="layui-btn layui-btn-normal" lay-submit="search">搜索</button>
            </div>
        </form>
        <div class="layui-form" id="table-list">
            <table class="layui-table" lay-even lay-skin="nob">

                <thead>
                <tr>
                    <th>ID</th>
                    <th>管理员账号</th>
                    <th>所在角色组</th>

                    <th>
                        <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                        最后登录时间
                    </th>
                    <th>
                        <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                        注册时间
                    </th>
                    <th>登录次数</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lists as $key=>$item)
                    <tr>
                        <td>
                            {{$item->id}}
                        </td>
                        <td>{{$item->username}}</td>
                        <td>
                            @foreach($item->roles as $role)
                                {{$role->name}}
                            @endforeach
                        </td>
                        <td>{{$item->updated_at->diffForHumans()}}</td>
                        <td>{{$item->created_at->diffForHumans()}}</td>
                        <td>{{$item->login_count}}</td>
                        <td>
                            @if($item->status == 1)
                                <span class="label label-sm label-success arrowed-in-right arrowed-in">正常</span>
                            @elseif($item->status == 2)
                                <span class="label label-sm label-warning  arrowed-in-right arrowed-in">禁用</span>
                            @endif
                        </td>

                        <td>
                            <div class="hidden-sm hidden-xs btn-group">
                                <a href="{{route('user.edit',$item->id)}}">
                                    <button class="btn btn-xs btn-info">
                                        <i class="ace-icon fa fa-pencil bigger-120">修改</i>
                                    </button>
                                </a>
                                @if($item->status == 2)
                                    <a href="{{route('user.status',['status'=>1,'id'=>$item->id])}}">
                                        <button class="btn btn-xs btn-primary">
                                            <i class="ace-icon fa fa-warning bigger-120">恢复</i>
                                        </button>
                                    </a>
                                @else
                                    <a href="{{route('user.status',['status'=>2,'id'=>$item->id])}}">
                                        <button class="btn btn-xs btn-warning">
                                            <i class="ace-icon fa fa-warning bigger-120">禁用</i>
                                        </button>
                                    </a>
                                @endif
                                <a href="{{route('user.delete',$item->id)}}">
                                    <button class="btn btn-xs btn-danger">
                                        <i class="ace-icon fa fa-trash-o bigger-120">删除</i>
                                    </button>
                                </a>


                            </div>
                            <div class="hidden-md hidden-lg">
                                <a href="{{route('user.edit',$item->id)}}">
                                    <button class="btn btn-xs btn-info">
                                        <i class="ace-icon fa fa-pencil bigger-120">修改</i>
                                    </button>
                                </a>
                                @if($item->status == 2)
                                    <a href="{{route('user.status',['status'=>1,'id'=>$item->id])}}">
                                        <button class="btn btn-xs btn-primary">
                                            <i class="ace-icon fa fa-warning bigger-120">恢复</i>
                                        </button>
                                    </a>
                                @else
                                    <a href="{{route('user.status',['status'=>2,'id'=>$item->id])}}">
                                        <button class="btn btn-xs btn-warning">
                                            <i class="ace-icon fa fa-warning bigger-120">禁用</i>
                                        </button>
                                    </a>
                                @endif
                                <a href="{{route('user.delete',$item->id)}}">
                                    <button class="btn btn-xs btn-danger">
                                        <i class="ace-icon fa fa-trash-o bigger-120">删除</i>
                                    </button>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="page-wrap">
                <ul class="pagination">
                    <li class="disabled"><span>«</span></li>
                    <li class="active"><span>1</span></li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">»</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <script src="/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
    <script src="/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
    <script>
        layui.use(['form', 'jquery', 'layer', 'dialog'], function() {
            var $ = layui.jquery;

            //修改状态
            $('#table-list').on('click', '.table-list-status', function() {
                var That = $(this);
                var status = That.attr('data-status');
                var id = That.parent().attr('data-id');
                if(status == 1) {
                    That.removeClass('layui-btn-normal').addClass('layui-btn-warm').html('隐藏').attr('data-status', 2);
                } else if(status == 2) {
                    That.removeClass('layui-btn-warm').addClass('layui-btn-normal').html('显示').attr('data-status', 1);

                }
            })

        });
    </script>
@endsection