<?php

namespace Rubenrl\Weapons;

use Rubenrl\Unit;

class CrossBow extends Bow
{
    protected $damage = 40;

    public function getDescription(Unit $attack, Unit $opponent)
    {
        return "{$attack->getName()} ataca con la espada a {$opponent->getName()}";
    }
}