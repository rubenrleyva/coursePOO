<?php

use Lesson_15\User;

require '../vendor/autoload.php';

$user = new User();

$user->fill([
    'first_name'    => 'Ruben',
    'last_name'     => 'RL',
    //'nickname'      => 'RRL'
]);

$user->nickname = 'Silence';

unset($user->nickname);

var_dump($user);

if (isset($user->nickname)){
    echo $user->getAttribute('nickname');
}


echo "<p>Bienvenido {$user->first_name} {$user->last_name} {$user->nickname}</p>";
