<div class="am-g" id="role_actions">
    <div class="am-panel am-panel-default">
        <div class="am-panel-hd">操作权限
            <div class="am-btn-group am-btn-group-xs am-fr">
                <label class="am-checkbox">
                    <input type="checkbox" value="0" class="action_0" data-am-ucheck>
                </label>
            </div>
        </div>
        <div class="am-panel-bd">
            <div class="am-g">
                @foreach($actions as $action)
                    <div class="am-u-md-12">
                        <div class="am-panel am-panel-default">
                            <div class="am-panel-hd" title="{{ $action->description }}">{{ $action->action_name }}
                                <div class="am-btn-group am-btn-group-xs am-fr">
                                    <label class="am-checkbox">
                                        @if(str_contains(Route::currentRouteAction(),'@create') )
                                            <input type="checkbox" name="actions[]" value="{{ $action->id }}" class="action_0" data-am-ucheck>
                                        @else
                                            <?php $flag = true; ?>
                                            @foreach($model->actions as $val)
                                                @if($val->id == $action->id)
                                                    <input type="checkbox" name="actions[]" value="{{ $action->id }}" class="action_0" checked data-am-ucheck>
                                                    <?php $flag = false;?>
                                                @endif
                                            @endforeach
                                            @if($flag)
                                                <input type="checkbox" name="actions[]" value="{{ $action->id }}" class="action_0" data-am-ucheck>
                                            @endif
                                        @endif
                                    </label>
                                </div>
                            </div>
                            <div class="am-panel-bd">
                                <div class="am-g">
                                    @foreach($action->children as $subaction)
                                        <div class="am-u-md-4 am-u-end">
                                            <div class="am-panel am-panel-default">
                                                <div class="am-panel-hd"
                                                     title="{{ $subaction->description }}">{{ $subaction->action_name }}
                                                    <div class="am-btn-group am-btn-group-xs am-fr">
                                                        <label class="am-checkbox">
                                                            @if(str_contains(Route::currentRouteAction(),'@create') )
                                                                <input type="checkbox" name="actions[]" value="{{ $subaction->id }}" class="action_0 action_{{ $action->id }}" data-am-ucheck>
                                                            @else
                                                                <?php $flag = true; ?>
                                                                @foreach($model->actions as $val)
                                                                    @if($val->id == $subaction->id)
                                                                        <input type="checkbox" name="actions[]" value="{{ $subaction->id }}" checked class="action_0 action_{{ $action->id }}" data-am-ucheck>
                                                                        <?php $flag = false;?>
                                                                    @endif
                                                                @endforeach
                                                                @if($flag)
                                                                    <input type="checkbox" name="actions[]" value="{{ $subaction->id }}" class="action_0 action_{{ $action->id }}" data-am-ucheck>
                                                                @endif
                                                            @endif
                                                        </label>
                                                    </div>
                                                </div>
                                                @foreach($subaction->children as $subsubaction)
                                                    <div class="am-panel-bd"
                                                         title="{{ $subsubaction->description }}">{{ $subsubaction->action_name }}

                                                        <div class="am-btn-group am-btn-group-xs am-fr">
                                                            @if(str_contains(Route::currentRouteAction(),'@create') )
                                                                <label class="am-checkbox">
                                                                    <input type="checkbox" name="actions[]" value="{{ $subsubaction->id }}" class="action_0 action_{{ $action->id }} action_{{ $subaction->id }}" data-am-ucheck>
                                                                </label>
                                                            @else
                                                                <label class="am-checkbox">
                                                                    <?php $flag = true; ?>
                                                                    @foreach($model->actions as $val)
                                                                        @if($val->id == $subsubaction->id)
                                                                            <input type="checkbox" name="actions[]" value="{{ $subsubaction->id }}" checked class="action_0 action_{{ $action->id }} action_{{ $subaction->id }}" data-am-ucheck>
                                                                            <?php $flag = false;?>
                                                                        @endif
                                                                    @endforeach
                                                                    @if($flag)
                                                                        <input type="checkbox" name="actions[]" value="{{ $subsubaction->id }}" class="action_0 action_{{ $action->id }} action_{{ $subaction->id }}" data-am-ucheck>
                                                                    @endif
                                                                </label>
                                                            @endif

                                                        </div>
                                                    </div>
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