<?php

namespace Rubenrl\Armors;

use Rubenrl\Attack;

class BronzeArmor extends Armor
{
    protected $absor = 2;

    public function getAbsort()
    {
        return $this->absor;
    }

    public function absorbPhysicalDamage(Attack $attack)
    {
        return $attack->getDamage() /$this->absor;
    }
}
