<?php 

//简单工程模式



//共同接口
interface db{

    //链接数据库
    function conn();

}


//服务端开发，不会知道谁来调用，但是实现接口就好了
class dbmysql{

    public function conn(){
        echo "连上了mysql";
    }
}

class dboracle{
    public function conn(){
        echo "oracle";
    }
}


//简单工厂
class Factory{

    public static function createDB($type){
        if ($type == 'mysql') {
            return new dbmysql();
        } else if($type == 'oracle'){
            return new dboracle();
        } else {
            throw new Exception('错误数据库类型',1);
        }
    } 

}

//客户端，看不到dbmysql dboracle的内部细节
//只知道对方开放了一个Factory::createDB的方法
//方法运行修改数据库名称


$db = Factory::createDB('mysql');

$db->conn();



//但是如果新增一个数据库类型怎么办，
//服务端要修改Factory的内容（在java、c++中，改后还得再编译）
//在面向对象的设计法则中，重要的开闭原则----对于修改是封闭，对于扩展是开放的。
//
//那么就要用工厂模式了









 ?>