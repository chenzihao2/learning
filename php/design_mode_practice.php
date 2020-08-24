<?php
//单例模式
class Db {
    private static $db;
    private function __construct() {

    }

    static function getInstance() {
        if (self::$db) {
            return self::$db;
        } else {
            self::$db = new self;
            return self::$db;
        }
    }
}
$db1 = Db::getInstance();
$db2 = Db::getInstance();
//工厂模式


class Factory {
    static function createDb() {
        return Db::getInstance();
    }
}
$db1 = Factory::createDb();
$db2 = Factory::createDb();
//var_dump($db1, $db2);
//
//观察者模式
class Event extends EventGenerator{
    function trigger() {
		echo "begin\n";
		$this->notify();
    }
}

abstract class EventGenerator {
    private $observers = [];
    public function addObserver( Observer $observer) {
        $this->observers[] = $observer;
    }

    public function notify() {
        foreach ($this->observers as $item) {
            $item->update();
        }
    }
}

interface Observer {
    function update();
}

class LookObserver implements Observer {
    function update() {
        echo 'i am look';
    }
}
$event = new Event;
$event->addObserver(new LookObserver);
$event->trigger();
