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

    class Animal {
        // 需要加上封裝才能使用$
        public $type='animal';
        public $name='John';
        public $hair_color='black';


        function __construct($type,$name,$hair_color){
            $this->type=$type;
            $this->name=$name;
            $this->hair_color=$hair_color;
        }

        function run(){
            echo $this->name.' is running';
        }

        function speed(){
            echo $this->name.' is running at 20km/h';
        }




    }




// 物件的使用發法先實例化
// 實例化(instance) =>常用於遊戲內的副本
$cat=new Animal('cat','kitty','white');

// 物件裡的"->"是取用的意思

echo $cat->type;
echo $cat->name;
echo $cat->hair_color;
echo $cat->run();
echo $cat->speed();











?>
</body>
</html>