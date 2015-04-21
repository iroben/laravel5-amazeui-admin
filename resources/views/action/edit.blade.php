@extends('amazeui.main')
@section('content')
    <hr/>
    {!! Form::model($model,array('action'=>array('ActionController@update',$model->id),'method'=>'PUT','class'=>'am-form am-form-horizontal')) !!}
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
                    {!! Form::text('action_namespace') !!}
                    <small></small>
                </div>
            </div>

            <div class="am-form-group">
                <label for="description" class="am-u-sm-3 am-form-label">类名</label>

                <div class="am-u-sm-9">
                    {!! Form::text('action_class') !!}
                    <small></small>
                </div>
            </div>

            <div class="am-form-group">
                <label for="description" class="am-u-sm-3 am-form-label">方法名</label>

                <div class="am-u-sm-9">
                    {!! Form::text('action_method') !!}
                    <small></small>
                </div>
            </div>

            <div class="am-form-group">
                <label for="description" class="am-u-sm-3 am-form-label">action</label>

                <div class="am-u-sm-9">
                    {!! Form::text('action') !!}
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

            <div class="am-form-group">
                <div class="am-u-sm-9 am-u-sm-push-3">
                    <button type="submit" class="am-btn am-btn-primary">保 存</button>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection('content')