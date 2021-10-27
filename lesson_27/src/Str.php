<?php

namespace Lesson_27;

class Str
{
    public static function studly($value)
    {
        //return str_replace(' ', '',ucwords(str_replace('_','', $value)));
        return strpos($value, '_') ? ucwords(explode('_', $value)[0]).ucwords(explode('_', $value)[1]) : ucwords($value);
    }
}