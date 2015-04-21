<?php

use App\Models\ActionModel;
use App\Models\UserModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('user')->truncate();
        DB::table('action')->truncate();


        $left_bar = array();
        $left_bar[] = $this->home();
        $left_bar[] = $this->module1();
        $left_bar[] = $this->module2();
        $left_bar[] = $this->module3();
        $this->action_seed($left_bar);
        $this->testUser();

        // $this->call('UserTableSeeder');
    }

    private function testUser()
    {
        UserModel::create(array(
            'user_name' => 'roben',
            'real_name' => 'roben',
            'email'     => 'xxx@qq.com',
            'is_admin'  => 1,
            'password'  => Hash::make('roben')
        ));
        UserModel::create(array(
            'user_name' => 'test1',
            'real_name' => 'test1',
            'email'     => 'xxx@qq.com',
            'password'  => Hash::make('test1')
        ));
        UserModel::create(array(
            'user_name' => 'test2',
            'real_name' => 'test2',
            'email'     => 'xxx@qq.com',
            'password'  => Hash::make('test2')

        ));
    }

    private function action_seed($left_bar, $pid = 0)
    {
        foreach ($left_bar as $val) {
            $model = ActionModel::create(array(
                'action_name'      => $val['action_name'],
                'pid'              => $pid,
                'action'           => $val['action'],
                'action_namespace' => $val['action_namespace'],
                'action_class'     => $val['action_class'],
                'action_method'    => $val['action_method'],
                'created'          => time(),
                'prefix_class'     => $val['prefix_class']
            ));
            if (isset($val['children']) && $val['children']) {
                $this->action_seed($val['children'], $model->id);
            }
        }
    }

    private function home()
    {
        return array(
            'prefix_class'     => 'am-icon-home',
            'action_name'      => '首页',
            'action'           => 'HomeController@index',
            'action_namespace' => 'App\Http\Controllers',
            'action_class'     => 'HomeController',
            'action_method'    => 'index'
        );
    }

    private function module1()
    {
        return array(
            'prefix_class'     => 'am-icon-gear',
            'action_name'      => '权限管理',
            'action'           => '',
            'action_namespace' => 'App\Http\Controllers',
            'action_class'     => '',
            'action_method'    => '',
            'children'         => array(
                array(
                    'prefix_class'     => 'am-icon-user',
                    'action_name'      => '用户管理',
                    'action'           => 'UserController@index',
                    'action_namespace' => 'App\Http\Controllers',
                    'action_class'     => 'UserController',
                    'action_method'    => 'index',
                    'children'         => array(array(
                        'prefix_class'     => 'am-icon-user',
                        'action_name'      => '浏览',
                        'action'           => 'UserController@index',
                        'action_namespace' => 'App\Http\Controllers',
                        'action_class'     => 'UserController',
                        'action_method'    => 'index'
                    ), array(
                        'prefix_class'     => 'am-icon-user',
                        'action_name'      => '编辑',
                        'action'           => 'UserController@edit',
                        'action_namespace' => 'App\Http\Controllers',
                        'action_class'     => 'UserController',
                        'action_method'    => 'edit'
                    ), array(
                        'prefix_class'     => 'am-icon-user',
                        'action_name'      => '更新',
                        'action'           => 'UserController@update',
                        'action_namespace' => 'App\Http\Controllers',
                        'action_class'     => 'UserController',
                        'action_method'    => 'update'
                    ), array(
                        'prefix_class'     => 'am-icon-user',
                        'action_name'      => '创建',
                        'action'           => 'UserController@create',
                        'action_namespace' => 'App\Http\Controllers',
                        'action_class'     => 'UserController',
                        'action_method'    => 'create'
                    ), array(
                        'prefix_class'     => 'am-icon-user',
                        'action_name'      => '添加',
                        'action'           => 'UserController@store',
                        'action_namespace' => 'App\Http\Controllers',
                        'action_class'     => 'UserController',
                        'action_method'    => 'store'
                    ), array(
                        'prefix_class'     => 'am-icon-user',
                        'action_name'      => '删除',
                        'action'           => 'UserController@destroy',
                        'action_namespace' => 'App\Http\Controllers',
                        'action_class'     => 'UserController',
                        'action_method'    => 'destroy'
                    ))
                ), array(
                    'prefix_class'     => 'am-icon-users',
                    'action_name'      => '角色管理',
                    'action'           => 'RoleController@index',
                    'action_namespace' => 'App\Http\Controllers',
                    'action_class'     => 'RoleController',
                    'action_method'    => 'index',
                    'children'         => array(array(
                        'prefix_class'     => 'am-icon-user',
                        'action_name'      => '浏览',
                        'action'           => 'RoleController@index',
                        'action_namespace' => 'App\Http\Controllers',
                        'action_class'     => 'RoleController',
                        'action_method'    => 'index'
                    ), array(
                        'prefix_class'     => 'am-icon-user',
                        'action_name'      => '编辑',
                        'action'           => 'RoleController@edit',
                        'action_namespace' => 'App\Http\Controllers',
                        'action_class'     => 'RoleController',
                        'action_method'    => 'index'
                    ), array(
                        'prefix_class'     => 'am-icon-user',
                        'action_name'      => '更新',
                        'action'           => 'RoleController@update',
                        'action_namespace' => 'App\Http\Controllers',
                        'action_class'     => 'RoleController',
                        'action_method'    => 'update'
                    ), array(
                        'prefix_class'     => 'am-icon-user',
                        'action_name'      => '创建',
                        'action'           => 'RoleController@store',
                        'action_namespace' => 'App\Http\Controllers',
                        'action_class'     => 'RoleController',
                        'action_method'    => 'create'
                    ), array(
                        'prefix_class'     => 'am-icon-user',
                        'action_name'      => '添加',
                        'action'           => 'RoleController@store',
                        'action_namespace' => 'App\Http\Controllers',
                        'action_class'     => 'RoleController',
                        'action_method'    => 'store'
                    ), array(
                        'prefix_class'     => 'am-icon-user',
                        'action_name'      => '删除',
                        'action'           => 'RoleController@destroy',
                        'action_namespace' => 'App\Http\Controllers',
                        'action_class'     => 'RoleController',
                        'action_method'    => 'destroy'
                    ))
                ), array(
                    'prefix_class'     => 'am-icon-puzzle-piece',
                    'action_name'      => '操作管理',
                    'action'           => 'ActionController@index',
                    'action_namespace' => 'App\Http\Controllers',
                    'action_class'     => 'ActionController',
                    'action_method'    => 'index',
                    'children'         => array(array(
                        'prefix_class'     => 'am-icon-user',
                        'action_name'      => '浏览',
                        'action'           => 'ActionController@index',
                        'action_namespace' => 'App\Http\Controllers',
                        'action_class'     => 'ActionController',
                        'action_method'    => 'index'
                    ), array(
                        'prefix_class'     => 'am-icon-user',
                        'action_name'      => '编辑',
                        'action'           => 'ActionController@edit',
                        'action_namespace' => 'App\Http\Controllers',
                        'action_class'     => 'ActionController',
                        'action_method'    => 'edit'
                    ), array(
                        'prefix_class'     => 'am-icon-user',
                        'action_name'      => '更新',
                        'action'           => 'ActionController@update',
                        'action_namespace' => 'App\Http\Controllers',
                        'action_class'     => 'ActionController',
                        'action_method'    => 'update'
                    ), array(
                        'prefix_class'     => 'am-icon-user',
                        'action_name'      => '创建',
                        'action'           => 'ActionController@create',
                        'action_namespace' => 'App\Http\Controllers',
                        'action_class'     => 'ActionController',
                        'action_method'    => 'create'
                    ), array(
                        'prefix_class'     => 'am-icon-user',
                        'action_name'      => '添加',
                        'action'           => 'ActionController@store',
                        'action_namespace' => 'App\Http\Controllers',
                        'action_class'     => 'ActionController',
                        'action_method'    => 'store'
                    ), array(
                        'prefix_class'     => 'am-icon-user',
                        'action_name'      => '删除',
                        'action'           => 'ActionController@destroy',
                        'action_namespace' => 'App\Http\Controllers',
                        'action_class'     => 'ActionController',
                        'action_method'    => 'destroy'
                    ))
                )
            )
        );
    }

    private function module2()
    {
        return array(
            'prefix_class'     => 'am-icon-gear',
            'action_name'      => '测试模块1',
            'action'           => '',
            'action_namespace' => 'App\Http\Controllers',
            'action_class'     => '',
            'action_method'    => '',
            'children'         => array(
                array(
                    'prefix_class'     => 'am-icon-user',
                    'action_name'      => '测试1',
                    'action'           => 'Test1Controller@index',
                    'action_namespace' => 'App\Http\Controllers',
                    'action_class'     => 'Test1Controller',
                    'action_method'    => 'index',
                    'children'         => array(array(
                        'prefix_class'     => 'am-icon-user',
                        'action_name'      => '浏览',
                        'action'           => 'Test1Controller@index',
                        'action_namespace' => 'App\Http\Controllers',
                        'action_class'     => 'Test1Controller',
                        'action_method'    => 'index'
                    ), array(
                        'prefix_class'     => 'am-icon-user',
                        'action_name'      => '编辑',
                        'action'           => 'Test1Controller@edit',
                        'action_namespace' => 'App\Http\Controllers',
                        'action_class'     => 'Test1Controller',
                        'action_method'    => 'edit'
                    ), array(
                        'prefix_class'     => 'am-icon-user',
                        'action_name'      => '更新',
                        'action'           => 'Test1Controller@update',
                        'action_namespace' => 'App\Http\Controllers',
                        'action_class'     => 'Test1Controller',
                        'action_method'    => 'update'
                    ), array(
                        'prefix_class'     => 'am-icon-user',
                        'action_name'      => '创建',
                        'action'           => 'Test1Controller@create',
                        'action_namespace' => 'App\Http\Controllers',
                        'action_class'     => 'Test1Controller',
                        'action_method'    => 'create'
                    ), array(
                        'prefix_class'     => 'am-icon-user',
                        'action_name'      => '添加',
                        'action'           => 'Test1Controller@store',
                        'action_namespace' => 'App\Http\Controllers',
                        'action_class'     => 'Test1Controller',
                        'action_method'    => 'store'
                    ), array(
                        'prefix_class'     => 'am-icon-user',
                        'action_name'      => '删除',
                        'action'           => 'Test1Controller@destroy',
                        'action_namespace' => 'App\Http\Controllers',
                        'action_class'     => 'Test1Controller',
                        'action_method'    => 'destroy'
                    ))
                )
            )
        );
    }

    private function module3()
    {
        return array(
            'prefix_class'     => 'am-icon-gear',
            'action_name'      => '测试模块2',
            'action'           => '',
            'action_namespace' => 'App\Http\Controllers',
            'action_class'     => '',
            'action_method'    => '',
            'children'         => array(
                array(
                    'prefix_class'     => 'am-icon-user',
                    'action_name'      => '测试2',
                    'action'           => 'Test2Controller@index',
                    'action_namespace' => 'App\Http\Controllers',
                    'action_class'     => 'Test2Controller',
                    'action_method'    => 'index',
                    'children'         => array(array(
                        'prefix_class'     => 'am-icon-user',
                        'action_name'      => '浏览',
                        'action'           => 'Test2Controller@index',
                        'action_namespace' => 'App\Http\Controllers',
                        'action_class'     => 'Test2Controller',
                        'action_method'    => 'index'
                    ), array(
                        'prefix_class'     => 'am-icon-user',
                        'action_name'      => '编辑',
                        'action'           => 'Test2Controller@edit',
                        'action_namespace' => 'App\Http\Controllers',
                        'action_class'     => 'Test2Controller',
                        'action_method'    => 'edit'
                    ), array(
                        'prefix_class'     => 'am-icon-user',
                        'action_name'      => '更新',
                        'action'           => 'Test2Controller@update',
                        'action_namespace' => 'App\Http\Controllers',
                        'action_class'     => 'Test2Controller',
                        'action_method'    => 'update'
                    ), array(
                        'prefix_class'     => 'am-icon-user',
                        'action_name'      => '创建',
                        'action'           => 'Test2Controller@create',
                        'action_namespace' => 'App\Http\Controllers',
                        'action_class'     => 'Test2Controller',
                        'action_method'    => 'create'
                    ), array(
                        'prefix_class'     => 'am-icon-user',
                        'action_name'      => '添加',
                        'action'           => 'Test2Controller@store',
                        'action_namespace' => 'App\Http\Controllers',
                        'action_class'     => 'Test2Controller',
                        'action_method'    => 'store'
                    ), array(
                        'prefix_class'     => 'am-icon-user',
                        'action_name'      => '删除',
                        'action'           => 'Test2Controller@destroy',
                        'action_namespace' => 'App\Http\Controllers',
                        'action_class'     => 'Test2Controller',
                        'action_method'    => 'destroy'
                    ))
                )
            )
        );
    }
}
