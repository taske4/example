<?php require_once 'init.php';

$url = 'https://vk.com/';

$outputFileName = formatFile('results/result.json');

/*
 * ======================================================
 */

try {
    $app = new App\Main;
    $app->main($url, $outputFileName);

    echo "\nFile with result in the file is ${outputFileName}";
} catch (Exception $e) {
    $log->error($e->getMessage());
} finally {
    $endTime = new DateTime('now');
    $interval = $startTime->diff($endTime);
    $interval = $interval->format('%S секунд, %f  микросекунд');

    $log->warning($interval);
    echo("\n" . $interval);
}