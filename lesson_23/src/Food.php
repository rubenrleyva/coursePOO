<?php

namespace Lesson_23;

class Food extends Model
{

    public function getBeverageAttribute()
    {
        return $this->attributes['beverage'] ?? false;
    }

}