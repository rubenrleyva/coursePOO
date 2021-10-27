<?php

namespace Lesson_27;

abstract class Model
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
        $value =  $this->getAttributeValue($name);

        if ($this->hasGetMutator($name)) {
            return $this->mutateAttribute($name, $value);
        }

        return $value;
    }


    protected function mutateAttribute($name, $value)
    {
        return $this->{'get'.Str::studly($name).'Attribute'}($value);
    }

    protected function hasGetMutator($name)
    {
        return method_exists($this, 'get'.Str::studly($name).'Attribute');
    }

    public function getAttributeValue($name)
    {
        if (array_key_exists($name, $this->attributes)) {
            return $this->attributes[$name];
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