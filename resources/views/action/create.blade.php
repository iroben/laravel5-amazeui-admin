@extends('amazeui.main')
@section('content')
    <hr/>
    {!! Form::open(array('action'=>array('ActionController@store'),'method'=>'POST','class'=>'am-form am-form-horizontal')) !!}
    <div class="am-g">
        <div class="am-u-sm-12 am-u-md-8 ">
            <div class="am-form-group">
                <label for="role_name" class="am-u-sm-3 am-form-label">操作名称</label>

                <div class="am-u-sm-9">
                    {!! Form::text('action_name') !!}
                    <small></small>
                </div>
            </div>

            <div class="am-form-group">
                <label for="description" class="am-u-sm-3 am-form-label">命名空间</label>

                <div class="am-u-sm-9">
                    {!! Form::text('action_namespace', null, array('placeholder'=>'App\Http\Controllers')) !!}
                    <small></small>
                </div>
            </div>

            <div class="am-form-group">
                <label for="description" class="am-u-sm-3 am-form-label">类名</label>

                <div class="am-u-sm-9">
                    {!! Form::text('action_class', null, array('placeholder'=>'Test1Controller')) !!}
                    <small></small>
                </div>
            </div>

            <div class="am-form-group">
                <label for="description" class="am-u-sm-3 am-form-label">方法名</label>

                <div class="am-u-sm-9">
                    {!! Form::text('action_method',null, array('placeholder'=>'index')) !!}
                    <small></small>
                </div>
            </div>

            <div class="am-form-group">
                <label for="description" class="am-u-sm-3 am-form-label">action</label>

                <div class="am-u-sm-9">
                    {!! Form::text('action',null,array('placeholder'=>'TestController@index')) !!}
                    <small></small>
                </div>
            </div>

            <div class="am-form-group">
                <label for="description" class="am-u-sm-3 am-form-label">样式</label>

                <div class="am-u-sm-9">
                    {!! Form::text('prefix_class') !!}
                    <small></small>
                </div>
            </div>

            <div class="am-form-group">
                <label for="description" class="am-u-sm-3 am-form-label">描述信息</label>

                <div class="am-u-sm-9">
                    {!! Form::text('description') !!}
                    <small></small>
                </div>
            </div>

            {!! Form::hidden('pid', Request::input('pid')) !!}

            <div class="am-form-group">
                <div class="am-u-sm-9 am-u-sm-push-3">
                    <button type="submit" class="am-btn am-btn-primary">保 存</button>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection('content')