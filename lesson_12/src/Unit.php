<?php

namespace Rubenrl;

use Rubenrl\Armors\Armor;
use Rubenrl\Armors\MissingArmor;
use Rubenrl\Weapons\Weapon;

class Unit
{

    /** @var */
    protected $hp = 100;
    protected $name;
    protected $armor;
    protected $weapon;
    protected $damage;

    /**
     * Constructor de la clase
     * @param $name
     * @param Weapon $weapon
     */
    public function __construct($name, Weapon $weapon)
    {
        $this->setWeapon($weapon);
        $this->name = $name;
        $this->armor = new Armors\MissingArmor();
    }

    /**
     * Método factory
     * @return Unit
     */
    public static function createSoldier()
    {
        $soldier = new Unit('Ram', new Weapons\BasicSword());
        $soldier->setArmor(new Armors\BronzeArmor());

        return $soldier;
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

        return $this;
    }

    public function setWeapon(Weapon $weapon)
    {
        $this->weapon = $weapon;

        return $this;
    }

    public function setShield()
    {
        // fluent interfaces
        return $this;
    }

    public function move($direction)
    {
        show("{$this->name} camina hacia $direction");
    }

    /**
     * Función encargada de crear el ataque
     * mostrar la descripción y pasar el daño.
     * @param Unit $opponent
     * @throws \Exception
     */
    public function attack(Unit $opponent)
    {
        $attack = $this->weapon->createAttack();

        if (!$this->weapon){
            throw new \Exception("Esta unidad no dispone de arma");
        }

        show($attack->getDescription($this, $opponent));

        $opponent->takeDamage($attack);
    }

    /**
     * Función encargada de tomar el daño.
     *
     * @param Attack $attack
     */
    public function takeDamage(Attack $attack)
    {
        $this->hp = $this->hp - $this->armor->absorDamage($attack);

        if ($this->hp <= 0){
            $this->die();
        }else{
            show("{$this->name} ahora tiene {$this->hp} puntos de vida");
        }
    }

    /**
     * Función para mostrar la muerte
     * y terminar el programa.
     */
    public function die()
    {
        show("{$this->name} muere");

        exit();
    }

}