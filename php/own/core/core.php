<?php
namespace core;

class Core {
    public static $classMap = [];

    static public function run() {
        echo 'this is run';
    }

    static function load($class) {
        $class = str_replace('\\', '/', $class);
        if (isset(self::$classMap[$class])) {
            return true;
        }

        $file = OWN . '/' . $class . '.php';
        if (is_file($file)) {
            include  $file;
            self::$classMap[$class] = $class;
        } else {
            return false;
        }
    }

    public function parents() {
        $a = 'this is parents';
        return $a;
    }
}
