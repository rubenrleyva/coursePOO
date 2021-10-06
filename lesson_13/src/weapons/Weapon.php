<?php

namespace Rubenrl\Weapons;

use Rubenrl\Attack;

abstract class Weapon
{
    protected $damage = 0;
    protected $magical = false;

    public function createAttack(): Attack
    {
        return new Attack($this->damage, $this->magical, $this->getDescriptionKey());
    }

    protected function getDescriptionKey()
    {
        return str_replace('Rubenrl\Weapons\\', '', get_class($this));
    }
}