<?php

trait CanPerformBasicActions
{
    public function move()
    {
        echo "<p>Caminó</p>";
    }
}

trait CanShootArrow
{
    public function shootArrow()
    {
        echo "<p>Disparó una flecha</p>";
    }

    abstract public function getArrows();
}

trait CanRide
{
    public function move()
    {
        echo "<p>Cabalgó</p>";
    }
}

trait CanWalk
{
    public function walk()
    {
        echo "<p>Caminó</p>";
    }
}

class Knight
{
    use CanRide;

}

class Archer
{
    use CanShootArrow;

    public function getArrows()
    {
        return 100;
    }
}

class MounterArcher
{
    use CanShootArrow;
    use CanPerformBasicActions, CanRide {
        CanRide::move insteadof CanPerformBasicActions;
        CanRide::move as ride;
        CanPerformBasicActions::move as basicMove;
    }

    public function getArrows()
    {
        return 150;
    }
}

/*
$archer = new Archer();
$archer->move();
$archer->shootArrow();
*/

$mountedArcher = new MounterArcher();
$mountedArcher->shootArrow();
$mountedArcher->move();
$mountedArcher->basicMove();
$mountedArcher->ride();
echo $mountedArcher->getArrows();
