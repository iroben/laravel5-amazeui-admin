@extends('amazeui.main')
@section('content')
    <hr/>
    {!! Form::open(array('action'=>array('RoleController@store'),'method'=>'POST','class'=>'am-form am-form-horizontal')) !!}
    <div class="am-g">


        <div class="am-u-sm-12 am-u-md-8 ">
            <div class="am-form-group">
                <label for="role_name" class="am-u-sm-3 am-form-label">角色名称</label>

                <div class="am-u-sm-9">
                    {!! Form::text('role_name') !!}
                    <small></small>
                </div>
            </div>

            <div class="am-form-group">
                <label for="description" class="am-u-sm-3 am-form-label">角色描述</label>

                <div class="am-u-sm-9">
                    {!! Form::text('description') !!}
                    <small></small>
                </div>
            </div>

            <div class="am-form-group">
                <div class="am-u-sm-offset-2 am-u-sm-10">
                    @include('role.actions')
                </div>
            </div>

            {{--<div class="am-form-group">
                <label for="user-name" class="am-u-sm-3 am-form-label">角色权限</label>

                <div class="am-u-sm-9">
                    {!! Form::text('real_name') !!}
                    <small></small>
                </div>
            </div>--}}

            <div class="am-form-group">
                <div class="am-u-sm-9 am-u-sm-push-3">
                    <button type="submit" class="am-btn am-btn-primary">保 存</button>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection('content')