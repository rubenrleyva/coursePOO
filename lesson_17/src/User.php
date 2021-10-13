<?php

namespace Lesson_17;

class User extends Model
{

    public function getFirstNameAttribute($value): string
    {
        return strtoupper($value);
    }


}