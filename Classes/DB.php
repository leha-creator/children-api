<?php


namespace Children\Classes;
use PDO;

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

    public static function query($table, $fields = [], $params = [])
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

        $inlineParams = "";

        if (!empty($params)) {
            $inlineParams = "WHERE ";
            foreach ($params as $param) {
                $inlineParams .= "`" . $param[0] . "` " . $param[1] . " " . $param[2] . " AND ";
            }

            $inlineParams = substr($inlineParams,0,-4);

        }

        $sql = "SELECT " . $inlineFields . " FROM `" . $table . "`" . $inlineParams;

//        return $sql;

        $result = $db->DBConnection->query($sql);
        $data = [];

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $data[] = $row;
        }

        return $data;
    }
}