<?php

namespace Rubenrl\Weapons;

use Rubenrl\Unit;

abstract class Weapon
{
    protected $damage = 0;

    public function getDamage()
    {
        return $this->damage;
    }

    abstract public function getDescription(Unit $attacker, Unit $opponent);
}