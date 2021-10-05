<?php

namespace Rubenrl\Armors;

class CursedArmor extends Armor
{

    protected $absor = 1;

    public function getAbsort()
    {
        return $this->absor;
    }

    public function absorbPhysicalDamage(Attack $attack)
    {
        return $attack->getDamage() /$this->absor;
    }
}
