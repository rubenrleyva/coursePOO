<?php

namespace Rubenrl\Weapons;

use Rubenrl\Unit;

class BasicBow extends Bow
{
    protected $damage = 40;

    public function getDescription(Unit $attack, Unit $opponent)
    {
        return "{$attack->getName()} lanza una flecha a {$opponent->getName()}";
    }
}