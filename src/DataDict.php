<?php

/**
 * by tim168 <784699571@qq.com>
 * github https://github.com/TIM168
 */
namespace Tim168\DataDict;

use Tim168\DataDict\Data\Draw;
use Tim168\DataDict\Data\Fetch;

/**
 * Class DataDict
 * @package Tim168\DataDict
 */
class DataDict
{
    public $dbHost;
    public $dbUserName;
    public $dbPassWord;
    public $dbName;
    public $dbPort;

    /**
     * DataDict constructor.
     * @param $dbHost
     * @param $dbUserName
     * @param $dbPassWord
     * @param $dbName
     * @param string $dbPort
     */
    public function __construct($dbHost, $dbUserName, $dbPassWord, $dbName, $dbPort = '3306')
    {
        $this->dbHost = $dbHost;
        $this->dbUserName = $dbUserName;
        $this->dbPassWord = $dbPassWord;
        $this->dbName = $dbName;
        $this->dbPort = $dbPort;
    }

    /**
     * @param string $fileName
     * @param string $type
     * @param string $lang
     * @return bool
     * @throws Exceptions\MysqlErrorException
     * @throws \Mpdf\MpdfException
     */
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