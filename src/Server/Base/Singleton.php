<?php

namespace Server\Base;

trait Singleton {
    protected static $instance = null;

    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    final function __clone() {}
    final function __wakeup() {}
}