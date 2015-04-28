<?php
/**
 * Created by PhpStorm.
 * User: liubin
 * Date: 15/4/20
 * Time: 22:06
 */

namespace App\Repositories;


use App\Models\ActionModel;
use App\Models\RoleModel;

class RoleRepository extends BaseRepository
{
    protected $actionReposity;
    protected $name = 'role';

    /**
     * @param RoleModel $role
     * @param ActionRepository $actionReposity
     */
    public function __construct(RoleModel $role, ActionRepository $actionReposity)
    {
        $this->model = $role;
        $this->actionReposity = $actionReposity;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {

        return array_merge(parent::edit($id), array('actions' => $this->actionReposity->all()));

    }

    /**
     * @param $id
     * @param $data
     */
    public function update($id, $data)
    {
        $role = $this->getById($id);
        $role->update($data);
        $role->actions()->sync($this->actions($data['actions']));
    }

    /**
     * @param $actions
     * @return array
     */
    private function actions($actions)
    {
        $returnValue = array();
        foreach ($actions as $action) {
            $returnValue = array_merge($returnValue, $this->parentIds($action));
        }

        return array_unique($returnValue);

    }

    /**
     * @param $id
     * @return array
     */
    private function parentIds($id)
    {
        $pids = array($id);
        $info = ActionModel::find($id);
        if ($info && $info->pid != 0) {
            $return = $this->parentIds($info->pid);
            if ($return) {
                $pids = array_merge($pids, $return);
            }
        }

        return $pids;

    }

    /**
     * @param $requestData
     * @return static
     */
    public function store($requestData)
    {
        $role = parent::store($requestData);
        $role->actions()->attach($this->actions($requestData['actions']));

        return $role;
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        $role = $this->getById($id);
        $role->actions()->detach();
        $role->delete();
    }

    /**
     * @return mixed
     */
    public function selectLists()
    {
        return RoleModel::lists('role_name', 'id');
    }

}