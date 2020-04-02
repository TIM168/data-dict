<?php

namespace Tim168\DataDict\Data;

class Draw
{
    public function dataToHtml($tables)
    {
        if (!empty($tables)) {
            $html = '';
            foreach ($tables as $k => $v) {
                $html .= '<table border="1" cellspacing="0" cellpadding="0" align="center">';
                $html .= '<caption>' . $v['TABLE_NAME'] . ' ' . $v['TABLE_COMMENT'] . '</caption>';
                $html .= '<tbody><tr><th>字段名</th><th>数据类型</th><th>默认值</th>  
                    <th>允许非空</th>  
                    <th>自动递增</th><th>备注</th></tr>';
                $html .= '';
                foreach ($v['COLUMN'] as $f) {
                    $html .= '<tr><td class="c1">' . $f['COLUMN_NAME'] . '</td>';
                    $html .= '<td class="c2">' . $f['COLUMN_TYPE'] . '</td>';
                    $html .= '<td class="c3"> ' . $f['COLUMN_DEFAULT'] . '</td>';
                    $html .= '<td class="c4"> ' . $f['IS_NULLABLE'] . '</td>';
                    $html .= '<td class="c5">' . ($f['EXTRA'] == 'auto_increment' ? '是' : ' ') . '</td>';
                    $html .= '<td class="c6"> ' . $f['COLUMN_COMMENT'] . '</td>';
                    $html .= '</tr>';
                }
                $html .= '</tbody></table></p>';
            }
            return $html;
        } else {
            return false;
        }
    }

    public function ToHtml($title, $html)
    {
        $content = '<html>  
                    <head>  
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
                    <title>' . $title . '</title>  
                    <style>  
                    body,td,th {font-family:"宋体"; font-size:12px;}  
                    table{border-collapse:collapse;border:1px solid #CCC;background:#efefef;}  
                    table caption{text-align:left; background-color:#fff; line-height:2em; font-size:14px; font-weight:bold; }  
                    table th{text-align:left; font-weight:bold;height:26px; line-height:26px; font-size:12px; border:1px solid #CCC;}  
                    table td{height:20px; font-size:12px; border:1px solid #CCC;background-color:#fff;}  
                    .c1{ width: 120px;}  
                    .c2{ width: 120px;}  
                    .c3{ width: 70px;}  
                    .c4{ width: 80px;}  
                    .c5{ width: 80px;}  
                    .c6{ width: 270px;}  
                    </style>  
                    </head>  
                    <body>
                    <h1 style="text-align:center;">' . $title . '</h1>
                    ' . $html . ' 
                    </body></html>';

        return $content;
    }
}