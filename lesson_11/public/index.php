<?php

namespace Rubenrl;

require '../vendor/autoload.php';

Translator::set([
    'BasicBow'    => ':unit dispara una flecha a :opponent',
    'BasicSword'  => ':unit ataca con la espada a :opponent',
    'FireBow'     => ':unit dispara una flecha de fuego a :opponent',
    'CrossBow'    => ':unit dispara una flecha a :opponent',
]);

$ram = new Unit('Ram', new Weapons\BasicSword());
$silence = new Unit('Silence', new Weapons\FireBow());
$ram->setArmor(new Armors\BronzeArmor());
$silence->setArmor(new Armors\SilverArmor());

$silence->attack($ram);
$silence->attack($ram);
$ram->attack($silence);
$silence->attack($ram);
$silence->attack($ram);
$ram->attack($silence);
$silence->attack($ram);

exit();