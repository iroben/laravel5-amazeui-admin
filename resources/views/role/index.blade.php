@extends('amazeui.main')
@section('content')
    <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
            <div class="am-btn-toolbar">
                <div class="am-btn-group am-btn-group-xs">
                    <a href="{{ url('role/create') }}" class="am-btn am-btn-default"><span class="am-icon-plus"></span>
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
                    <th>角色名称</th>
                    <th>角色描述</th>
                    <th>创建者</th>
                    <th>创建时间</th>
                    <th class="table-set">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>{{ $role->role_name }}</td>
                        <td>{{ $role->description }}</td>
                        <td>{{ $role->user_id }}</td>
                        <td>{{ date('Y-m-d H:i:s', $role->created) }}</td>
                        <td>
                            <div class="am-btn-toolbar">
                                {!! Form::open(array('action'=>array('RoleController@destroy',$role->id),'method'=>'DELETE')) !!}
                                <div class="am-btn-group am-btn-group-xs">
                                    <a href="{{ action('RoleController@edit',array('id'=>$role->id)) }}"
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