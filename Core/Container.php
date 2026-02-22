<?php

namespace Core;
class Container
{
    protected array $bindings = [];

    function bind($key, $resolver) :void
    {
        $this->bindings[$key] = $resolver;
    }

    function resolve($key)
    {
        if (!key_exists($key, $this->bindings))
            throw new \Exception('No valid binding is found!');

        return call_user_func($this->bindings[$key]);
    }
}