<?php

namespace Tim168\DataDict\Data;

use Tim168\DataDict\Exceptions\MysqlErrorException;

class Fetch
{
    public function conn($dbHost, $dbUserName, $dbPassWord, $dbName, $dbPort)
    {
        try {
            $mysqlConn = mysqli_connect($dbHost, $dbUserName, $dbPassWord, '', $dbPort);
            mysqli_select_db($mysqlConn, $dbName);
            mysqli_query($mysqlConn, 'set names utf8');
            $tableResult = mysqli_query($mysqlConn, 'show tables');
            while ($row = mysqli_fetch_array($tableResult)) {
                $tables[]['TABLE_NAME'] = $row[0];
            }
            if (!empty($tables)) {
                foreach ($tables as $k => $v) {
                    $sql = 'SELECT * FROM ';
                    $sql .= 'INFORMATION_SCHEMA.TABLES ';
                    $sql .= 'WHERE ';
                    $sql .= "table_name = '{$v['TABLE_NAME']}' AND table_schema = '{$dbName}'";
                    $tableResult = mysqli_query($mysqlConn, $sql);
                    while ($t = mysqli_fetch_array($tableResult)) {
                        $tables[$k]['TABLE_COMMENT'] = $t['TABLE_COMMENT'];
                    }
                    $sql = 'SELECT * FROM ';
                    $sql .= 'INFORMATION_SCHEMA.COLUMNS ';
                    $sql .= 'WHERE ';
                    $sql .= "table_name = '{$v['TABLE_NAME']}' AND table_schema = '{$dbName}'";
                    $fields = array();
                    $fieldsResult = mysqli_query($mysqlConn, $sql);
                    while ($t = mysqli_fetch_array($fieldsResult)) {
                        $fields[] = $t;
                    }
                    $tables[$k]['COLUMN'] = $fields;
                }
                return $tables;
            }
            return false;
        } catch (\Exception $e) {
            throw new MysqlErrorException($e->getMessage(), $e->getCode(), $e);
        } finally {
            if (!empty($mysqlConn)) mysqli_close($mysqlConn);
        }
    }
}