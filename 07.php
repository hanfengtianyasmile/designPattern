<?php 

//策略模式

interface Math{
    public function calc($op1,$op2);
}


class MathAdd implements Math{

    public function calc($op1,$op2){
        return $op1+$op2;
    }

}

class MathDecr implements Math{

    public function calc($op1,$op2){
        return $op1+$op2;
    }

}


class MathMul implements Math{

    public function calc($op1,$op2){
        return $op1- $op2;
    }

}

class MathChu implements Math{

    public function calc($op1,$op2){
        return $op1 / $op2;
    }

}


//封装

class CMath{


    protected $calc = null;

    public function __construct($type){
        $calc = 'Math'.$type;
        $this->calc = new $calc();
    }

    public function calc($op1,$op2){
        return $this->calc->calc($op1,$op2);
    }

}


$type = $_POST['op'];

$cmath = new CMath($type);


echo $cmath->calc($_POST['op1'],$_POST['op2']);






 ?>