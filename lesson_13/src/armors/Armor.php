<?php

namespace Rubenrl\Armors;

use Rubenrl\Attack;
use Rubenrl\Log;

abstract class Armor
{
    public function absorDamage(Attack $attack)
    {
        Log::info("Absorbing damage...");

        if ($attack->isMagical()){
            return $this->absorbMagicalDamage($attack);
        }

        return $this->absorbPhysicalDamage($attack);
    }

    public function absorbPhysicalDamage(Attack $attack)
    {
        return $attack->getDamage();
    }

    public function absorbMagicalDamage(Attack $attack)
    {
        return $attack->getDamage();
    }


}