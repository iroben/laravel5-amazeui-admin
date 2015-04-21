<?php
/**
 * Created by PhpStorm.
 * User: liubin
 * Date: 15/4/20
 * Time: 22:06
 */

namespace App\Repositories;


use App\Models\UserModel;

class UserRepository extends BaseRepository
{
    protected $name = 'user';
    protected $roleRepository;

    /**
     * @param UserModel $user
     * @param RoleRepository $roleRepository
     */
    function __construct(UserModel $user, RoleRepository $roleRepository)
    {
        $this->model = $user;
        $this->roleRepository = $roleRepository;

    }

    /**
     * @return array
     */
    public function create()
    {
        $lists = $this->roleRepository->selectLists();

        return array('lists' => $lists);
    }

    /**
     * @param $id
     * @return array
     */
    public function edit($id)
    {
        $lists = $this->roleRepository->selectLists();

        return array_merge(parent::edit($id), array('lists' => $lists));
    }

    public function selectLists()
    {
        return UserModel::lists('user_name', 'id');
    }

}