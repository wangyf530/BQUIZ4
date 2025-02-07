<?php
date_default_timezone_set('Asia/Taipei');
session_start();

class DB
{
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db18";
    protected $pdo;
    protected $table;

    function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, 'root', '');
    }

    // 超過兩個參數就直接用...$arg
    function all(...$arg)
    {
        $sql = "SELECT * FROM $this->table ";
        // 如果...$arg有東西
        if (!empty($arg[0]) && is_array($arg[0])) {
            $tmp = $this->arrayToSQL($arg[0]);
            $sql .= " WHERE " . join(" && ", $tmp);
        } else if (!is_array($arg[0])) {
            // 如果第一個不是空的但不是陣列
            $sql .= $arg[1];
        }
        //  再後面 limit/having/group by 之類的
        if (!empty($arg[1])) {
            $sql .= $arg[1];
        }
        return $this->fetch_all($sql);
    }

    function find($array)
    {
        $sql = "SELECT * FROM $this->table ";
        if (is_array($array)) {
            $tmp = $this->arrayToSQL($array);
            $sql .= " WHERE " . join(" && ", $tmp);
        } else {
            // 不是字串 默認是id
            $sql .= " WHERE `id`='$array'";
        }
        return $this->fetch_one($sql);
    }

    function save($array) {
        if(isset($array['id'])){
            // update
            $id = $array['id'];
            $tmp = $this->arrayToSQL($array);
            $sql = "UPDATE $this->table SET " . join(" , ",$tmp) . "WHERE `id` = '$id'";
        } else {
            // insert
            // 變成陣列
            $keys = join("`,`",array_keys($array));
            $values = join("','",$array);
            $sql = " INSERT INTO $this->table (`{$keys}`) VALUES ('{$values}')";
        }
        return $this->pdo->exec($sql);
    }

    function del($array) {
        $sql = "DELETE FROM $this->table ";
        if (is_array($array)) {
            $tmp = $this->arrayToSQL($array);
            $sql .= " WHERE " . join(" && ", $tmp);
        } else {
            // 不是字串 默認是id
            $sql .= " WHERE `id`='$array'";
        }
        return $this->pdo->exec($sql);
    }

    function count(...$array) {
        $sql = "SELECT COUNT(*) FROM $this->table WHERE ";
        // 如果...$array
        if (!empty($array[0]) && is_array($array[0])) {
            $tmp = $this->arrayToSQL($array[0]);
            $sql .= " WHERE " . join(" && ", $tmp);
        } else if (!is_array($array[0])) {
            // 如果第一個不是空的但不是陣列
            $sql .= $array[1];
        }
        //  再後面 limit/having/group by 之類的
        if (!empty($array[1])) {
            $sql .= $array[1];
        }
        return $this->fetch_one($sql);
    }

    function math() {}

    // solid 單一工作職責原則
    function arrayToSQL($array)
    {
        $tmp = [];
        foreach ($array as $key => $value) {
            $tmp[] = "`$key`='$value'";
        }
        return $tmp;
    }

    function fetch_one($sql)
    {
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function fetch_all() {}

    function to($url)
    {
        header("location:" . $url);
    }

    function q($sql)
    {
        $dsn = "mysql:host=localhost;charset=utf8;dbname=db18";
        $pdo = new PDO($dsn, 'root', '');
        return $pdo->query($sql)->fetchAll();
    }
}
