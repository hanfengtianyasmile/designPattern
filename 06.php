<?php 

//责任链模式，模拟发帖检测，级别由低到高分别为版主，管理员，警察。

class board{

    protected $power = 1;

    protected $top = 'admin';

    public function process ($lev){
        if ($lev <= $this->power) {
            echo '版主删帖';
        } else {
            $top = new $this->top;
            $top->process($lev);
        }
    }

}


class admin{

    protected $power = 2;

    protected $top = 'police';

    public function process($lev){
        if ($lev <= $this->power) {
            echo '管理员账号';
        } else {
            $top = new $this->top;
            $top->process($lev);
        }
    }


}



class police {

    protected $power;

    protected $top = null;

    public function process($lev){
        echo '抓起来';
    }

}


$lev = rand(1,3);

$judge = new board();


$judge->process($lev);



 ?>