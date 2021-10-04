<?php

namespace Rubenrl;

class Archer extends Unit
{

    protected $damage = 20;
    protected $armor;

    public function __construct($name)
    {
        parent::__construct($name);
    }

    public function attack(Unit $opponent)
    {
        show("{$this->name} lanza una flecha a {$opponent->getName()}");

        $opponent->takeDamage($this->damage);
    }

    public function takeDamage($damage)
    {
        if (rand(0,1)) {
            parent::takeDamage($damage);
        }
        show("{$this->getName()} ha esquivado el ataque");
    }
}