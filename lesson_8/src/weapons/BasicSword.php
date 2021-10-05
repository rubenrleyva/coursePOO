<?php

namespace Rubenrl\Weapons;

use Rubenrl\Unit;

class BasicSword extends Weapon
{
    protected $damage = 20;

    public function getDescription(Unit $attack, Unit $opponent)
    {
        return "{$attack->getName()} ataca con la espada a {$opponent->getName()}";
    }
}