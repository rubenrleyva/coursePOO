<?php

use Lesson_19\HtmlNode;
use Lesson_19\User;

require '../vendor/autoload.php';

$user = new User(['name' => 'Ruben']);

echo $result = serialize($user);

file_put_contents('../storage/user.txt', $result);

exit();


