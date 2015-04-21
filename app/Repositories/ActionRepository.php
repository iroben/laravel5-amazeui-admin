<?php
/**
 * Created by PhpStorm.
 * User: liubin
 * Date: 15/4/20
 * Time: 22:06
 */

namespace App\Repositories;


use App\Models\ActionModel;

class ActionRepository extends BaseRepository
{
    protected $name = 'action';

    /**
     *
     * @param ActionModel $role
     */
    public function __construct(ActionModel $role)
    {
        $this->model = $role;
    }

    /**
     * @param int $pageSize
     * @return mixed
     */
    public function index()
    {
        return array('actions' => $this->model->where('pid', 0)->with('children')->get());
    }


    public function destroy($id)
    {
        $action = $this->getById($id);
        /**
         * 递归删除所有子节点
         */
        if (!$action->children->isEmpty()) {
            foreach ($action->children as $subaction) {
                $this->destroy($subaction->id);
            }
        }
        $action->delete();
    }

    public function all()
    {
        return $this->model->where('pid', 0)->get();
    }

}