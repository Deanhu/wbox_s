<?php
if (!defined('MYSQL_HOST')) define('MYSQL_HOST', '127.0.0.1');
if (!defined('MYSQL_USERNAME')) define('MYSQL_USERNAME', 'root');
if (!defined('MYSQL_PWD')) define('MYSQL_PWD', '');
if (!defined('MYSQL_DBNAME')) define('MYSQL_DBNAME', 'wbox');

if (!defined('REDIS_CACHE_HOST')) define('REDIS_CACHE_HOST', '127.0.0.1');
if (!defined('REDIS_CACHE_PORT')) define('REDIS_CACHE_PORT', '6379');
if (!defined('REDIS_CACHE_ENABLE')) define('REDIS_CACHE_ENABLE', 1);

if (!defined('ROOT')) define('ROOT', dirname(dirname(__FILE__)));
