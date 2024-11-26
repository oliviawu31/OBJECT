<?php


// 假設抽到20號
class DB{
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=db20";
    protected $pdo;
    protected $table;

    function __construct($table){
        // pdo主要將內容傳出去
        $this->table = $table;
        $this->pdo = new PDO($this->dsn,'root','');
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

$dept=$DEPT->q("SELECT * FROM dept");

dd($dept);


?>