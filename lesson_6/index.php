<?php

namespace Rubenrl;

require 'src/Helper.php';

spl_autoload_register(function ($className){
    show('Intentando mostrar '.$className);
    if (strpos($className, 'Rubenrl\\') === 0){
        $className = str_replace('Rubenrl\\', '', $className);
        if (file_exists('src/'.$className.'.php')){
            require 'src/'.$className.'.php';
        }
    }
});

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