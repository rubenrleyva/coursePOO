<?php

namespace Rubenrl;

use Rubenrl\Armors\Armor;
use Rubenrl\Weapons\Weapon;

abstract class Unit
{

    protected $hp = 100;
    protected $name;
    protected $armor;
    protected $weapon;
    protected $damage;

    public function __construct($name, Weapon $weapon)
    {
        $this->setWeapon($weapon);
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

    public function setWeapon(Weapon $weapon)
    {
        $this->weapon = $weapon;
    }

    public function move($direction)
    {
        show("{$this->name} camina hacia $direction");
    }

    public function attack(Unit $opponent)
    {
        if (!$this->weapon){
            throw new \Exception("Esta unidad no dispone de arma");
        }

        show($this->weapon->getDescription($this, $opponent));

        $opponent->takeDamage($this->weapon->getDamage());
    }

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
        if ($this->armor){
            $damage = $this->armor->absorDamage($damage);
        }
        return $damage;
    }

    public function die()
    {
        show("{$this->name} muere");

        exit();
    }

}