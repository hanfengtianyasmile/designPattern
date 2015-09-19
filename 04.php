<?php 


//单例模式
//

// 普通类
// class sigle{

// }


// $s1 = new sigle();
// $s2 = new sigle();

// //注意，2个对象是实例化同一个的时候，才全等
// if($s1 === $s2){
//     echo "是";
// } else {
//     echo '不是';
// }

//封锁new 操作
//内部new对象
//getIns预先判断实例
//加final,防止继承，再被实例化
//还有防止克隆

final class sigle{

    private static $ins;



     private function __construct(){

    }

    public static function getIns(){
        if(!self::$ins instanceof self){
            self::$ins = new self();    
        }
        return self::$ins;
        
    } 

    private function __clone(){

    }

}


$s1 = sigle::getIns();

$s2 = sigle::getIns();


if($s1 === $s2){
    echo "是";
} else {
    echo '不是';
}




 ?>