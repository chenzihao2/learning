<?php
namespace auto\autotest;

class Attest {
    public static function run() {
        echo 'this is attest';
    }

    public function gogo(go $obj) {
        $obj->dontgo();
    }
}
