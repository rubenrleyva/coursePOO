<?php

namespace Rubenrl;

use Rubenrl\Armors\Armor;
use Rubenrl\Weapons\Weapon;

class Unit
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

        $attack = $this->weapon->createAttack();

        if (!$this->weapon){
            throw new \Exception("Esta unidad no dispone de arma");
        }

        show($attack->getDescription($this, $opponent));

        $opponent->takeDamage($attack);
    }

    public function takeDamage(Attack $attack)
    {
        $this->hp = $this->hp - $this->absorbDamage($attack);

        if ($this->hp <= 0){
            $this->die();
        }else{
            show("{$this->name} ahora tiene {$this->hp} puntos de vida");
        }
    }

    public function absorbDamage(Attack $attack)
    {
        if ($this->armor){
            return $this->armor->absorDamage($attack);
        }
        return $attack->getDamage();
    }

    public function die()
    {
        show("{$this->name} muere");

        exit();
    }

}