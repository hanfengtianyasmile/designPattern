<?php 


//装饰器模式做文章修饰功能

class BaseArt{

    protected $content;

    protected $art = null;

    public function __construct($content){
        $this->content = $content;
    }

    public function decorator(){
        return $this->content;
    }


}


//编辑文章摘要


class BianArt extends BaseArt{

    public function __construct(BaseArt $art){
        $this->art = $art;
        $this->decorator();
    }

    public function decorator(){
        return $this->content = $this->art->decorator().'小编摘要';
    }

}


//SEO模式

class SeoArt extends BaseArt{

    public function __construct(BaseArt $art){
        $this->art = $art;
        $this->decorator();
    }

    public function decorator(){
        return $this->content = $this->art->decorator().'SEO优化';
    }

}

$b = new SeoArt(new BianArt(new BaseArt('好好学习')));

echo $b->decorator();







 ?>