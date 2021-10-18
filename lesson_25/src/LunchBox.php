<?php

namespace Lesson_25;

use Exception;
use IteratorAggregate;
use Traversable;
use ArrayIterator;
use Countable;

class LunchBox implements IteratorAggregate, Countable
{
    protected $food = [];

    protected $original = true;

    public function __construct(array $food = [])
    {
        $this->food = $food;
    }

    public function __clone()
    {
        $this->original = false;
    }

    public function all()
    {
        return $this->food;
    }

    public function filter($callback)
    {
        return new static(array_filter($this->food, $callback));
    }

    public function shift()
    {
        return array_shift($this->food);
    }

    public function isEmpty()
    {
        return empty($this->food);
    }

    /*
    public function current()
    {
        $var = current($this->food);
        echo "actual: $var\n";
        return $var;
    }

    public function next()
    {
        $var = next($this->food);
        echo "siguiente: $var\n";
        return $var;
    }

    public function key()
    {
        $var = key($this->food);
        echo "clave: $var\n";
        return $var;
    }

    public function valid()
    {
        $clave = key($this->food);
        $var = ($clave !== NULL && $clave !== FALSE);
        echo "válido: $var\n";
        return $var;
    }

    public function rewind()
    {
        echo "rebobinado\n";
        reset($this->food);
    }
    */


    public function getIterator()
    {
        return new ArrayIterator($this->food);
    }

    public function count()
    {
        return count($this->food);
    }
}