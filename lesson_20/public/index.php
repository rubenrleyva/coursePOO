<?php

require '../vendor/autoload.php';

use Lesson_20\User;
use Lesson_20\LunchBox;

$gordon = new User(['name' => 'Gordon']);

$joanie = new User(['name' => 'Joanie']);
$haley = new User(['name' => 'Haley']);

$lunchBox =  new LunchBox(['Sandwich', 'Manzana']);
$lunchBox2 =  clone $lunchBox;

$joanie->setLunch(clone($lunchBox));
$haley->setLunch(new LunchBox(['Manzana']));

$joanie->eat();
$haley->eat();

var_dump($lunchBox, $lunchBox2);


