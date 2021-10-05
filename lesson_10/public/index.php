<?php

namespace Rubenrl;

require '../vendor/autoload.php';

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