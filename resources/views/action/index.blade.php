@extends('amazeui.main')
@section('content')
    <hr>
    <div class="am-g">
        <div class="am-panel am-panel-default">
            <div class="am-panel-hd">操作管理
                <div class="am-btn-group am-btn-group-xs am-fr">
                    <a href="{{ action('ActionController@create',array('pid'=>0)) }}"
                       class="am-btn am-btn-default am-btn-xs am-text-secondary"><span
                                class="am-icon-plus"></span> 添加
                    </a>
                </div>
            </div>
            <div class="am-panel-bd">
                <div class="am-g">
                    @foreach($actions as $action)
                        <div class="am-u-md-12">
                            <div class="am-panel am-panel-default">
                                <div class="am-panel-hd" title="{{ $action->description }}">{{ $action->action_name }}
                                        <div class="am-btn-group am-btn-group-xs am-fr">
                                            {!! Form::open(array('action'=>array('ActionController@destroy', $action->id),'method'=>'DELETE')) !!}
                                            <div class="am-btn-group am-btn-group-xs am-fr">
                                                <a href="{{ action('ActionController@create',array('pid'=>$action->id)) }}"
                                                   class="am-btn am-btn-default am-btn-xs am-text-secondary"><span
                                                            class="am-icon-plus"></span> 添加
                                                </a>
                                                <a href="{{ action('ActionController@edit',array('pid'=>$action->id)) }}"
                                                   class="am-btn am-btn-default am-btn-xs am-text-secondary"><span
                                                            class="am-icon-plus"></span> 编辑
                                                </a>
                                                <button type="submit"
                                                        class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only">
                                                    <span class="am-icon-trash-o"></span> 删除
                                                </button>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                </div>
                                <div class="am-panel-bd">
                                    <div class="am-g">
                                        @foreach($action->children as $subaction)
                                            <div class="am-u-md-4 am-u-end">
                                                {!! Form::open(array('action'=>array('ActionController@destroy', $subaction->id),'method'=>'DELETE')) !!}
                                                <div class="am-panel am-panel-default">
                                                    <div class="am-panel-hd"
                                                         title="{{ $subaction->description }}">{{ $subaction->action_name }}
                                                            <div class="am-btn-group am-btn-group-xs am-fr">
                                                                <a href="{{ action('ActionController@create',array('pid'=>$subaction->id)) }}"
                                                                   class="am-btn am-btn-default am-btn-xs am-text-secondary"><span
                                                                            class="am-icon-plus"></span> 添加
                                                                </a>
                                                                <a href="{{ action('ActionController@edit',array('pid'=>$subaction->id)) }}"
                                                                   class="am-btn am-btn-default am-btn-xs am-text-secondary"><span
                                                                            class="am-icon-plus"></span> 编辑
                                                                </a>
                                                                <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only">
                                                                    <span class="am-icon-trash-o"></span> 删除
                                                                </button>
                                                            </div>
                                                    </div>
                                                    {!! Form::close() !!}
                                                    @foreach($subaction->children as $subsubaction)
                                                        {!! Form::open(array('action'=>array('ActionController@destroy', $subsubaction->id),'method'=>'DELETE')) !!}
                                                        <div class="am-panel-bd"
                                                             title="{{ $subsubaction->description }}">{{ $subsubaction->action_name }}

                                                            <div class="am-btn-group am-btn-group-xs am-fr">
                                                                <a href="{{ action('ActionController@edit',array('pid'=>$subsubaction->id)) }}"
                                                                   class="am-btn am-btn-default am-btn-xs am-text-secondary"><span
                                                                            class="am-icon-plus"></span> 编辑
                                                                </a>
                                                                <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only">
                                                                    <span class="am-icon-trash-o"></span> 删除
                                                                </button>
                                                            </div>
                                                        </div>
                                                        {!! Form::close() !!}
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection('content')