<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$startTime = new DateTime('now');

/*
 * ===================================
 */

require_once 'vendor/autoload.php';

function formatFile(String $path): string
{
    $arPath = explode('/', $path);
    $fileName = array_pop($arPath);
    $directory = implode('/', $arPath);

    return  "${directory}/"  . date('d_m_Y') . '_' . uniqid() . "__${fileName}";
}

$logFileName = formatFile('logs/log.log');

$log = new Logger('exception');
$log->pushHandler(new StreamHandler($logFileName, Logger::WARNING));