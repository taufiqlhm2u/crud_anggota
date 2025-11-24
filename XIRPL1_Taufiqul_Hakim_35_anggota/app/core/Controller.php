<?php 

class Controller 
{
    public function view($view, $data = [])
    {
        include '../app/views/' . $view . '.php';
    }

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

}