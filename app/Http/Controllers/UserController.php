<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\UserRepository;

class UserController extends Controller
{

    protected $viewName = 'user';

    /**
     * @param UserRepository $userRepository
     */
    function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

}
