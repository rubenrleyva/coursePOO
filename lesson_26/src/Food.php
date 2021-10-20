<?php

namespace Lesson_26;

class Food extends Model
{

    public function getBeverageAttribute()
    {
        return $this->attributes['beverage'] ?? false;
    }

}