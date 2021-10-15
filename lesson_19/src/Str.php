<?php

namespace Lesson_19;

class Str
{

    public static function studly($value)
    {
        return str_replace(' ', '',ucwords(str_replace('_','', $value)));
    }


}