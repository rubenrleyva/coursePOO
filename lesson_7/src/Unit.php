<?php

namespace Rubenrl;

use Rubenrl\Armors\Armor;

abstract class Unit
{

    protected $hp = 50;
    protected $name;
    protected $armor;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getHp()
    {
        return $this->hp;
    }

    public function setArmor(Armor $armor = null)
    {
        if ($armor){
            show("{$this->name} obtiene una armadura de {$armor->getAbsort()} puntos");
        }
        $this->armor = $armor;
    }

    public function move($direction)
    {
        show("{$this->name} camina hacia $direction");
    }

    abstract public function attack(Unit $opponent);

    public function takeDamage($damage)
    {
        $this->hp = number_format($this->hp - $this->absorbDamage($damage), 0);

        if ($this->hp <= 0){
            $this->die();
        }else{
            show("{$this->name} ahora tiene {$this->hp} puntos de vida");
        }
    }

    public function absorbDamage($damage)
    {
        return $damage;
    }

    public function die()
    {
        show("{$this->name} muere");

        exit();
    }

}