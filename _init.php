<?php 
use App\Database\QueryBuilder;
use App\Database\DBConnection;
use App\App;

require "vendor/autoload.php";


App::set('config', require './config.php');
QueryBuilder::make(DBConnection::make(App::get('config')['database']));