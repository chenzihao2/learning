<?php
namespace core;

class Route {
    public function __construct() {
        $r = $_SERVER['REQUEST_URI'];
        $path = [];
        if ($r && $r != '/') {
            $r = ltrim($r, "/index.p");
            $r = ltrim($r, "hp/");
            $path = explode('/', $r);
        } else {
            $path[] = 'index';
            $path[] = 'index';
        }
        d($path);
        echo 'this is route';
    }
}
