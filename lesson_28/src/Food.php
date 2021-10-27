<?php

namespace Lesson_28;

class Food extends Model
{

    public function getBeverageAttribute()
    {
        return $this->attributes['beverage'] ?? false;
    }

}