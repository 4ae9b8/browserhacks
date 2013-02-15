<?php

class Browserhacks {

    private static $isLive;
    private static $tld;

    function __construct() {
    }

    public static function run() {
        // Init
        self::init();
    }

    protected static function init() {
        self::$isLive = false;

        // Local vs production
        if (preg_match('!(browserhacks.com)!', $_SERVER['HTTP_HOST']) == 1) {
            self::$isLive = true;
        }

        // Set Top-Level-Domain
        self::$tld = substr(strrchr($_SERVER['SERVER_NAME'], "."), 1);
    }

    public static function isLive() {
        return self::$isLive;
    }

    public static function getTLD() {
      return self::$tld;
    }
}

?>