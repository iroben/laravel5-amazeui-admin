<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\ActionRepository;

class ActionController extends Controller
{

    protected $viewName = 'action';

    /**
     * @param ActionRepository $repository
     */
    function __construct(ActionRepository $repository)
    {
        $this->repository = $repository;
    }

}
