<?php
/**
 * Created by PhpStorm.
 * User: liubin
 * Date: 15/4/20
 * Time: 21:55
 */

namespace App\Repositories;


class BaseRepository
{
    protected $model;
    protected $name;

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        $data = $this->model->all();

        return array($this->getDataName() => $data);
    }

    protected function getDataName()
    {
        if (ends_with($this->name, 's') || ends_with($this->name, 'x')) {
            return $this->name . 'es';
        } elseif (ends_with($this->name, 'y')) {
            return rtrim($this->name, 'y') . 'ies';
        } else {
            return $this->name . 's';
        }
    }

    /**
     * @param $requestData
     * @return static
     */
    public function store($requestData)
    {
        $requestData['created'] = time();

        return $this->model->create($requestData);
    }

    /**
     *
     */
    public function update($id, $data)
    {

        return $this->getById($id)->update($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        $this->getById($id)->delete();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        return array('model' => $this->getById($id));
    }

    /**
     *
     */
    public function show()
    {

    }

    public function create()
    {
        return array();

    }
}