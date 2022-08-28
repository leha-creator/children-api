<?php

namespace Children\Classes;

class Response
{
    public static function json($data)
    {
        header('Content-Type: application/json');

        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }
}