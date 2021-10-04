<?php

namespace Rubenrl;

class SilverArmor implements Armor
{
    protected $absor = 3;

    public function getAbsort()
    {
        return $this->absor;
    }

    public function absorDamage($damage)
    {
        return $damage / $this->absor;
    }
}
