<h1 align="center"> Data Dict</h1>

<p align="center"> PHP components that can generate data dictionaries in HTML and PDF formats</p>

[![Build Status](https://travis-ci.org/TIM168/data-dict.svg?branch=master)](https://travis-ci.org/TIM168/data-dict)
[![Latest Stable Version](https://poser.pugx.org/tim168/data-dict/v/stable)](https://packagist.org/packages/tim168/data-dict)
[![Total Downloads](https://poser.pugx.org/tim168/data-dict/downloads)](https://packagist.org/packages/tim168/data-dict)
[![Latest Unstable Version](https://poser.pugx.org/tim168/data-dict/v/unstable)](https://packagist.org/packages/tim168/data-dict)
[![License](https://poser.pugx.org/tim168/data-dict/license)](https://packagist.org/packages/tim168/data-dict)
[![composer.lock](https://poser.pugx.org/tim168/data-dict/composerlock)](https://packagist.org/packages/tim168/data-dict)

README: [中文](https://github.com/TIM168/data-dict/blob/master/README.md "中文")/[English](https://github.com/TIM168/data-dict/blob/master/README-en.md "English")

## Install

```shell
$ composer require tim168/data-dict
```

## Use
    require __DIR__ .'/vendor/autoload.php';

    use Tim168\DataDict\DataDict;
    
    $data = new DataDict('dbHost', 'dbUserName', 'Password', 'dbName','port');
    $data->get('fileName','type','lang');

## Parameters
	dbHost：Database IP address
	dbUserName：Database account
	Password：Database password
	dbName：Database names
	port：Database port number (3306 by default)
	fileName：fileName
	type：html or pdf
	lang：zh-CN（chinese）、en（english）
## get html
    $data->get('test','html','en');
## get pdf
    $data->get('test','pdf','en');
	
## demo
![pdf demo](https://github.com/TIM168/data-dict/blob/master/src/demo/pdf.png)
	
![html demo](https://github.com/TIM168/data-dict/blob/master/src/demo/html.png)
	
## License
**MIT**

## End
#### Thank you for giving me a star
