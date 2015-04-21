<?php namespace App\Models;


class RoleModel extends BaseModel
{
    protected $table = 'role';
    protected $fillable = array(
        'role_name',
        'user_id',
        'created',
        'description'
    );

    public function actions()
    {
        return $this->belongsToMany('App\Models\ActionModel', 'role_action', 'role_id', 'action_id');
    }

}
