<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\ActionRepository;
use Illuminate\Http\Request;

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
