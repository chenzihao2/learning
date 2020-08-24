<?php
namespace auto\autotest;

class Container {

    public $instances = [];

    protected static $instance;

    private function __construct() {

    } 

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function set($key, $val) {
        $this->instances[$key] = $val;
    }

    public function get($key) {
        return $this->instances[$key];
    }
}
