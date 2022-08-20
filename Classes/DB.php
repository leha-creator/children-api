<?php


namespace Children\Classes;
require_once "../config.php";

class DB
{
    protected $DBConnection;
    
    function __construct()
    {
        $host = "host=" . DATABASE_HOST . ";";
        $port = "port=" . DATABASE_PORT . ";";
        $dbname = "dbname=" . DATABASE_NAME;
        try {
            $this->DBConnection = new \PDO("mysql:" . $host . $port . $dbname, DATABASE_USER_LOGIN, DATABASE_USER_PASSWORD);
            $this->DBConnection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Connection failed : " . $e->getMessage();
        }
    }

    public static function query($table, $fields = [], $params = []): array
    {
        $db = new self;

        $inlineFields = "*";

        if (!empty($fields)) {
            $inlineFields = "";
            foreach ($fields as $fieldName) {
                $inlineFields .= "`" . $fieldName . "`, ";
            }
            $inlineFields = substr($inlineFields,0,-2);
        }

        $sql = "SELECT " . $inlineFields . " FROM `" . $table . "`";

        $result = $db->DBConnection->query($sql);
        $data = [];

        while($row = $result->fetch()){
            $data[] = $row;
        }

        return $data;
    }
}