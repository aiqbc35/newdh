@extends('admin.layout')
@section('content')
    <div class="x-body">
        <blockquote class="layui-elem-quote">欢迎使用x-admin 后台模版！</blockquote>
        <fieldset class="layui-elem-field">
            <legend>信息统计</legend>
            <div class="layui-field-box">
                <table class="layui-table" lay-even>
                    <thead>
                    <tr>
                        <th>统计</th>
                        <th>链接</th>
                        <th>订阅</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>总数</td>
                        <td>{{ $data['countlink'] }}</td>
                        <td>{{ $data['countsub'] }}</td>
                    </tr>
                    <tr>
                        <td>今日</td>
                        <td>{{ $data['daylink'] }}</td>
                        <td>{{ $data['daysub'] }}</td>
                    </tr>
                    <tr>
                        <td>本月</td>
                        <td>{{ $data['yuelink'] }}</td>
                        <td>{{ $data['yuesub'] }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </fieldset>

    </div>
@endsection