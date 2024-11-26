<?php

    // 定義一個 DB 類別來處理資料庫操作
    // 假設抽到20號
class DB{
     // 資料庫的資料來源名稱（DSN），包括了主機名稱、編碼以及資料庫名稱
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=db20";
    protected $pdo;
    protected $table;

    function __construct($table){
        // pdo主要將內容傳出去
        $this->table = $table;
        $this->pdo = new PDO($this->dsn,'root','');
    }

    function all(){
        return $this->q("SELECT * FROM $this->table");
    }

    function q($sql){
        return $this->pdo->query($sql)->fetchALL();
    }



}

function dd($array){
    echo "<pre>";
    print_r($array);
    echo"</pre>";
}

$DEPT=new DB('dept');

// $dept=$DEPT->q("SELECT * FROM dept");
$dept=$DEPT->all();


dd($dept);


?>