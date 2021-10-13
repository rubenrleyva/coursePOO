<?php

namespace Lesson_16;

class Str
{

    public static function studly($value)
    {
        return str_replace(' ', '',ucwords(str_replace('_','', $value)));
    }


}