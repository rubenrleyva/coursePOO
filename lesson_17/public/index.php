<?php

use Lesson_17\HtmlNode;

require '../vendor/autoload.php';

/*
$node = (new HtmlNode('textarea', 'rubenrl'))
        ->name('content');
*/
$node = HtmlNode::textarea('rubenrl')
    ->name('content')
    ->id('contenido');

echo $node->render();

exit();

