<?php

namespace Rubenrl;

class CursedArmor implements Armor
{

    protected $absor = 2;

    public function getAbsort()
    {
        return $this->absor;
    }

    public function absorDamage($damage)
    {
        return $damage * $this->absor;
    }
}
