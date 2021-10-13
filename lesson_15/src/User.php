<?php

namespace Lesson_15;

class User
{

    protected $attributes = [];

    public function __construct(array $attributes = [])
    {
        $this->fill($attributes);
    }

    /*
    public function __construct(array $attributes = [])
    {
        foreach ($attributes as $key => $value){
            $this->$key  = $value;
        }
    }
    */

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function fill(array $attributes = [])
    {
        $this->attributes = $attributes;
    }

    public function getAttribute($name)
    {
        if (array_key_exists($name, $this->attributes)) {
            return isset($this->attributes) ? $this->attributes[$name] : null;
        }
    }

    public function setAttribute($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    public function __set($name, $value)
    {
        $this->setAttribute($name, $value);
    }

    public function __get($name)
    {
        return $this->getAttribute($name);
    }

    public function hasAttribute($name): bool
    {
        return isset($this->attributes[$name]);
    }

    public function __isset($name)
    {
        $this->hasAttribute($name);
    }

    public function __unset($name)
    {
        unset($this->attributes[$name]);
    }

}