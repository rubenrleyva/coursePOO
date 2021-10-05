<?php

namespace Rubenrl\Armors;

use Rubenrl\Attack;

class MissingArmor extends Armor
{

    protected $absor = 0;

    public function getAbsort()
    {
        return $this->absor;
    }

    public function absorDamage(Attack $attack)
    {
        return $attack->getDamage();
    }
}