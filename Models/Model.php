<?php

namespace Children\Models;

require_once "../Classes/DB.php";

use Children\Classes\DB;

class Model
{
    protected static $table = "";
    protected static $fields = [];

    public static function getData(): array
    {

        $fieldsToGet = [];

        foreach(static::$fields as $key => $params)
        {
            $fieldsToGet[] = $key;
        }

        return DB::query(static::$table, $fieldsToGet);
    }
}