<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>物件導向</title>
<style>


</style>

</head>
<body>
<h1>物件的宣告</h1>
    <?php

    // 針對物件的抽象化宣告 / 抽象化=>不給定明確的值或內容



    // animai=>是動物的總稱，也是抽象的，所以可以拿來當宣告
    // class是一個藍圖 => 需要實例化
    class Animal {
        // 需要加上封裝才能使用
        protected $type='animal';
        protected $name='John';
        protected $hair_color='black';
        protected $feet=['front-left','front-right','back-left','back-right'];


        // function=>預設為public
        // constructor: 用來初始化物件的屬性
        function __construct($type,$name,$hair_color){
            $this->type=$type;
            $this->name=$name;
            $this->hair_color=$hair_color;
        }

        // 方法
        function run(){
            echo $this->name.' is running';
        }

        public function speed(){
            echo $this->name.' is running at 20km/h';
        }

         // getName 方法，取得動物的名稱
        // 需要內部回傳時使用
        public function getName(){
            return $this->name;
        }

     // setName 方法，用來設定動物的名稱
        public function setName($name){
            $this->name=$name;
        }

        function getFeet(){
            return $this->feet;
        }


    }




// 物件的使用發法先實例化
// 實例化(instance) =>常用於遊戲內的副本
$cat=new Animal('cat','kitty','white');
print_r($cat->getFeet());
// 物件裡的"->"是取用的意思

// echo $cat->type;
echo $cat->getName();
// echo $cat->name;
// echo $cat->hair_color;
echo $cat->run();
echo $cat->speed();
// print_r($cat->feet);

echo $cat->setName('Mary');
echo $cat->getName();

?>

<h1>繼承</h1>
<?php


class Cat extends Animal implements Behavior{
    protected $type='cat';
    protected $name="Judy";
    function __construct($hair_color){
        $this->hair_color=$hair_color;
    }

    function jump(){
        echo $this->name . "jumpping 2m";
    }


}


Interface Behavior{
    public function run();
    public function speed();
    public function jump();
}





$mycat=new Cat('white');
print_r($mycat->getFeet());
echo $mycat->getName();
echo "<br>";
echo $mycat->run();
echo "<br>";
echo $mycat->speed();
echo "<br>";
$mycat->setName("judy");
echo $mycat->getName();
echo "<br>";
echo $mycat->jump();

?>
 <h1>靜態宣告</h1>

 <?php
class Dog extends Animal implements Behavior{
    protected $type='dog';
    protected $name='Doggy';
    protected static  $count=0;
    //static $count=0;

    function __construct($hair_color){
        $this->hair_color=$hair_color;
        self::$count++;
    }

    function bark(){
        echo $this->name . " is barking";
    }

    function getFeet(){
        return $this->feet;
    }

    static function getCount(){
        return self::$count;
    }

    function jump(){
        echo $this->name . " jumpping 1m";
    }
}

echo Dog::getCount();

$dog1=new Dog('brown');
$dog2=new Dog('black');
$dog3=new Dog('orange');
$dog4=new Dog('white');
$dog5=new Dog('white');


echo Dog::getCount();
?>
</body>
</html>