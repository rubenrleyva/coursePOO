<?php

namespace Rubenrl\Armors;

use Rubenrl\Attack;

interface Armor
{
    public function getAbsort();
    public function absorDamage(Attack $attack);
}