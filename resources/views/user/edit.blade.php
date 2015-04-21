@extends('amazeui.main')
@section('content')
    <hr/>
    {!! Form::model($model,array('action'=>array('UserController@update',$model->id),'method'=>'PUT','class'=>'am-form am-form-horizontal')) !!}
    <div class="am-g">
        <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
            <div class="am-panel am-panel-default">
                <div class="am-panel-bd">
                    <div class="am-g">
                        <div class="am-u-md-4">
                            <img class="am-img-circle am-img-thumbnail"
                                 src="http://amui.qiniudn.com/bw-2014-06-19.jpg?imageView/1/w/1000/h/1000/q/80" alt="">
                        </div>
                        <div class="am-u-md-8">
                            <div class="am-form-group">
                                {!! Form::file('avatar') !!}
                                <p class="am-form-help">请选择要上传的文件...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
            <div class="am-form-group">
                <label for="user-name" class="am-u-sm-3 am-form-label">用户名</label>

                <div class="am-u-sm-9">
                    {!! Form::text('user_name') !!}
                    <small></small>
                </div>
            </div>

            <div class="am-form-group">
                <label for="user-name" class="am-u-sm-3 am-form-label">真实姓名</label>

                <div class="am-u-sm-9">
                    {!! Form::text('real_name') !!}
                    <small></small>
                </div>
            </div>

            <div class="am-form-group">
                <label for="user-email" class="am-u-sm-3 am-form-label">Email</label>

                <div class="am-u-sm-9">
                    {!! Form::email('email') !!}
                </div>
            </div>

            <div class="am-form-group">
                <label for="user-email" class="am-u-sm-3 am-form-label">角色</label>

                <div class="am-u-sm-9">
                    {!! Form::select('role_id',$lists) !!}
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