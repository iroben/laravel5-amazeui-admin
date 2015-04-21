<?php namespace App\Models;


class ActionModel extends BaseModel
{

    protected $table = 'action';
    protected $fillable = array(
        'action_name',
        'action_namespace',
        'action_class',
        'action_method',
        'prefix_class',
        'action',
        'pid',
        'created',
        'description'
    );


    public function children()
    {
        return $this->hasMany($this, 'pid');
    }

    public function parent()
    {
        return $this->belongsTo($this, 'pid');
    }

}
