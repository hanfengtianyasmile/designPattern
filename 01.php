<?php 
//多态

abstract class Tiger{
    public abstract function climb();
}


class XTiger extends Tiger{
    public function climb(){
        echo '我不会爬树';
    }
}

class MTiger extends Tiger{
    public function climb(){
        echo '我会啊';
    }
}

//客户端调用
class Client {
    public static function call(Tiger $animal){
        $animal->climb();
    }
}


Client::call(new MTiger());












 ?>