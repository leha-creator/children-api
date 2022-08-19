<?php

namespace Children\Models;

require_once "../Classes/DB.php";

use Children\Classes\DB;

class Model
{
    protected $fields = [];
    public $table = "songs";

    public static function getData() : array
    {
        $model = new self();

//        $fieldsToGet = [];
//
//        foreach($model->fields as $key => $params)
//        {
//            $fieldsToGet[] = $key;
//        }

        return DB::query($model->table);
    }
}