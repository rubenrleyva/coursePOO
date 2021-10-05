<?php

namespace Rubenrl\Armors;

class EvasionArmor extends Armor
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

    public function absorDamage($damage)
    {

        if (rand(0,1)){
            return 0;
        }
        return $damage;
    }
}
