@extends('amazeui.main')
@section('content')
    <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
            <div class="am-btn-toolbar">
                <div class="am-btn-group am-btn-group-xs">
                    <a href="{{ url('user/create') }}" class="am-btn am-btn-default"><span class="am-icon-plus"></span>
                        新增</a>
                </div>
            </div>
        </div>
        <div class="am-u-sm-12 am-u-md-3">
            <div class="am-input-group am-input-group-sm">
                <input type="text" class="am-form-field">
          <span class="am-input-group-btn">
            <button class="am-btn am-btn-default" type="button">搜索</button>
          </span>
            </div>
        </div>
    </div>
    <div class="am-g">
        <div class="am-u-sm-12">
            <table class="am-table am-table-striped am-table-hover table-main">
                <thead>
                <tr>
                    <th class="table-check"><input type="checkbox"></th>
                    <th>用户名</th>
                    <th>真实姓名</th>
                    <th>邮箱</th>
                    <th>注册时间</th>
                    <th>最后登录</th>
                    <th>角色</th>
                    <th class="table-set">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>{{ $user->user_name }}</td>
                        <td>{{ $user->real_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ date('Y-m-d H:i:s', $user->created) }}</td>
                        <td>{{ date('Y-m-d H:i:s', $user->last_login) }}</td>
                        <td>{{ $user->role?$user->role->role_name:'-'  }}</td>
                        <td>
                            <div class="am-btn-toolbar">
                                {!! Form::open(array('action'=>array('UserController@destroy',$user->id),'method'=>'DELETE')) !!}
                                <div class="am-btn-group am-btn-group-xs">
                                    <a href="{{ action('UserController@edit',array('id'=>$user->id)) }}"
                                       class="am-btn am-btn-default am-btn-xs am-text-secondary"><span
                                                class="am-icon-pencil-square-o"></span> 编辑
                                    </a>

                                    <button type="submit"
                                            class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only">
                                                <span
                                                        class="am-icon-trash-o"></span> 删除
                                    </button>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection('content')