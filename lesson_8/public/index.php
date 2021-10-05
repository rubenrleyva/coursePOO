<?php

namespace Rubenrl;

require '../vendor/autoload.php';

$armorBronze = new Armors\BronzeArmor();
$armorSilver = new Armors\SilverArmor();

$weaponBasicBow = new Weapons\BasicBow();
$weaponBasicSword = new Weapons\BasicSword();
$weaponBasicCross = new Weapons\CrossBow();

$ram = new Soldier('Ram', $weaponBasicSword);
$silence = new Archer('Silence', $weaponBasicBow);
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