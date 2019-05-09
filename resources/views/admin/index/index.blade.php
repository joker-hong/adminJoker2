<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>{{config('app.name')}}后台</title>
    <link rel="stylesheet" type="text/css" href="/admin/layui/css/layui.css"/>
    <link rel="stylesheet" type="text/css" href="/admin/css/admin.css"/>
    <link rel="stylesheet" href="/admin/css/font-awesome/4.5.0/css/font-awesome.min.css" />
</head>
<body>
<div class="main-layout" id='main-layout'>
    <!--侧边栏-->
    @include('admin.commons._menu')
    <!--右侧内容-->
    @include('admin.commons._container')
    <!--遮罩-->
    <div class="main-mask">

    </div>
</div>

<script src="/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
<script src="/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
<script src="/admin/js/main.js" type="text/javascript" charset="utf-8"></script>

</body>
</html>