<?php

namespace App;

use function helpers\array_get;

class Config
{
    private static $instance = null;

    private array $configurations = [];

    private function __construct()
    {
        $this->load();
    }

    private function load()
    {
        $this->configurations ['db'] = require $_SERVER['DOCUMENT_ROOT'] . '/config/db.php';
    }

    public function get($config, $default = null)
    {
        return array_get($this->configurations, $config);
    }

    public static function getConfig()
    {
        return self::$instance === null
             ? self::$instance = new static()
             : self::$instance;
    }
}