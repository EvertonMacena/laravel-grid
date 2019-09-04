<?php


namespace App\Table;


use Illuminate\Database\Eloquent\Builder;

class Table
{

    private $rows = [];
    /**
     * @var Builder
     */
    private $model = null;
    private $modelOriginal = null;
    private $perPage = 15;
    private $columns = [];

    public function paginate($perPage)
    {
        $this->perPage = $perPage;
        return $this;
    }

    public function rows()
    {
        return $this->rows;
    }

    public function model($model = null)
    {
        if(!$model) return $this->model;

        $this->model = !is_object($model) ? new $model : $model;
        $this->modelOriginal = clone $this->model;
        return $this;
    }

    public function columns($columns = null)
    {
        if(!$columns) return $this->columns;

        $this->columns = $columns;
        return $this;
    }

    public function search()
    {
        $keyName = $this->modelOriginal->getkeyName();
        $columns = collect($this->columns())->pluck('name')->toArray();
        array_unshift($columns, $keyName);
        $this->rows = $this->model->paginate($this->perPage, $columns);
        return $this;
    }

}
