<?php

namespace Lesson_22;

class Food extends Model
{

    public function getBeverageAttribute()
    {
        return $this->attributes['beverage'] ?? false;
    }

}