<?php 

//观察者模式


//会员登录


class user implements SplSubject{

    public $loginnum;

    public $hobby;

    public function __construct($hobby){
        $this->loginnum = rand(1,10);
        $this->hobby = $hobby;
        $this->observers = new SplObjectStorage();
    }

    public function login(){
        //操作session
        $this->notify();
    }


    public function attach(SPLObserver $observer){
        $this->observers->attach($observer);
    }

    public function detach(SPLObserver $observer){
        $this->observers->detach($observer);
    }


    public function notify(){
        $this->observers->rewind();
        while ($this->observers->valid()) {
            $observer = $this->observers->current();
            $observer->update($this);
            $this->observers->next();
        }
    }


}

class secrity implements SPLObserver{

    public function update(SplSubject $subject){
        if ($subject->loginnum < 3) {
            echo '这是第 '.$subject->loginnum .'次安全登录';
        } else {
            echo '这是第 '.$subject->loginnum . '次登陆，异常';
        }
    }

}



class ad implements SPLObserver{

    public function update(SplSubject $subject){
        if ($subject->hobby == 'sports') {
            echo '门票预订';
        } else {
            echo '好好学习';
        }
    }


}



//实施观察
$user = new user('study');

$user->attach(new secrity());

$user->attach(new ad());

$user->login();










 ?>