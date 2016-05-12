<?php

/**
 * Created by PhpStorm.
 * User: deanhu
 * Date: 16/5/12
 * Time: 16:03
 */
class s extends page
{
    protected $page_size = 20;

    function q()
    {
        $key = $this->req['key'];

        $content = preg_replace("#[^,\s，：\-a-z_A-Z\x{4e00}-\x{9fa5}]+#u", "", $key);

        $sql = "select * from article where content like '%$content%' order by create_time desc limit {$this->page_size}";
        $rows = $this->pdo_db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        G::code_die(200, array('list'=>$rows));
    }
}