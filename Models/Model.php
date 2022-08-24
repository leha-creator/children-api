<?php

namespace Children\Models;

require_once "../Classes/DB.php";

use Children\Classes\DB;

class Model
{
    protected static $table = "";
    protected static $fields = [];

    public static function all()
    {

        $fieldsToGet = [];

        foreach(static::$fields as $key => $params)
        {
            $fieldsToGet[] = $key;
        }

        return DB::query(static::$table, $fieldsToGet);
    }

    public static function find($id)
    {

        $fieldsToGet = [];

        foreach(static::$fields as $key => $params)
        {
            $fieldsToGet[] = $key;
        }

        $params = [
            ["id", "=", $id],
        ];

        return DB::query(static::$table, $fieldsToGet, $params);
    }
}