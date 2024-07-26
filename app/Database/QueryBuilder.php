<?php

namespace App\Database;

use App\Core\Request;



class QueryBuilder
{

    private static $pdo;


    public static function make(\PDO $pdo)
    {
        self::$pdo = $pdo;
    }

    public static function index(string $table)
    {
        $completed = Request::getData("completed");
        if($completed != null){

            $query = self::$pdo->prepare("SELECT * FROM  {$table} WHERE completed = {$completed}"  );
        }else{

            $query = self::$pdo->prepare("SELECT * FROM  {$table}" );
        }
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_CLASS);
    }

    public static function insert($table,$data)
    {
        $fieldsKey = array_keys($data);
        $fieldsKeyStr = implode(',',$fieldsKey);
        $valueStr = str_repeat('?,' , count($fieldsKey) - 1) . '?' ;
        $value = array_values($data);
        self::excute("INSERT INTO {$table} ({$fieldsKeyStr}) VALUES ({$valueStr}) ",$value);


    }
    public static function update($table,$id,$data)
    {

        try {
                    $fieldsKey = array_keys($data);
        $fieldsKeyStr = implode(' = ? , ', $fieldsKey) . ' = ?';
        $value = array_values($data);
        self::excute("UPDATE  {$table} SET  $fieldsKeyStr  WHERE  id = {$id} " , $value);
        //code...
        } catch (\Exception $er) {
             echo $er->getMessage();
        }


    }


    public static function delete($table, $id   , $operator = '=', $column = 'id'){
        self::excute("DELETE FROM {$table} WHERE {$column} {$operator} {$id} ");
       

    }

    public static function excute($query, $value = null){
        $query = self::$pdo->prepare($query);
        $query->execute($value);


    }



}