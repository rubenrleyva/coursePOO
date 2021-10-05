<?php

namespace Rubenrl\Armors;

class BronzeArmor implements Armor
{
    protected $absor = 2;

    public function getAbsort()
    {
        return $this->absor;
    }

    public function absorDamage($damage)
    {
        return $damage / $this->absor;
    }
}
