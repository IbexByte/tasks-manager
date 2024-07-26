<?php
use App\Core\Request;
use App\Controllers\TaskController;
use App\Core\Router;

require "./_init.php";



Router::make()
->get('',[TaskController::class, 'index'])
->get('index',[TaskController::class, 'index'])
->post('create/task',[TaskController::class, 'store'])
->post('delete/task',[TaskController::class, 'delete'])
->get('updateStatus/task',[TaskController::class, 'update'])
  ->resolve(Request::uri(), Request::method());






?>

