<?php

require '../vendor/autoload.php';

use Lesson_21\User;
use Lesson_21\LunchBox;

$gordon = new User(['name' => 'Gordon']);

$joanie = new User(['name' => 'Joanie']);
$haley = new User(['name' => 'Haley']);

$lunchBox =  new LunchBox(['Sandwich', 'Manzana', 'Papas', 'Jugo de naranja']);

$joanie->setLunch($lunchBox);

$joanie->eatMeal();


