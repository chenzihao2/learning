<?php
namespace core;
class Core {
    public function run() {
        return 'this is parents';
    }
}
class Child extends Core {
    public function run() {
        return  parent::run();
        echo 'this is child';
    }
}

$a = new Child;
$a->run();
