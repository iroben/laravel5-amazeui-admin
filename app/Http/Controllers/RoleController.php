<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\RoleRepository;

class RoleController extends Controller
{
    protected $viewName = 'role';

    /**
     * @param RoleRepository $role
     */
    function __construct(RoleRepository $role)
    {
        $this->repository = $role;
    }

}
