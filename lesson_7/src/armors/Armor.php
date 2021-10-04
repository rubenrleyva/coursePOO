<?php

namespace Rubenrl\Armors;

interface Armor
{
    public function getAbsort();
    public function absorDamage($damage);
}