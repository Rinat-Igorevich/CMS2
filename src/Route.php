<?php

namespace App;

use Closure;
use function helpers\extractURLData;

class Route
{
    private string $path;
    private string $method;
    private $callback;

    /**
     * @param string $path
     * @param string $method
     * @param array $callback
     */
    public function __construct(string $method, string $path, $callback)
    {
        $this->path = $path;
        $this->method = $method;
        $this->callback = $this->prepareCallback($callback);
    }

    /**
     * @param $callback
     * @return false|mixed
     */
    private function prepareCallback($callback)
    {
         if (!($callback instanceof Closure)) {
             list($class, $method) = explode('@', $callback);
             $object = new $class;
             $callback = [$object, $method];
        }

        return $callback;

    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $uri
     * @param string $method
     * @return bool
     */
    public function match(string $uri, string $method): bool
    {
        return preg_match('/^' . str_replace(['*', '/'], ['\w+', '\/'], $this->getPath() ). '$/', $uri) && $this->method == $method;
    }

    /**
     * @return false|mixed
     */
    public function run($url)
    {

        return call_user_func_array($this->callback, extractURLData($url,$this->getPath()) );
    }
}
