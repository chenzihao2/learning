<?php
namespace facade;
use think\Facade;

class Confacade extends Facade {
    protected static function getFacadeClass()  {
        return '\app\common\Confacade';
    }
}
