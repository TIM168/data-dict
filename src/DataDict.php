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

    public function __construct($dbHost, $dbUserName, $dbPassWord, $dbName, $dbPort = '3306')
    {
        $this->dbHost = $dbHost;
        $this->dbUserName = $dbUserName;
        $this->dbPassWord = $dbPassWord;
        $this->dbName = $dbName;
        $this->dbPort = $dbPort;
    }

    public function get($fileName = 'dict', $type = 'html', $lang = 'zh-CN')
    {
        $fetch = new Fetch();
        $tables = $fetch->conn($this->dbHost, $this->dbUserName, $this->dbPassWord, $this->dbName, $this->dbPort);
        if (!empty($tables)) {
            $draw = new Draw();
            $html = $draw->dataToHtml($tables, $lang);
            $content = $draw->ToHtml($lang == 'zh-CN' ? '数据字典' : 'Data Dict', $html);
            if ($type == 'pdf') {
                $draw->ToPdfFile($content,$fileName);
            } else {
                $draw->ToHtmlFile($content, $fileName);
            }
        }
        return true;
    }
}