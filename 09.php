<?php 


//适配器模式

//服务器端代码

class tianqi{

    public static function show(){
        $today = array('tep'=>28,'wind'=>7,'sun'=>'sunny');
        return serialize($today);
    }


}


//增加一个适配器
class AdapterTianqi extends tianqi{

    public static function show(){

        $today = parent::show();

        $today = unserialize($today);

        $today = json_encode($today);

        return $today;


    }

}


//客户端调用

$tq = unserialize(tianqi::show());

echo '温度:'.$tq['tep'].'<br/>';

echo '风力:'.$tq['wind'].'<br/>';

echo 'sun:'.$tq['sun'].'<br/>';


//来了一批java客户端，不认识PHP的串行后的字符串
//把服务器代码改动之后，旧的客户端就会受影响
//
//所以java再来调用，通过适配器调用

$tq = AdapterTianqi::show();

$tq = json_decode($tq);



echo '温度:'.$tq->tep.'<br/>';

echo '风力:'.$tq->wind.'<br/>';

echo 'sun:'.$tq->sun.'<br/>';



 ?>