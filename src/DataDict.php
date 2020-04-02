<?php

namespace Tim168\DataDict;

use Tim168\DataDict\Data\Draw;
use Tim168\DataDict\Data\Fetch;

class DataDict
{
    public $dbHost;
    public $dbUserName;
    public $dbPassWord;
    public $dbName;
    public $dbPort;
    public $title = '数据字典';

    public function __construct($dbHost, $dbUserName, $dbPassWord, $dbName, $dbPort)
    {
        $this->dbHost = $dbHost;
        $this->dbUserName = $dbUserName;
        $this->dbPassWord = $dbPassWord;
        $this->dbName = $dbName;
        $this->dbPort = $dbPort;
    }

    public function get()
    {
        $fetch = new Fetch();
        $tables = $fetch->conn($this->dbHost, $this->dbUserName, $this->dbPassWord, $this->dbName, $this->dbPort);
        var_dump($tables);
        exit();
        if (!empty($tables)) {
            $draw = new Draw();
            $html = $draw->dataToHtml($tables);
            $content = $draw->ToHtml($this->title, $html);
            return $content;
        }
    }
}