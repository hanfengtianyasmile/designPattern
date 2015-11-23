<?php 

//桥接模式

abstract class info{

    protected $send = null;

    public function __construct($send){
        $this->send = $send;
    }

    abstract public function msg($content);

    public function send($to,$content){
        $content = $this->msg($content);
        $this->send->send($to,$content);
    }

}


class zn{
    public function send($to,$content){
        echo '站内给'.$to.'内容是'.$content;
    }
}

class email{
    public function send($to,$content){
        echo 'email给'.$to.'内容是'.$content;
    }
}

class sms{
    public function send($to,$content){
        echo 'sms给'.$to.'内容是'.$content;
    }
}


class commoninfo extends info{
    public function msg($content){
        return '紧急'.$content;
    }
}


class dangerinfo extends info{
    public function msg($content){
        return '特急'.$content;
    }
}


//用站内发普通信息

$commoninfo = new commoninfo(new zn());

$commoninfo->send('小米','吃饭啦');




 ?>