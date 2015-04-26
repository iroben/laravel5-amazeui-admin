<?php
/**
 * Created by PhpStorm.
 * User: liubin
 * Date: 15/4/20
 * Time: 22:46
 */

namespace App\Http\Middleware;


use Closure;
use App\Models\ActionModel;
use Route;
use View;
use Auth;
use Session;

class PermissionManager
{
    function __construct()
    {
        // TODO: Implement __construct() method.
    }


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (!Auth::check()) {
            Session::flash('msg', '请先登录');

            return redirect('login');
        }

        $user = Auth::user();

        $currentAction = Route::currentRouteAction();

        if ($user->is_admin) {

            $actions = ActionModel::where('pid', 0)->with('children')->get();
        } else {

            $user->load('role.actions.children');
            $actions = $this->buildTree($user->role->actions);

            if (!$this->checkPermission($currentAction, $actions)) {

                Session::flash('msg', '对不起,你没有权限访问该资源');

                return redirect('login');
            }
        }

        View::share('actions', $actions);

        return $next($request);
    }

    /**
     * 将所有的操作递归成树形结构
     * @param $actions
     * @param int $pid
     * @return \Illuminate\Support\Collection
     */
    private function buildTree($actions, $pid = 0)
    {
        $returnValue = array();
        foreach ($actions as $action) {
            if ($action->pid == $pid) {
                $children = $this->buildTree($actions, $action->id);
                if ($children) {
                    $action->children = $children;
                }
                $returnValue[] = $action;
            }
        }

        return collect($returnValue);

    }

    /**
     * 检查用户的操作中是否有当前操作的权限
     * @param $currentAction
     * @param $actions
     * @param int $level
     * @return bool
     */
    private function checkPermission($currentAction, $actions, $level = 1)
    {
        $flag = false;
        foreach ($actions as $action) {
            
            $flag = $currentAction === $action->action_namespace . '\\' . $action->action;
            if (!$flag && $action->children
                && !$action->children->isEmpty()
            ) {
                $flag = $this->checkPermission($currentAction, $action->children);
            }
            if ($flag) {
                break;
            }
        }

        return $flag;

    }


}
