<?php

namespace Lesson_21;

use Exception;

class User extends Model
{
    protected $lunch;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->lunch = new LunchBox();
    }

    public function setLunch(LunchBox $lunch)
    {
        $this->lunch = $lunch;
    }

    public function eat()
    {
        if ($this->lunch->isEmpty()){
            throw new Exception("{$this->name} no tiene nada para comer :( ");
        }

        echo "<p>{$this->name} almuerza {$this->lunch->shift()}</p>";

    }

    public function eatMeal()
    {
        $count =$this->lunch->count();

        echo "<p>{$this->name} tiene {$count} comida.</p>";

        foreach ($this->lunch as $food){
            echo "<p>{$this->name} come {$food}</p>";
        }
    }
}