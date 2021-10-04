<?php

function show($message)
{
    echo "<p>$message</p>";
}

abstract class Unit {

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

class Archer extends Unit {

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

interface Armor
{
    public function getAbsort();
    public function absorDamage($damage);
}

class BronzeArmor implements Armor
{
    protected $absor = 2;

    public function getAbsort()
    {
        return $this->absor;
    }

    public function absorDamage($damage)
    {
        return $damage / $this->absor;
    }
}

class SilverArmor implements Armor
{
    protected $absor = 3;

    public function getAbsort()
    {
        return $this->absor;
    }

    public function absorDamage($damage)
    {
        return $damage / $this->absor;
    }
}

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

class EvasionArmor implements Armor
{
    protected $absor = 0;

    public function getAbsort()
    {
        return $this->absor;
    }

    public function absorDamage($damage)
    {
        if (rand(0,1)){
            return 0;
        }
        return $damage;
    }

}

$armorBronze = new BronzeArmor();
$armorSilver = new SilverArmor();

$ram = new Soldier('Ram');
$silence = new Archer('Silence');
$silence->setArmor($armorSilver);
$silence->attack($ram);
$silence->attack($ram);
$ram->setArmor($armorBronze);
$ram->attack($silence);
$silence->attack($ram);
$silence->attack($ram);
$ram->attack($silence);
$silence->attack($ram);
exit();