<?php

namespace Rubenrl\Armors;

use Rubenrl\Attack;

class SilverArmor extends Armor
{
    protected $absor = 3;

    public function getAbsort()
    {
        return $this->absor;
    }

    /*
    public function absorDamage(Attack $attack)
    {
        if ($attack->isPhysical()){
            return $attack->getDamage() / $this->absor;
        }

        return $attack->getDamage();
    }
    */
}
