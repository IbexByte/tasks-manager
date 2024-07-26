<?php
namespace App\Controllers;
use App\Database\QueryBuilder;
use App\Core\Request;

class TaskController
{

    public function index()
    {
        $tasks = QueryBuilder::index('tasks');
        view('index', ['tasks' => $tasks]);
    }

    public function store()
    {
        $description = $_POST["description"];

        QueryBuilder::insert('tasks', [
            'description' => $description,
        ]);


       back();
    }
    public function update()
    {
        $id = Request::getData("id");
        $completed = Request::getData("completed");

        QueryBuilder::update('tasks', $id,[
            'completed' => $completed
        ]);


        back();
    }
    public function delete()
    {

        $id = Request::getData("id");
     
        QueryBuilder::delete('tasks', $id);


        back();
    }
}