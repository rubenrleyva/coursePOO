<?php

use Lesson_18\HtmlNode;

require '../vendor/autoload.php';

/*
$node = (new HtmlNode('textarea', 'rubenrl'))
        ->name('content');
*/
$node = HtmlNode::textarea('rubenrl')
    ->name('content')
    ->id('contenido');

var_dump($node('name'), $node('width', 100));

exit();


