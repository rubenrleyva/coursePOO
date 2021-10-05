<?php

namespace Rubenrl;

class Attack
{
    protected $damage;
    protected $magical;

    public function __construct($damage, $magical, $description)
    {
        $this->damage = $damage;
        $this->magical = $magical;
        $this->description = $description;
    }

    public function getDamage()
    {
        return $this->damage;
    }

    public function getDescription(Unit $attacker, Unit $opponent)
    {
        return str_replace(
            [':unit', ':opponent'],
            [$attacker->getName(), $opponent->getName()],
            $this->description,
        );
    }

    public function isMagical()
    {
        return $this->magical;
    }

    public function isPhysical()
    {
        return!$this->magical;
    }
}