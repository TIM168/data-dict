<h1 align="center"> Data Dict</h1>

<p align="center"> 可以生成HTML、PDF格式数据字典的PHP组件</p>

[![Build Status](https://travis-ci.org/TIM168/data-dict.svg?branch=master)](https://travis-ci.org/TIM168/data-dict)
[![Latest Stable Version](https://poser.pugx.org/tim168/data-dict/v/stable)](https://packagist.org/packages/tim168/data-dict)
[![Total Downloads](https://poser.pugx.org/tim168/data-dict/downloads)](https://packagist.org/packages/tim168/data-dict)
[![Latest Unstable Version](https://poser.pugx.org/tim168/data-dict/v/unstable)](https://packagist.org/packages/tim168/data-dict)
[![License](https://poser.pugx.org/tim168/data-dict/license)](https://packagist.org/packages/tim168/data-dict)
[![composer.lock](https://poser.pugx.org/tim168/data-dict/composerlock)](https://packagist.org/packages/tim168/data-dict)

README: [中文](https://github.com/TIM168/data-dict/blob/master/README.md "中文")/[English](https://github.com/TIM168/data-dict/blob/master/README-en.md "English")

## 安装

```shell
$ composer require tim168/data-dict
```

## 使用
    require __DIR__ .'/vendor/autoload.php';

    use Tim168\DataDict\DataDict;
    
    $data = new DataDict('dbHost', 'dbUserName', 'Password', 'dbName','port');
    $data->get('fileName','type','lang');

## 参数说明
	dbHost：数据库IP地址
	dbUserName：数据库账号
	Password：数据库密码
	dbName：数据库名称
	port：数据库端口号（默认为3306）
	fileName：文件名
	type：html或pdf
	lang：zh-CN（中文）、en（英文）
## 获取html
    $data->get('test','html','zh-CN');
## 获取pdf
    $data->get('test','pdf','zh-CN');

## 示例图
![pdf 示例图](https://github.com/TIM168/data-dict/blob/master/src/demo/pdf.png)

![html 示例图](https://github.com/TIM168/data-dict/blob/master/src/demo/html.png)

## License
**MIT**

## 后语
#### 欢迎Star
