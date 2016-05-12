<?php
/**
 * Created by PhpStorm.
 * User: deanhu
 * Date: 16/5/12
 * Time: 14:35
 */

require_once dirname(__File__) . '/etc/define.php';
require_once dirname(__File__) . '/app/page.php';
require_once dirname(__File__) . '/lib/G.php';

$allow_list = array('s');   // 允许的访问文件
$chunnel = true;

$uri = $_SERVER ['REQUEST_URI'];
$do = isset($_REQUEST ['do']) ? $_REQUEST['do'] : 'show.show_index';
$p = explode('.', $do);
$path ['controller'] = $p [0];
$path ['action'] = $p [1];

if (!isset ($path ['controller']))
    $path ['controller'] = "home";
if (!isset ($path ['action']))
    $path ['action'] = "p";
define('CONTROLLER', $path ['controller']);
define('ACTION', $path ['action']);

if (!in_array($path['controller'], $allow_list)) G::code_die(404, '无效地址');

// 实例化程序
$filename = ROOT . "/app/{$path['controller']}.php";
if (!file_exists($filename))
    G::code_die(404, '无效调用');

require_once $filename;
$page = new $path ['controller'] ();
$page->{$path ['action']} ();
