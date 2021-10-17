<?php

require '../vendor/autoload.php';

use Lesson_22\User;
use Lesson_22\LunchBox;
use Lesson_22\Food;

$gordon = new User(['name' => 'Gordon']);

$joanie = new User(['name' => 'Joanie']);
$haley = new User(['name' => 'Haley']);

$lunchBox =  new LunchBox([
    new Food(['name' => 'Sandwich', 'beverage' => false]),
    new Food(['name' => 'Papas', 'beverage' => false]),
    new Food(['name' => 'Zumo', 'beverage' => true]),
    new Food(['name' => 'Agua', 'beverage' => true]),
    new Food(['name' => 'Peras', 'beverage' => false]),
]);

$joanie->setLunch($lunchBox);

$joanie->eatMeal();


