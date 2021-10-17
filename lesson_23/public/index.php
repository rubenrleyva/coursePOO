<?php

class Time
{

    protected $time = null;
    protected $timezone;

    public function __construct($time = null, $timezone = 'Europe/London')
    {
        $this->time = $time ?: time();
        $this->timezone = $timezone;
    }

    public function __toString()
    {
        return date('d/m/Y H:i:s', $this->time);
    }
}

class MyTime extends Time
{

}

class Person {

    public $name;

    public $online = false;

    public $id;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function is($otherPerson)
    {
        return $this->id == $otherPerson->id;
    }
}

$ruben = new Person('Ruben');
$ruben->id = 1;
$ruben->online = true;

$ruben2 = new Person('Ruben');
$ruben2->id= 2;


if ($ruben->is($ruben2)){
    echo "Verdadero";
}else{
    echo "False";
}

$today = new Time(null, 'Europe/London');
$today2 = new MyTime( null, 'Europe/London');

if ($today === $today2){
    echo "Verdadero";
}else{
    echo "False";
}

exit();