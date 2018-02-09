<?php
/**
 * 将各种截然不同的函数接口封装成统一的API。
 */
interface Adapter
{
    function connect($host, $user, $passwd, $dbname);
    function query($sql);
    function close();
}
