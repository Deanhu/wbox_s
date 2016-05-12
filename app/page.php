<?php
if (!defined('ROOT')) {
    die('error');
}

class page
{
    protected $req;

    protected $pdo_db;
    protected $smarty;
    protected $redis;
    protected $redis_status;
    protected $user;

    public function __construct()
    {
        $this->req = $_REQUEST;

        // init PDO
        list($mysql_host, $mysql_port) = explode(':', MYSQL_HOST);
        $this->pdo_db = new PDO("mysql:host=" . $mysql_host . ";dbname=" . MYSQL_DBNAME, MYSQL_USERNAME, MYSQL_PWD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

        // init redis
        $this->redis = new Redis();
        $this->redis->connect(REDIS_CACHE_HOST, REDIS_CACHE_PORT, 300);
        $this->redis_status = $this->redis->ping();
    }

    public function __call($name, $arguments)
    {
        G::code_die(404, '无效的路径');
    }
}