<?php

namespace Rubenrl;

require '../vendor/autoload.php';

$armorBronze = new Armors\BronzeArmor();
$armorSilver = new Armors\SilverArmor();

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