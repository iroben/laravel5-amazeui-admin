<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\RoleRepository;
use Illuminate\Http\Request;

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
