<?php

namespace Rubenrl;

class Soldier extends Unit
{

    protected $damage = 40;

    public function __construct($name)
    {
        parent::__construct($name);
    }

    public function attack(Unit $opponent)
    {
        show("{$this->name} ataca con la espada a {$opponent->getName()}");

        $opponent->takeDamage($this->damage);
    }

    public function absorbDamage($damage)
    {
        if ($this->armor){
            $damage = $this->armor->absorDamage($damage);
        }
        return $damage;
    }
}