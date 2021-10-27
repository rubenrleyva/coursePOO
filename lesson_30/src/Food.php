<?php

namespace Lesson_30;

class Food extends Model
{

    public function getBeverageAttribute()
    {
        return $this->attributes['beverage'] ?? false;
    }

}