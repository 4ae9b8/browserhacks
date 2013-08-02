<?php

class Browserhacks {

  private static $isLive;
  private static $tld;

  function __construct() {
  }

  /**
   * Start the application.
   */
  public static function run() {
    // Init
    self::init();
  }

  /**
   * Initialize.
   */
  protected static function init() {
    self::$isLive = false;

    // Local vs production
    if (preg_match('!(browserhacks.com)!', $_SERVER['HTTP_HOST']) == 1) {
      self::$isLive = true;
    }

    // Set Top-Level-Domain
    self::$tld = substr(strrchr($_SERVER['SERVER_NAME'], "."), 1);
  }

  /**
   * Returns true if this is the live system
   * otherwise false
   *
   * @return Boolean self::$isLive;
   */
  public static function isLive() {
    return self::$isLive;
  }

  /**
   * Return the actual top level domain.
   *
   * @return String self::$tld
   */
  public static function getTLD() {
    return self::$tld;
  }
}

?>