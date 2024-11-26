<?php

    // 定義一個 DB 類別來處理資料庫操作
    // 假設抽到20號
class DB{
     // 資料庫的資料來源名稱（DSN），包括了主機名稱、編碼以及資料庫名稱
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=db20";
    protected $pdo;
    protected $table;

    // 建構式帶參數
    function __construct($table){
        // pdo主要將內容傳出去
        $this->table = $table;
        $this->pdo = new PDO($this->dsn,'root','');
    }

    /**
     * 撈出全部資料 
     * 1.整張資料表
     * 2.有條件
     * 3.其他SQL功能
     */

    // function all(){
    //     $sql="SELECT * FROM $this->table ";
    // return $this->q("SELECT * FROM $this->table");
    function all(...$arg){
        $sql="SELECT * FROM $this->table ";
        if(!empty($arg[0])){
            if(is_array($arg[0])){
                $where=$this->a2s($arg[0]);
                $sql=$sql . " WHERE ". join(" && ",$where);
            }else{
                //$sql=$sql.$arg[0];
                $sql .= $arg[0];
            }
        }

        return $this->fetchAll($sql);
    }
    // 將陣列轉成條件字串陣列
    // a2s => array to string

    function a2s($array){
        $tmp=[];


        foreach($array as $key => $value){
            $tmp[]="`$key`='$value'";
        }
        return $tmp;
    }

    function fetchOne($sql){
        // echo $sql;
        return $this->pdo->query($sql)->fetch();
    }
    function fetchAll($sql){
        // echo $sql
        return $this->pdo->query($sql)->fetchALL();
    }

    // function q($sql){
    //     return $this->pdo->query($sql)->fetchALL();
    // }



}

function dd($array){
    echo "<pre>";
    print_r($array);
    echo"</pre>";
}

$DEPT=new DB('dept');

// $dept=$DEPT->q("SELECT * FROM dept");
$dept=$DEPT->all(['id'=>3]);


dd($dept);


?>