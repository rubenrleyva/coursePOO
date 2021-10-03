<?php

abstract class Unit {

    protected $alive = true;
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function move($direction)
    {
        echo "<p>{$this->name} camina hacia $direction</p>";
    }

     abstract public function attack($opponent);

}


class Soldier extends Unit
{
    public function attack($opponent)
    {
        echo "<p>{$this->name} corta a $opponent</p> en dos!";
    }
}

class Archer extends Unit {

    public function attack($opponent)
    {
        echo "<p>{$this->name} lanza una flecha a $opponent</p>";
    }
}

$unit = new Archer('Ruben');
$unit->move('al norte');
$unit->attack('Pedro');
exit();