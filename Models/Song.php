<?php

namespace Children\Models;

require_once "Model.php";

use Children\Models\Model;

class Song extends Model
{
    protected static $table = "songs";
    protected static $fields = [
        "title" => ""
    ];


}