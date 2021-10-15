<?php

namespace Lesson_19;

class User extends Model
{

    public $id = 5;
    public $table = 'users';

    private $dbPassword = 'secret';

    public function __toString()
    {
        return $this->name;
    }

    /**
     * Función que serializa unas propiedades y otras no.
     * @return array
     */
    public function __sleep()
    {
        return ['id'];
    }

    public function __wakeup()
    {
        //$this->attributes['name'] = strtoupper($this->attributes['name']);
    }

    public function getFirstNameAttribute($value): string
    {
        return strtoupper($value);
    }
}