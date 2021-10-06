<?php

namespace Rubenrl;

use Rubenrl\Armors\Armor;
use Rubenrl\Armors\MissingArmor;
use Rubenrl\Weapons\Weapon;

class Unit
{

    const MAX_DAMAGE = 1000;

    /** @var */
    protected $hp = 1201;
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
            Log::info("{$this->name} obtiene una armadura de {$armor->getAbsort()} puntos");
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
        Log::info("{$this->name} camina hacia $direction");
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

        Log::info($attack->getDescription($this, $opponent));

        $opponent->takeDamage($attack);
    }

    /**
     * Función encargada de tomar el daño.
     *
     * @param Attack $attack
     */
    public function takeDamage(Attack $attack)
    {

        $this->setHp($this->armor->absorDamage($attack));

        if ($this->hp <= 0){
            $this->die();
        }else{
            Log::info("{$this->name} ahora tiene {$this->hp} puntos de vida");
        }
    }

    public function setHp($damage)
    {
        if ($damage > static::MAX_DAMAGE){
            $damage = static::MAX_DAMAGE;
        }

        $this->hp = $this->hp - $damage;
    }

    /**
     * Función para mostrar la muerte
     * y terminar el programa.
     */
    public function die()
    {
        Log::info("{$this->name} muere");

        exit();
    }

}