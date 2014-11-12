<?php

session_start();

date_default_timezone_set('Europe/Minsk');

$start_memory = memory_get_usage();
$start_time = microtime();

ini_set('display_errors', 1);

$url ="http://".$_SERVER['SERVER_NAME']."/";

$application = "application/";

$modules = "modules/";

$system = "system/";

define('URL',$url);

define('DOCROOT', realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR);

if (is_dir(DOCROOT.$application))
{
	$application = DOCROOT.$application;
}

if (is_dir(DOCROOT.$modules))
{
	$modules = DOCROOT.$modules;
}

if (is_dir(DOCROOT.$system))
{
	$system = DOCROOT.$system;
}
	
define('APPPATH', realpath($application).DIRECTORY_SEPARATOR);
define('MODPATH', realpath($modules).DIRECTORY_SEPARATOR);
define('SYSPATH', realpath($system).DIRECTORY_SEPARATOR);

if (file_exists('Autoload.php'))
{
    include_once 'Autoload.php';
}
else
{
    exit("Authoload file not exist!");
}

if (file_exists('install.php'))
{
    include_once 'install.php';
}

if (file_exists(MODPATH.'ErrorHandler.php'))
{
    include_once MODPATH.'ErrorHandler.php';
}

if (file_exists(APPPATH.'bootstrap.php'))
{
    include_once APPPATH.'bootstrap.php';
}
$finish_time=microtime();

$result_time = $finish_time - $start_time;
$memory =round((memory_get_usage()- $start_memory)/1024/1024, 2);
$finish_memory = round(memory_get_usage()/1024/1024, 2);
$pick_Memory = round(memory_get_peak_usage()/1024/1024, 2);
echo "Страница загрузилась за ".$result_time." секунд.Выделенно ".$memory." MB. Всего ".$finish_memory." MB.Пиковое использование памати ".$pick_Memory." MB.";
?>